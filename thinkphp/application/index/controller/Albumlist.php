<?php
namespace app\index\controller;
use think\Controller;


class Albumlist extends Controller
{
    public function album()
    {
        $albumLst=db('album') -> paginate(5);
        $al_sum = db('album') -> count();
        $this -> assign([
           'albumLst' => $albumLst,
            'al_sum' => $al_sum,
        ]);
        return view();
    }

    public function del($id)
    {
        $del = db('album')->delete($id);
        if($del)
        {
            $this->success('删除栏目成功', url('album'));
        }else{
            $this->error('删除栏目失败');
        }
    }

    public function albumRes()
    {
        $data=['name' => input('al_name')];
        $albumRes = db('album')->where('al_name', 'like', $data)->select();
        $this->assign([
            'albumRes' => $albumRes,
        ]);
        return view();
    }



}
