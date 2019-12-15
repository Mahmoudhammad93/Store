<?php

namespace App\Http\Controllers\Admin;

use \App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BackEndController;
use App\Http\Requests\BackEnd\Service\Store as ServicesStore;

class Services extends BackEndController
{
    public function __construct(Service $model){
        return Parent::__construct($model);
    }


    public function store(ServicesStore $request)
    {
        $request->validate([
            'c_name' => 'required|unique:services'
        ]);
        $row = $this->model;
        if($row->create($request->toArray())){
            swal()->button('Close Me')->message('تم','تمت عملية الاضافة بنجاح','info');
        }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
        }
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function update(ServicesStore $request, $id)
    {
        $row = $this->model->findOrFail($id);

        if($row->update($request->toArray())){
            swal()->button('Close Me')->message('تم','تمت عملية تعديل البيانات بنجاح','info');
        }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
        }
        return redirect('backend/services');
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
