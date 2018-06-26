<?php
namespace app\admin\controller;
use think\Controller;


class Songlist extends Controller
{
    public function song()
    {
        $songLst = db('song')->paginate(5);
        $so_sum = db('song') -> count();
        $this->assign([
            'songLst' =>$songLst,
            'so_sum' => $so_sum,
        ]);

        return view();
    }

    public function del($id)
    {
        $del = db('song')->delete($id);
        if($del)
        {
            $this->success('删除栏目成功', url('song'));
        }else{
            $this->error('删除栏目失败');
        }
    }

    public function songRes()
    {
        $data=['name' => input('so_name')];
        $songRes = db('song')->where('so_name', 'like', $data)->select();
        $this->assign([
            'songRes' => $songRes,
        ]);
        return view();
    }

}
