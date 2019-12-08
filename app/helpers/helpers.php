<?php

 function is_active($myroute){
    return request()->segment(2) !="" && request()->segment(2) == $myroute ? "active" : "";
  }

  function is_permited($menu,$option){
    $permitions = Auth::user()->gteGroup->SpecificPermissions($menu)->first();
    return $permitions[$option] ;
  }

  function doPrintFunction (){
    return "onload"."="."window"."."."print()".";";
  }

?>
