<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackEndController;
use App\models\User;
use App\models\Group;
use App\Http\Requests\BackEnd\User\Store as UserStore;
use App\Http\Requests\BackEnd\User\Update as UserUpdate;
class Users extends BackEndController
{
    public function __construct(User $model){
       return Parent::__construct($model);
    }

    public function store(UserStore $request)
    {
        $row = $this->model;
        var_dump($request->name);
        $request['password'] = bcrypt($request->password);
        if($row->create($request->toArray())){
            swal()->button('Close Me')->message('تم','تم اضافة مستخدم بنجاح','info');
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
         }
        return redirect('backend/users');

    }

    public function show($id)
    {
        //
    }


    public function update(UserUpdate $request,$id)
    {
        $row = $this->model->findOrFail($id);
        if(isset($request->password) && $request->password != ""){
          $request['password'] = bcrypt($request->password);
        }else{
        unset($request['password']);
        }


        if($row->update($request->toArray())){
            swal()->button('Close Me')->message('تم','تم تعديل البيانات بنجاح','info');
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
         }
        return redirect()->back();
    }

    function append(){
        $array = [
            'groups' => Group::all(),
        ];

        return $array;
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

