<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/9/17
 * Time: 8:19
 */

namespace App\Http\Controllers\Study;


use App\Http\Controllers\Controller;
use App\Model\Guess;
use yii\web\Request;

class Guess1Controller extends Controller
{
    public function create(Request $request)
    {
        $assign['list'] = Guess::get();

        return view('study.guess.create', $assign);
    }

    public function doCreate(Request $request)
    {
        $params = $request->all();

        $result = [
            'code' => 200,
            'msg'  => '添加球队成功',
        ];

        if(isset($params['_token'])){
            unset($params['_token']);

            $guess = new Guess();

            foreach($params as $key => $item){
                $guess->$key = $item;

            }

            $res = $guess->save();
            if(!$res){
                $result = [
                    'code' => 500,
                    'msg'  => "添加球队失败"
                ];
            }
        }
        return json_encode($result);
    }

    public function doGuess(Request $request)
    {
        $id = $request-> input('id', 0);
        $type = $request->input('type', 0);
        $assign['info'] = Guess::where('id', $id)->first();

        $assign['results'] = $this->getResults();


    }
}