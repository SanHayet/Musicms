<?php
namespace app\admin\controller;
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

    public function del($id)
    {
        $del = db('singer')->delete($id);
        if($del)
        {
            $this->success('删除栏目成功', url('singer'));
        }else{
            $this->error('删除栏目失败');
        }
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
