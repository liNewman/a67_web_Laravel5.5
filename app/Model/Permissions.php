<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    //

    protected $table="permissions";



    public function getPermissionsByFid($id = 0){
       $list=self::where('fid',$id)
           ->orderBy('id','desc')
           ->get();

       return $list;
    }

    public function menus(){
        $menus=self::select('id','fid','name','url')
            ->where('is_menu',1)
            ->orderBy('id','desc')
            ->orderBy('sort','asc')
            ->get()
            ->toArray();
        $menus=$this->getTreeByRecursive($menus);
        //dd($menus);
        return $menus;

         $currentUrl=$_SERVER['REDIRECT_URL'];
          //dd($currentUrl);
        foreach ($menus as $key=>$menu){

            if (isset($menu['son'])){
               $class="nav-parent";
                foreach ($menu['son'] as $k=>$sub){
                    //dd($currentUrl);
                    if ($sub['url']==$currentUrl){
                        $class.="nav-parent";

                        $menus['son']['$k']['class']='active';
                    }
                }
                $menus[$key]['class']=$class;
            }
            }




    }

    public function getTreeByRecursive(array $menus,$fid=0){
        if (empty($menus)){
            return[];
        }
        static $list=[];

        foreach ($menus as $key=>$menu){

            if ($menu['fid']==$fid){

                if (isset($list[$fid])){
                    $list[$fid]['son'][$menu['id']]=$menu;
                }else{
                    $list[$menu['id']]=$menu;
                }

                unset($menus[$key]);

                $this->getTreeByRecursive($menus,$menu['id']);
            }
        }

        return $list;
    }

    public function getAllPermissions(){
        $permissions=self::select('id','fid','name','url','is_menu')
            ->orderBy('sort','asc')
            ->get()
            ->toArray();

        $permissions=$this->getTreeByRecursive($permissions);

        return $permissions;


    }



}
