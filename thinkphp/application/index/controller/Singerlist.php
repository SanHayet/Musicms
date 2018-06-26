<?php
namespace app\index\controller;
use think\Controller;


class Singerlist extends Controller
{
    public function singer()
    {
        $singerLst=db('singer') -> paginate(5);
        $si_sum = db('singer') -> count();
        $this -> assign([
           'singerLst' => $singerLst,
            'si_sum' => $si_sum,
        ]);
        return view();
    }

    public function singerRes()
    {
        $data=['name' => input('si_name')];
        $singerRes = db('singer')->where('si_name', 'like', $data)->select();
//        dump($singerRes);die();
        $this->assign([
            'singerRes' => $singerRes,
        ]);
        return view();
    }

}
