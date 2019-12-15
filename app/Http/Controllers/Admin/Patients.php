<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BackEnd\Patient\Store as PatientsStore;
use App\Http\Controllers\Admin\BackEndController;
use App\models\Clinic;
use App\models\Doctor;
use App\models\Patient;
use App\models\User;
use Illuminate\Http\Request;

class Patients extends BackEndController
{
    public function __construct(Patient $model){
        return Parent::__construct($model);
    }

    function append(){
        $array = [
            'clinics' => Clinic::all(),
            'doctors' => Doctor::all()
        ];

        return $array;
    }

    public function store(PatientsStore $request)
    {
        $request->validate([
            'patient_no' => 'required|unique:patients'
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


    public function update(Patient $request,$id)
    {
        $row = $this->model->findOrFail($id);

        if($row->update($request->toArray())){
            swal()->button('Close Me')->message('تم','تمت عملية تعديل البيانات بنجاح','info');
        }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
        }
        return redirect()->back();
    }

    public function profile($id)
    {
        $patient = Patient::find($id);
        $PageTitle = "patient";
        $headerLevelProcessTitle1 = $PageTitle;
        $headerLevelProcessTitle2 = $patient['name'];
        $buttonsRoutsname = $modelViewName = $PageTitle;

        return View('Admin.patient.profile',compact('patient','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
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
