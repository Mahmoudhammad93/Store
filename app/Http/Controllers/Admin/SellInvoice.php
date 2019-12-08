<?php

namespace App\Http\Controllers\Admin;
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
class SellInvoice extends BackEndController
{
    public function __construct(Invoice $model){
       return Parent::__construct($model);
    }

    public function totalgainindex(Request $request){
      $filterData = $request->all();
      $rows = $this->model;
      $rows = $rows->where('invoice_type','=',1);
      if(isset( $filterData['page'] ) ){
        unset($filterData['page']);  
      }
      if(!empty($this->with())){
       $rows = $rows->with($this->with());   
      }
      if(isset($filterData['datefrom']) && isset($filterData['dateto'])){      
      $rows = $rows->whereBetween('date',[$filterData['datefrom'], $filterData['dateto']]);
      }
      if(isset($filterData['datefrom']) ){      
        $rows = $rows->where('date','>=',$filterData['datefrom']);
      }
      if(isset($filterData['dateto']) ){      
        $rows = $rows->where('date','<=',$filterData['dateto']);
      }

      if( !isset($filterData['datefrom']) && !isset($filterData['dateto'])){      
        $rows = $rows->where('date','=',date('Y-m-d'));
      }

      $rows = $rows->orderBy('id','desc')->get();

      $PageTitle = "Total Gain ( صافي الارباح )";
      $headerLevelProcessTitle1 = "Total Gain ( صافي الارباح )";
      $headerLevelProcessTitle2 = "All ( الكل )";
      $buttonsRoutsname = $modelViewName = "totalgainindex";
      return View('admin.sellInvoice.totalgaininperiod',compact('filterData','buttonsRoutsname','rows','PageTitle','headerLevelProcessTitle1','headerLevelProcessTitle2'));
    }
    public function index(Request $request)
    {
        $filterData = $request->all();
        $rows = $this->model;
        $rows = $rows->where('invoice_type','=',1);
        if(isset( $filterData['page'] ) ){
          unset($filterData['page']);  
        }
        if(!empty($this->with())){
         $rows = $rows->with($this->with());   
        }
        $rows = $this->filter($rows,$filterData);
        $rows = $rows->orderBy('id','desc')->paginate(10);

        $PageTitle = "Sell Invoices ( فواتير مبيعات )";
        $headerLevelProcessTitle1 = "Sell Invoices ( فواتير مبيعات )";
        $headerLevelProcessTitle2 = "All ( الكل )";
        $buttonsRoutsname = $modelViewName = "sellInvoice";
        $databind  = $this->append();

        return View('Admin.sellInvoice.index',compact('filterData','rows','databind','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
    
      }

    public function create()
    {        
        $PageTitle = "Sell Invoices ( فواتير مبيعات )";
        $headerLevelProcessTitle1 = "Sell Invoices ( فواتير مبيعات )";
        $headerLevelProcessTitle2 = "All ( الكل )";
        $buttonsRoutsname = $modelViewName = "sellInvoice";
        $databind  = $this->append();
        
        return View('Admin.'.$modelViewName.'.add',compact('databind','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
    }

    public function edit($id)
    {
        
        $row = $this->model->findOrFail($id);
        $PageTitle = "Sell Invoices ( فواتير المبيعات )";
        $headerLevelProcessTitle1 = "Purchase Invoices ( فواتير المبيعات )";
        $headerLevelProcessTitle2 = "All ( الكل )";
        $buttonsRoutsname = $modelViewName = 'sellInvoice';
        $databind  = $this->append();
        return View('Admin.'.$modelViewName.'.edit',compact('row','databind','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
    }

    public function print(Request $request ){
        $dataIds = $request->all();
        unset($dataIds['_token']);

        $rows = $this->model->whereIn('id',$dataIds)->orderBy('id','desc')->get();
        $PageTitle = "Sell Invoices ( فواتير المبيعات )";
        $headerLevelProcessTitle1 = "Sell Invoices ( فواتير المبيعات )";
        $headerLevelProcessTitle2 = "All ( الكل )";
        $buttonsRoutsname = $modelViewName = 'sellInvoice';
        $printOrder = "doPrint";

        return View('Admin.'.$modelViewName.'.print',compact('rows','printOrder','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
       
    }

    public function store(InvoiceStore $request)
    {
        $row = $this->model;
        if($request['code'] == ""){
          $request['code'] = rand();
          
        }
        $request['invoice_type'] = 1;
        if($invoice = $row->create($request->toArray()) ){
            // add to Product invoice and update store 
            for($i=0;$i <= $request['itrator'];$i++){
                if(isset($request['product_id'.$i])){
                    $proInv = new InvoiceProducts();

                    $proInv->invoice_id  = $invoice->id;
                    $proInv->product_id  = $request['product_id'.$i];
                    $proInv->quantity    = $request['quantity'.$i];
                    $proInv->sell_price  = $request['sellprice'.$i];
                    $proInv->pay_price   = $request['payprice'.$i];
                    $proInv->total_price = $request['total_price'.$i];
                    $proInv->total_gain  = $request['total_gain'.$i] ;
                    // update store
                    if($proInv->save()){
                        $product = Product::find($request['product_id'.$i]);
                        $product->quantity   = $product->quantity - $request['quantity'.$i];
                        $product->sell_price = $request['payprice'.$i];
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

                $box->type = 1;
                $box->value = $request['total_value'];
                $box->date = $request['date'];
                $box->desc = 'Sell Invoice ( فاتورة مبيعات فورية الدفع)';
                $box->invoiceType  = 1;
                $box->invoice_id  = $invoice->id;
           
                if(isset( $latestAction->totl_value ) ){
                    $box->totl_value = $latestAction->totl_value + $request['total_value'] ;
                  }else{
                    $box->totl_value = 0 + $request['total_value'] ;
                  }

                $box->save();
                  // End of add to box

                  // update supplier balance
                  $supplier_balance = new SupplierStartBalance();
                  $latestAction = SupplierStartBalance::where('supplier_id',$request->supplier_id)->orderBy('id','desc')->first();
  
                  $supplier_balance->supplier_id = $request->supplier_id;
                  $supplier_balance->depet_value = $request->total_value;
                  $supplier_balance->payment_type = 1;
                  $supplier_balance->date = $request->date;
                  $supplier_balance->invoice_id = $invoice->id;
                  
                  $supplier_balance->desc = 'Sell Invoice ( فاتورة مبيعات فورية الدفع )';
                  
                  if(isset( $latestAction->total_balance ) ){
                      $supplier_balance->total_balance = $latestAction->total_balance ;
                    }else{
                      $supplier_balance->total_balance = 0 ;
                    }
  
                  $supplier_balance->save();
                    // End of supplier balance
            }
    
            if( $request['due'] == 0 ) {
              swal()->button('Close Me')->message('تم',' تم اضافة الفاتورة بنجاح وتم اضافة المبلغ الي الخازنه مع اضافة بيانات الفاتورة الي حساب العميل وتم تحديث بيانات  الصنف في المخزن ','info'); 
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

      $PageTitle = "Sell Invoice ( فاتورة مبيعات )";
      $headerLevelProcessTitle1 = "Sell Invoice ( فواتير مبيعات )";
      $headerLevelProcessTitle2 = "Invoice Num ( فاتورة رقم )".$row->code;
      $buttonsRoutsname = $modelViewName = "sellInvoice";

      return View('Admin.sellInvoice.singleInvoice',compact('row','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
  
    }

    public function printSingleInvoice($id)
    {
      $row = Invoice::find($id);

      $PageTitle = "Sell Invoice ( فاتورة مبيعات )";
      $headerLevelProcessTitle1 = "Sell Invoice ( فواتير مبيعات )";
      $headerLevelProcessTitle2 = "Invoice Num ( فاتورة رقم )".$row->code;
      $buttonsRoutsname = $modelViewName = "sellInvoice";
      $printOrder = "doPrint";
      return View('Admin.sellInvoice.printSingleInvoice',compact('printOrder','row','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
  
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
            $boxTheLatest->totl_value = $boxTheLatest->totl_value - $removedBoxValue;
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
            $productUpdate->quantity   = $productUpdate->quantity + $lastQP->quantity;
            $productUpdate->sell_price = $lastQP->pay_price;
            $productUpdate->save();
          }

                // End of update store

              // End delete from Product invoice and update store 

        if($row->delete()){
           swal()->button('Close Me')->message('تم',' تم مسح الفاتورة بنجاح وتم تعديل المبلغ من الخازنه مع اضافة ثمن الفاتورة من حساب العميل وتم تحديث بيانات  الصنف في المخزن ','info'); 
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
        $request['invoice_type'] = 1;
        if($row->update($request->toArray())){

          // add to Product invoice and update store 
         $lastQuantitesAndPrice = InvoiceProducts::where('invoice_id','=',$id)->get();
          InvoiceProducts::where('invoice_id','=',$id)->delete();

          for($i=0;$i <= $request['itrator'];$i++){
            if(isset($request['product_id'.$i])){
                $proInv = new InvoiceProducts();
                $proInv->invoice_id  = $id;
                $proInv->product_id  = $request['product_id'.$i];
                $proInv->quantity    = $request['quantity'.$i];
                $proInv->sell_price  = $request['sellprice'.$i] ;
                $proInv->pay_price   = $request['payprice'.$i];
                $proInv->total_price = $request['total_price'.$i];
                $proInv->total_gain  = $request['total_gain'.$i] ;
                // update store
                if($proInv->save()){
                    if($lastQuantitesAndPrice->count() > 0){
                       $checker = 0 ;
                      foreach($lastQuantitesAndPrice as $lastqp){

                        if($lastqp->product_id == $request['product_id'.$i] ){

                           $product = Product::find($request['product_id'.$i]);
                           $product->quantity   = $product->quantity - ($request['quantity'.$i] - $lastqp->quantity ) ;
                           $product->sell_price = $request['payprice'.$i];
                           $product->save();
                           $checker = 1;
                        }
                      }
                    
                    if($checker == 0){

                      $product = Product::find($request['product_id'.$i]);
                      $product->quantity   = $product->quantity - $request['quantity'.$i] ;
                      $product->sell_price = $request['payprice'.$i];
                      $product->save();  

                    }

                    }else{
                      $product = Product::find($request['product_id'.$i]);
                      $product->quantity   = $product->quantity - $request['quantity'.$i] ;
                      $product->sell_price = $request['payprice'.$i];
                      $product->save();
                    }
                }
                // End of update store
          }
        }
               // add to Product invoice and update store 

        if( $request['due'] == 0 ) {
          if($olddue == 0 ){
               // add to box
            $box = Box::where('invoiceType','=',1)->where('invoice_id','=',$id)->first();
            $boxTheLatest = Box::orderBy('id','desc')->first();
            
            $box->type = 1;
            $box->date = $request['date'];
            $box->desc = 'Sell Invoice ( فاتورة مبيعات فورية الدفع)';
            $box->invoiceType  = 1;
            $box->invoice_id   = $id;

            $box->totl_value    = $box->totl_value + ( $request->total_value - $box->value ); 
            $boxTheLatest->totl_value = $boxTheLatest->totl_value + ($request->total_value - $box->value);
            $box->value = $request['total_value'];
            
            $box->save(); 
            $boxTheLatest->save();
              // End of add to box

             // update supplier balance
             $supplier_balance = SupplierStartBalance::where('invoice_id','=',$id)->first();
             $latestAction     = SupplierStartBalance::where('supplier_id',$request->supplier_id)->orderBy('id','desc')->first();
 
             $supplier_balance->supplier_id  = $request->supplier_id;
             $supplier_balance->depet_value  = $request['total_value'];
             $supplier_balance->payment_type = 1;
             $supplier_balance->date = $request->date;
             $supplier_balance->desc = 'Sell Invoice (فاتورة مبيعات فورية الدفع)';
             
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

              $box->type = 1;
              $box->value = $request['total_value'];
              $box->date = $request['date'];
              $box->desc = 'Sell Invoice (  فاتورة مبيعات فورية الدفع )';
              $box->invoiceType  = 1;
              $box->invoice_id  = $id;
         
              if(isset( $latestAction->totl_value ) ){
                  $box->totl_value = $latestAction->totl_value + $request['total_value'] ;
                }else{
                  $box->totl_value = 0 + $request['total_value'] ;
                }

              $box->save();

                // update supplier balance
                $supplier_balance = new SupplierStartBalance();
                $latestAction     = SupplierStartBalance::where('supplier_id',$request->supplier_id)->orderBy('id','desc')->first();
  
                $supplier_balance->supplier_id  = $request->supplier_id;
                $supplier_balance->depet_value  = $request['total_value'];
                $supplier_balance->payment_type = 1;
                $supplier_balance->date = $request->date;
                $supplier_balance->desc = 'Sell Invoice ( فاتورة مبيعات فورية الدفع )';
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
        } // end of $request['due'] == 0

        if( $request['due'] == 1 ) {
          if($olddue == 0 ){
               // box
                 $box = Box::where('invoice_id','=',$id)->first();
                 $removedBoxValue =  $box->value;
                 $removedBoxId    = $box->id;
                 if($box->delete()){
                   $boxTheLatest = Box::orderBy('id','desc')->first();
                   if($removedBoxId =! $boxTheLatest->id){
                       $boxTheLatest->totl_value = $boxTheLatest->totl_value - $removedBoxValue;
                       $boxTheLatest->save();
                   }
                 }
               // End of add to box

               // supplier 
               $supplier_balance = SupplierStartBalance::where('invoice_id','=',$id)->delete();
               // End of supplier
               
             }              
         
         swal()->button('Close Me')->message('تم',' تم حفظ فاتورة المبيعات مع العلم انه لم يتم تسدد قيمتها بعد','info'); 
       } // end of if request['due'] == 1

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

    function append(){
        $array = [
            'suppliers' => Supplier::where('type','=','1')->get(),
            'products'  => Product::all(),
            'categories'  => Category::all(),

        ];

        return $array;
    }

function getProductInfo (){
   $ProId = $_POST['ProId'];
   $product = Product::find($ProId);
   $product['getUnit'] = $product->getUnit->name;
   return response()->json($product);
 }

function getProductInfoByCode (){
$code = $_POST['code'];
$product = Product::where('code','=',$code)->get()->first();
if(!empty($product)){
$product['getUnit'] = $product->getUnit->name;
$product['catProducts'] = Product::where('category_id','=',$product->category_id)->get();
}
return response()->json($product);
}

}