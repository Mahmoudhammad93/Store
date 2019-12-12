<?php

namespace App\Http\Controllers\Admin;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BackEndController;
use App\models\Invoice;
use App\models\Supplier;
use App\models\Product;
use App\models\Category;
use App\models\SupplierStartBalance;
use App\models\Box;
use App\models\InvoiceProducts;
use App\Http\Requests\BackEnd\PurchaseInvoice\Store as InvoiceStore;
class PurchaseInvoice extends BackEndController
{
    public function __construct(Invoice $model){
       return Parent::__construct($model);
    }

    public function index(Request $request)
    {
        $filterData = $request->all();
        $tasks = Task::all();

        $rows = $this->model;
        $rows = $rows->where('invoice_type','=',0);
        if(isset( $filterData['page'] ) ){
          unset($filterData['page']);
        }
        if(!empty($this->with())){
         $rows = $rows->with($this->with());
        }
        $rows = $this->filter($rows,$filterData);
        $rows = $rows->orderBy('id','desc')->paginate(10);

        $PageTitle = "Purchase Invoices ( فواتير المشتريات )";
        $headerLevelProcessTitle1 = "Purchase Invoices ( فواتير المشتريات )";
        $headerLevelProcessTitle2 = "All ( الكل )";
        $buttonsRoutsname = $modelViewName = "purchaseInvoice";
        $databind  = $this->append();

        return View('Admin.purchaseInvoice.index',compact('filterData','tasks','rows','databind','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));

      }

    public function create()
    {
        $PageTitle = "Purchase Invoices ( فواتير المشتريات )";
        $headerLevelProcessTitle1 = "Purchase Invoices ( فواتير المشتريات )";
        $headerLevelProcessTitle2 = "All ( الكل )";
        $buttonsRoutsname = $modelViewName = "purchaseInvoice";
        $databind  = $this->append();

        return View('Admin.'.$modelViewName.'.add',compact('databind','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
    }

    public function edit($id)
    {

        $row = $this->model->findOrFail($id);
        $PageTitle = "Purchase Invoices ( فواتير المشتريات )";
        $headerLevelProcessTitle1 = "Purchase Invoices ( فواتير المشتريات )";
        $headerLevelProcessTitle2 = "All ( الكل )";
        $buttonsRoutsname = $modelViewName = 'purchaseInvoice';
        $databind  = $this->append();
        return View('Admin.'.$modelViewName.'.edit',compact('row','databind','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
    }

    public function print(Request $request ){
        $dataIds = $request->all();
        unset($dataIds['_token']);

        $rows = $this->model->whereIn('id',$dataIds)->orderBy('id','desc')->get();
        $PageTitle = "Purchase Invoices ( فواتير المشتريات )";
        $headerLevelProcessTitle1 = "Purchase Invoices ( فواتير المشتريات )";
        $headerLevelProcessTitle2 = "All ( الكل )";
        $buttonsRoutsname = $modelViewName = 'purchaseInvoice';
        $printOrder = "doPrint";

        return View('Admin.'.$modelViewName.'.print',compact('rows','printOrder','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));

    }

    public function store(InvoiceStore $request)
    {
        $row = $this->model;
        if($request['code'] == ""){
          $request['code'] = rand();
        }
        $request['total_gain'] = 0 ;
        if($invoice = $row->create($request->toArray()) ){
            // add to Product invoice and update store
            for($i=0;$i <= $request['itrator'];$i++){
                if(isset($request['product_id'.$i])){
                    $proInv = new InvoiceProducts();

                    $proInv->invoice_id = $invoice->id;
                    $proInv->product_id = $request['product_id'.$i];
                    $proInv->quantity   = $request['quantity'.$i];
                    $proInv->sell_price = 0 ;
                    $proInv->pay_price  = $request['payprice'.$i];
                    $proInv->total_price = $request['total_price'.$i];
                    $proInv->total_gain = 0;
                    // update store
                    if($proInv->save()){
                        $product = Product::find($request['product_id'.$i]);
                        $product->sell_price =( ( $product->sell_price * $product->quantity ) + ( $request['payprice'.$i] * $request['quantity'.$i] ) ) / ( $request['quantity'.$i] + $product->quantity );
                        $product->quantity   = $product->quantity + $request['quantity'.$i];
                        $product->save();
                    }
                    // End of update store
              }
            }
                   // add to Product invoice and update store
              if($request['due'] == 0 ){
                   // add to box
                   $box = new Box();
                   $latestAction = Box::orderBy('id','desc')->first();

                   $box->type = 0;
                   $box->value = $request['total_value'];
                   $box->date = $request['date'];
                   $box->desc = 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)';
                   $box->invoiceType  = 1;
                   $box->invoice_id  = $invoice->id;

                   if(isset( $latestAction->totl_value ) ){
                       $box->totl_value = $latestAction->totl_value - $request['total_value'] ;
                     }else{
                       $box->totl_value = 0 - $request['total_value'] ;
                     }

                   $box->save();
                     // End of add to box

                     // update supplier balance
                   $supplier_balance = new SupplierStartBalance();
                   $latestAction = SupplierStartBalance::where('supplier_id',$request->supplier_id)->orderBy('id','desc')->first();

                   $supplier_balance->supplier_id = $request->supplier_id;
                   $supplier_balance->depet_value = $request->total_value;
                   $supplier_balance->payment_type = 0;
                   $supplier_balance->date = $request->date;
                   $supplier_balance->invoice_id = $invoice->id;

                   $supplier_balance->desc = 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )';

                   if(isset( $latestAction->total_balance ) ){
                       $supplier_balance->total_balance = $latestAction->total_balance ;
                     }else{
                       $supplier_balance->total_balance = 0 ;
                     }

                   $supplier_balance->save();
                     // End of supplier balance
              }

              if( $request['due'] == 0 ) {
                swal()->button('Close Me')->message('تم',' تم اضافة الفاتورة بنجاح وتم خصم المبلغ من الخازنه مع اضافة ثمن الفاتورة الي حساب العميل وتم تحديث بيانات  الصنف في المخزن ','info');
              }
              if( $request['due'] == 1 ) {
                swal()->button('Close Me')->message('تم',' تم اضافة الفاتورة بنجاح مع العلم ان الفاتورة لم تسدد بعد  ','info');
              }

         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
         }
        return redirect()->back();

    }

    public function show($id)
    {

      $row = Invoice::find($id);

      $PageTitle = "Purchase Invoice ( فاتورة مشتريات )";
      $headerLevelProcessTitle1 = "Purchase Invoice ( فواتير المشتريات )";
      $headerLevelProcessTitle2 = "Invoice Num ( فاتورة رقم )".$row->code;
      $buttonsRoutsname = $modelViewName = "purchaseInvoice";

      return View('Admin.purchaseInvoice.singleInvoice',compact('row','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));

    }

    public function printSingleInvoice($id)
    {
      $row = Invoice::find($id);

      $PageTitle = "Purchase Invoice ( فاتورة مشتريات )";
      $headerLevelProcessTitle1 = "Purchase Invoice ( فواتير المشتريات )";
      $headerLevelProcessTitle2 = "Invoice Num ( فاتورة رقم )".$row->code;
      $buttonsRoutsname = $modelViewName = "purchaseInvoice";
      $printOrder = "doPrint";
      return View('Admin.purchaseInvoice.printSingleInvoice',compact('printOrder','row','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));

    }

    public function destroy($id)
    {
        $row = $this->model->findOrFail($id);
        $oldTotalprice = $row->total_value;
        $olddue  = $row->due;
              // delete supplier balance
            if($olddue == 0){
            $supplier_balance = SupplierStartBalance::where('invoice_id','=',$id)->delete();
              // End of supplier balance

            // add to box
            $box = Box::where('invoiceType','=',1)->where('invoice_id','=',$id)->first();
            $removedBoxValue =  $box->value;
            $removedBoxId    = $box->id;
            if($box->delete()){
              $boxTheLatest = Box::orderBy('id','desc')->first();
              if($removedBoxId =! $boxTheLatest->id){
                  $boxTheLatest->totl_value = $boxTheLatest->totl_value + $removedBoxValue;
                  $boxTheLatest->save();
              }
            }

              // End of add to box
        }
          // delete from Product invoice and update store
          $lastQuantitesAndPrice = InvoiceProducts::where('invoice_id','=',$id)->get();
          InvoiceProducts::where('invoice_id','=',$id)->delete();

                // update store
          foreach($lastQuantitesAndPrice as $lastQP){
            $productUpdate = Product::findOrFail($lastQP->product_id);
            $productUpdate->quantity   = $productUpdate->quantity - $lastQP->quantity;
            $productUpdate->sell_price = $lastQP->pay_price;
            $productUpdate->save();
          }

                // End of update store

              // End delete from Product invoice and update store

        if($row->delete()){
           swal()->button('Close Me')->message('تم',' تم مسح الفاتورة بنجاح وتم تعديل المبلغ من الخازنه مع تعديل حساب العميل وتم تحديث بيانات  الصنف في المخزن ','info');
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
         }
        return redirect()->back();
    }


    public function update(InvoiceStore $request,$id)
    {
        $row = $this->model->findOrFail($id);
        $oldTotalprice = $row->total_value;
        $olddue = $row->due;
        if($row->update($request->toArray())){

          // add to Product invoice and update store
         $lastQuantitesAndPrice = InvoiceProducts::where('invoice_id','=',$id)->get();
          InvoiceProducts::where('invoice_id','=',$id)->delete();

          for($i=0;$i <= $request['itrator'];$i++){
            if(isset($request['product_id'.$i])){
                $proInv = new InvoiceProducts();
                $proInv->invoice_id = $id;
                $proInv->product_id = $request['product_id'.$i];
                $proInv->quantity   = $request['quantity'.$i];
                $proInv->sell_price = 0 ;
                $proInv->pay_price  = $request['payprice'.$i];
                $proInv->total_price = $request['total_price'.$i];
                $proInv->total_gain = 0;
                // update store
                if($proInv->save()){
                    if($lastQuantitesAndPrice->count() > 0){
                       $checker = 0 ;
                      foreach($lastQuantitesAndPrice as $lastqp){

                        if($lastqp->product_id == $request['product_id'.$i] ){

                           $product = Product::find($request['product_id'.$i]);
                           $product->quantity   = $product->quantity + ($request['quantity'.$i] - $lastqp->quantity ) ;
                           $product->sell_price = $product->sell_price ;
                           $product->save();
                           $checker = 1;
                        }
                      }

                    if($checker == 0){

                      $product = Product::find($request['product_id'.$i]);
                      $product->quantity   = $product->quantity + $request['quantity'.$i] ;
                      $product->sell_price = ($product->sell_price + $request['payprice'.$i])/2;
                      $product->save();

                    }

                    }else{
                      $product = Product::find($request['product_id'.$i]);
                      $product->quantity   = $product->quantity + $request['quantity'.$i] ;
                      $product->sell_price = $request['payprice'.$i];
                      $product->save();
                    }


                }
                // End of update store
          }
        }
               // add to Product invoice and update store

               // add to box
          if( $request['due'] == 0 ) {
            if($olddue == 0 ){
                $box = Box::where('invoiceType','=',1)->where('invoice_id','=',$id)->first();
                $boxTheLatest = Box::orderBy('id','desc')->first();

                $box->type = 0;
                $box->date = $request['date'];
                $box->desc = 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)';
                $box->invoiceType   = 1;
                $box->invoice_id    = $id;

                $box->totl_value    = $box->totl_value - ( $request->total_value - $box->value );
                $boxTheLatest->totl_value = $boxTheLatest->totl_value - ($request->total_value - $box->value);
                $box->value = $request['total_value'];

                $box->save();
                $boxTheLatest->save();

                  // update supplier balance
                $supplier_balance = SupplierStartBalance::where('invoice_id','=',$id)->first();
                $latid = $supplier_balance->id - 1 ;
                $latestAction     = SupplierStartBalance::where('id','=',$latid)->where('supplier_id',$request->supplier_id)->orderBy('id','desc')->first();

                $supplier_balance->supplier_id  = $request->supplier_id;
                $supplier_balance->depet_value  = $request['total_value'];
                $supplier_balance->payment_type = 0;
                $supplier_balance->date = $request->date;
                $box->desc = 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)';

                if(isset( $latestAction->total_balance ) ){
                    $supplier_balance->total_balance = $latestAction->total_balance ;
                  }else{
                    $supplier_balance->total_balance = 0 ;
                  }

                $supplier_balance->save();
                // End of supplier balance
              }

             if($olddue == 1 ){

              $box = new Box();
              $latestAction = Box::orderBy('id','desc')->first();

              $box->type = 0;
              $box->value = $request['total_value'];
              $box->date = $request['date'];
              $box->desc = 'Purchase Invoice (  فاتورة مشتريات فورية الدفع )';
              $box->invoiceType  = 1;
              $box->invoice_id  = $id;

              if(isset( $latestAction->totl_value ) ){
                  $box->totl_value = $latestAction->totl_value - $request['total_value'] ;
                }else{
                  $box->totl_value = 0 - $request['total_value'] ;
                }

              $box->save();

                // update supplier balance
                $supplier_balance = new SupplierStartBalance();
                $latestAction     = SupplierStartBalance::where('supplier_id',$request->supplier_id)->orderBy('id','desc')->first();

                $supplier_balance->supplier_id  = $request->supplier_id;
                $supplier_balance->depet_value  = $request['total_value'];
                $supplier_balance->payment_type = 0;
                $supplier_balance->date = $request->date;
                $supplier_balance->desc = 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )';
                $supplier_balance->invoice_id = $id;

                if(isset( $latestAction->total_balance ) ){
                    $supplier_balance->total_balance = $latestAction->total_balance ;
                  }else{
                    $supplier_balance->total_balance = 0 ;
                  }

                $supplier_balance->save();

             }

             swal()->button('Close Me')->message('تم',' تم تعديل بيانات الفاتورة بنجاح وتم تعديل المبلغ من الخازنه مع تعديل ثمن الفاتورة الي حساب العميل وتم تحديث بيانات  الصنف في المخزن ','info');

              // End of add to box

          }  // end of if $requests['due'] == 0

          if( $request['due'] == 1 ) {
             if($olddue == 0 ){
                  // box
                    $box = Box::where('invoice_id','=',$id)->first();
                    $removedBoxValue =  $box->value;
                    $removedBoxId    = $box->id;
                    if($box->delete()){
                      $boxTheLatest = Box::orderBy('id','desc')->first();
                      if($removedBoxId =! $boxTheLatest->id){
                          $boxTheLatest->totl_value = $boxTheLatest->totl_value + $removedBoxValue;
                          $boxTheLatest->save();
                      }
                    }
                  // End of add to box

                  // supplier
                  $supplier_balance = SupplierStartBalance::where('invoice_id','=',$id)->delete();
                  // End of supplier

                }

            swal()->button('Close Me')->message('تم',' تم حفظ فاتورة المشتريات مع العلم انه لم يتم تسدد قيمتها بعد','info');
          } // end of if requests['due'] == 1

         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
         }
        return redirect()->back();
    }

    protected function filter($rows,$filterData){
        foreach($filterData as $key => $value){
          if($value !=""){
            $rows = $rows->where($key,'=',$value);
          }
        }
        return $rows;
    }

    function getCategoryProducts (){
      $catId = $_POST['catId'];
      $product = Product::where('category_id','=',$catId)->get();

      return response()->json($product);
    }

    function append(){
        $array = [
            'suppliers' => Supplier::where('type','=','2')->get(),
            'products'  => Product::all(),
            'categories'  => Category::all(),

        ];

        return $array;
    }

}
