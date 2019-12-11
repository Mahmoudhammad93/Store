<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackEndController;
use App\Http\Requests\BackEnd\Doctor\Store as DoctorStore;
use App\models\Doctor;
use Illuminate\Http\Request;

class Doctors extends BackEndController
{
    public function __construct(Doctor $model)
    {
        return Parent::__construct($model);
    }

    public function store(Request $request)
    {
        $row = $this->model;

        if ($row->create($request->toArray())) {
            swal()->button('Close Me')->message('تم', 'تمت عملية الاضافة بنجاح', 'info');
        } else {
            swal()->button('Close Me')->message('Sorry !!', 'Your Process Not Completed !!', 'info');
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $row = $this->model->findOrFail($id);

        if ($row->update($request->toArray())) {
            swal()->button('Close Me')->message('تم', 'تمت عملية تعديل البيانات بنجاح', 'info');
        } else {
            swal()->button('Close Me')->message('Sorry !!', 'Your Process Faild !!', 'info');
        }
        return redirect()->back();
    }


    protected function filter($rows, $filterData)
    {
        foreach ($filterData as $key => $value) {
            if ($value != "") {
                $rows = $rows->where($key, '=', $value);
            }
        }
        return $rows;
    }
}
