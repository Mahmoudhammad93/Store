<?php

namespace App\Http\Controllers\Admin;

use App\models\Clinic;
use App\models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BackEndController;

class Clinics extends BackEndController
{
    public function __construct(Clinic $model)
    {
        return Parent::__construct($model);
    }

    function append(){
        $array = [
            'doctors' => Doctor::all(),
            'clinics' => Clinic::all()
        ];

        return $array;
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
        return redirect('backend/clinics');
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
