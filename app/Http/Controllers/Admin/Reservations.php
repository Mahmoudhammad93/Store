<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BackEndController;
use App\models\Reservation;
use App\models\User;
use App\Http\Requests\BackEnd\Reservation\Store as ReservationsStore;

class Reservations extends BackEndController
{
    public function __construct(Reservation $model){
        $user = User::all();
       return Parent::__construct($model);
    }

    public function store(ReservationsStore $request)
    {
        $row = $this->model;
        $rules = ['Lno' => 'numeric|min:2'];
        if($row->create($request->toArray())){
            if($request->patient_no == $rules){
                swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
            }else{
                swal()->button('Close Me')->message('تم','تمت عملية الاضافة بنجاح','info');
            }
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
         }
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }


    public function update(Reservation $request,$id)
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
        $reservation = Reservation::find($id);
        $PageTitle = "reservation";
        $headerLevelProcessTitle1 = $PageTitle;
        $headerLevelProcessTitle2 = $reservation['name'];
        $buttonsRoutsname = $modelViewName = $PageTitle;

        return View('Admin.patient.profile',compact('reservation','PageTitle','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
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
