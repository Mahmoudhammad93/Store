<?php

namespace App\Http\Controllers\Admin;
use Softon\SweetAlert\Facades\SWAL; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackEndController extends Controller
{
    protected $model ;
    
    public function __construct($model){
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $filterData = $request->all();
        
        $rows = $this->model;
        if(!empty($this->with())){
         $rows = $rows->with($this->with());   
        }
        if(isset( $filterData['page'] ) ){
           unset($filterData['page']);  
        }

        $rows = $this->filter($rows,$filterData);
        $rows = $rows->orderBy('id','desc')->paginate(10);
        $PageTitle = $this->getpluralModelname();
        
        $headerLevelProcessTitle1 = $this->getpluralModelname();
        $headerLevelProcessTitle2 = "All";
        $buttonsRoutsname = $modelViewName = $this->getModelViewName();
        $databind  = $this->append();

        return View('Admin.'.$modelViewName.'.index',compact('filterData','rows','databind','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
    }

    public function create()
    {        
        $PageTitle = $this->getpluralModelname();
        $headerLevelProcessTitle1 = $this->getpluralModelname();
        $headerLevelProcessTitle2 = "Add";
        $buttonsRoutsname = $modelViewName = $this->getModelViewName();
        $databind  = $this->append();
        
        return View('Admin.'.$modelViewName.'.add',compact('databind','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
    }

    public function edit($id)
    {
        
        $row = $this->model->findOrFail($id);
        $PageTitle = $this->getpluralModelname();
        $headerLevelProcessTitle1 = $this->getpluralModelname();
        $headerLevelProcessTitle2 = "Edit";
        $buttonsRoutsname = $modelViewName = $this->getModelViewName();
        $databind  = $this->append();
        return View('Admin.'.$modelViewName.'.edit',compact('row','databind','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
    }

    public function print(Request $request ){
        $dataIds = $request->all();
        unset($dataIds['_token']);

        $rows = $this->model->whereIn('id',$dataIds)->orderBy('id','desc')->get();
        $PageTitle = $this->getpluralModelname();
        $headerLevelProcessTitle1 = $this->getpluralModelname();
        $headerLevelProcessTitle2 = "Print";
        $buttonsRoutsname = $modelViewName = $this->getModelViewName();
        $printOrder = "doPrint";

        return View('Admin.'.$modelViewName.'.print',compact('rows','printOrder','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
       
    }

    public function destroy($id)
    {
        $row = $this->model->find($id);
        
        if($row->delete()){
            swal()->button('Close Me')->message('تم','تمت عملية مسح البيانات بنجاح','info'); 
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info'); 
         }
        return redirect()->back();
    }

    protected function getModelViewName(){
        return str_plural(strtolower(class_basename($this->model)));
    }

    protected function filter($rows,$filterData){
        return $rows;
    }

    protected function getpluralModelname(){
        return str_plural(class_basename($this->model)); 
    }

    protected function with(){
        return [];
    }

    protected function append(){
        return [];
    }

    
}
