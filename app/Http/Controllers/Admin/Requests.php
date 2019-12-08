<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Admin\BackEndController;
use App\models\Request;
use App\Http\Requests\BackEnd\Request\Store as RequestStore;

class Requests extends BackEndController
{
    public function __construct(Request $model){
        return Parent::__construct($model);
    }
    public function store(RequestStore $request)
    {
        $row = $this->model;

        if($row->create($request->toArray())){
            swal()->button('Close Me')->message('تم','تمت عملية الاضافة بنجاح','info');
        }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
        }
        return redirect()->back();
    }
    public function profile($id)
    {
        $request = Request::all($id);
        return View('Admin.suppliers.profile',compact('request'));
    }
}
