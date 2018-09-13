<?php

namespace App\Http\Controllers;

use App\Model\Permissions;
use App\Permission;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



   public function __construct()
    {
        //$permission=new Permission();

        //view()->share('userINfo',$this->getUser());
        //dd($permission->menus());

        //view()->share('menus',$permission->menus());

        $permission=new Permissions();

        view()->share('userInfo',$this->getUser());

        view()->share('menus',$permission->menus());

        if (empty($this->getUser())){
            return redirect('/admin/login')->send();
        }
    }

    public function getUser(){

        $userInfo=$_SESSION;
        if (isset($session['user_info'])){
            return json_encode($userInfo['user_info'],true);
        }else{
            return $userInfo;
        }
    }

    public function delToken(array $parms){

       if (empty($parms)){
           return [];
       }

        if (isset($parms['_token'])){
            unset($parms['_token']);
        }
        return $parms;
    }


    public function storeRecord(array $params,$object){
        if(empty($params)){
            return false;
        }
        foreach($params as $key => $item){
            $object->$key = $item;
        }
        return $object->save();
        //dd($object);
    }




    public function uploadFile($files)
    {
       if (empty($files)){
           return '/images/photos/loggeduser.png';
       }

       $basePath="uploads/".date('Y-m-d',time());

       if (!file_exists($basePath)){
           mkdir($basePath,755,true);
       }

       $filename="/".date('YmdHis',time()).".".$files->extension();

       move_uploaded_file($files->path(),$basePath.$filename);

       return"/".$basePath.$filename;

    }

    public function formatPermissionId(array $array){
       if (empty($array)){
           return [];
       }

       $data=[];

       foreach ($array as $value){
          $data[]=$value['permission_id'];
       }

       return $data;
    }


}





