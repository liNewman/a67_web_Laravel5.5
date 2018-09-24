<?php

namespace App\Http\Controllers\Admin;

use App\Model\Set;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SetController extends Controller
{
    //
    protected $set;


    public function __construct()
    {
        parent::__construct();

        $this->set=new Set();

    }

   public function index(Request $request){


        $list=$request->all();
        $where='';

        if (isset($list['asso_id'])){
            $where.=" and id=".$list['asso_id'];
        }


        $data['art'] = DB::table('art_type')->get();
        $data['area'] = DB::table('area_type')->get();
        $data['asso'] = DB::table('asso_type')->get();
        $data['school'] = DB::table('school_type')->get();
        $data['info']=   DB::select('select * from info_type where 1 '.$where);
        //dd($data,$data2,$data3,$data4);

       foreach ($data['info'] as $k=>$v){
           $data['info'][$k]->art_type_name=DB::select('select name from art_type where id='.$v->art_id)[0];
           $data['info'][$k]->area_type_name=DB::select('select area_name from area_type where id='.$v->area_id)[0];
           $data['info'][$k]->area_school_name=DB::select('select name from school_type where id='.$v->school_id)[0];
           $data['info'][$k]->area_asso_name=DB::select('select name from asso_type where id='.$v->asso_id)[0];
       }

       $data['asso_url']=$this->cx($list,'asso_id');
       $data['list']=$list;


        return view('admin.set.index',$data);


    }
    public function cx($info,$delk){
        if(empty($info[$delk])){

            return $_SERVER['REQUEST_URI'];
        }
        if($info[$delk]){
            unset($info[$delk]);
        }
        return $_SERVER['REDIRECT_URL']."?".http_build_query($info);
    }












}
