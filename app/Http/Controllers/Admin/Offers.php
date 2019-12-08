<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackEndController;
use App\models\Offer;
use App\Http\Requests\BackEnd\Offer\Store as OfferStore;
class Offers extends BackEndController
{
    public function __construct(Offer $model){
       return Parent::__construct($model);
    }

    public function store(OfferStore $request)
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


    public function update(OfferStore $request,$id)
    {
        $row = $this->model->findOrFail($id);

        if($row->update($request->toArray())){
            swal()->button('Close Me')->message('Done','You have successfully Update','info'); 
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

}
