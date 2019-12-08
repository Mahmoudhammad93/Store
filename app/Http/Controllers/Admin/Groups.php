<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackEndController;
use App\models\Group;
use App\models\permissions;
use App\Http\Requests\BackEnd\Group\Store as GroupStore;
class Groups extends BackEndController
{
    public function __construct(Group $model){
       return Parent::__construct($model);
    }

    public function store(GroupStore $request)
    {
        $row = $this->model;
        
        if($newGroup = $row->create($request->toArray())){

            // save permissions 

     if($request->itrator > 0){
      
        for($i=1 ; $i <= $request->itrator ; $i++){
            $menu       = "menu".$i;
            $add        = "add".$i;
            $edit       = "edit".$i;
            $delete     = "delete".$i;
            $view       = "view".$i;
            $search     = "search".$i;
            $print      = "print".$i;

         if( isset($request[$print]) || isset($request[$search]) || isset($request[$add]) || isset($request[$edit]) || isset($request[$delete]) || isset($request[$view])){
            if(isset($request[$menu]) && $request[$menu] !='' ){
            $permission    = new permissions();

            $permission->menu      = $request[$menu];
            $permission->group_id  = $newGroup->id;
            if(isset($request[$add])){
            $permission->add = $request[$add];
            }else{
            $permission->add = 0;
            }

            if(isset($request[$edit])){
            $permission->edit = $request[$edit];
            }else{
            $permission->edit = 0;
            }

            if(isset($request[$delete])){
            $permission->delete = $request[$delete];
            }else{
            $permission->delete = 0;
            }

            if(isset($request[$view])){
            $permission->view = $request[$view];
            }else{
            $permission->view = 0;
            }

            if(isset($request[$search])){
            $permission->search = $request[$search];
            }else{
            $permission->search = 0;
            }

            if(isset($request[$print])){
            $permission->print = $request[$print];
            }else{
            $permission->print = 0;
            }

            $permission->save();

          } // end if 2
        }   // endif  1

        } // end for loop
    }  // end if itrator


            swal()->button('Close Me')->message('تم','تم اضافة المجموعة بنجاح','info'); 
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info'); 
         }
        return redirect()->back();
       
    }

    public function show($id)
    {
        //
    }


    public function update(GroupStore $request,$id)
    {
        $row = $this->model->findOrFail($id);        
        if($row->update($request->toArray())){
           permissions::where('group_id','=',$row->id)->delete();

                    // save permissions 

     if($request->itrator > 0){
      
        for($i=1 ; $i <= $request->itrator ; $i++){
            $menu       = "menu".$i;
            $add        = "add".$i;
            $edit       = "edit".$i;
            $delete     = "delete".$i;
            $view       = "view".$i;
            $search     = "search".$i;
            $print      = "print".$i;

         if( isset($request[$print]) || isset($request[$search]) || isset($request[$add]) || isset($request[$edit]) || isset($request[$delete]) || isset($request[$view])){
            if(isset($request[$menu]) && $request[$menu] !='' ){
            $permission    = new permissions();

            $permission->menu      = $request[$menu];
            $permission->group_id  = $row->id;
            if(isset($request[$add])){
            $permission->add = $request[$add];
            }else{
            $permission->add = 0;
            }

            if(isset($request[$edit])){
            $permission->edit = $request[$edit];
            }else{
            $permission->edit = 0;
            }

            if(isset($request[$delete])){
            $permission->delete = $request[$delete];
            }else{
            $permission->delete = 0;
            }

            if(isset($request[$view])){
            $permission->view = $request[$view];
            }else{
            $permission->view = 0;
            }

            if(isset($request[$search])){
            $permission->search = $request[$search];
            }else{
            $permission->search = 0;
            }

            if(isset($request[$print])){
            $permission->print = $request[$print];
            }else{
            $permission->print = 0;
            }

            $permission->save();

          } // end if 2
        }   // endif  1

        } // end for loop
    }  // end if itrator


            swal()->button('Close Me')->message('تم','تمت عملية التعديل بنجاح','info'); 
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

    public function destroy($id)
    {
        $row = $this->model->find($id);
        permissions::where('group_id','=',$row->id)->delete();
        
        if($row->delete()){
            swal()->button('Close Me')->message('تم','تمت عملية مسح البيانات بنجاح','info'); 
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info'); 
         }
        return redirect()->back();
    }

}

