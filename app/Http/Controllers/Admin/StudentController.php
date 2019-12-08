<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackEndController;
use App\Http\Requests\BackEnd\Student\Store as StudentStore;
use DB;
use App\Student;
use App\Branch;

class StudentController extends BackEndController
{
    
    public function __construct(Student $model){
        return Parent::__construct($model);
    }
    
    public function store(StudentStore $request)
    {
        $row = $this->model;
        
        if($row->create($request->toArray())){
            swal()->button('Close Me')->message('Done','You have successfully Add','info'); 
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info'); 
         }
        return redirect()->back();
       
    }

    public function show($id)
    {
        //
    }


    public function update(StudentStore $request,$id)
    {
        $row = $this->model->findOrFail($id);
        

        if($row->update($request->toArray())){
            swal()->button('Close Me')->message('Done','You have successfully Update','info'); 
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info'); 
         }

        return redirect()->back();
    }

    function append(){
        $array = [
            'branches' => Branch::all(),
        ];

        return $array;
    }

    function with(){
        return ['getBranch'];
    }

    protected function filter($rows,$filterData){
        foreach($filterData as $key => $value){
          if($value !=""){
            $rows = $rows->where($key,'=',$value);
          }
        }
        return $rows;
    }


}
