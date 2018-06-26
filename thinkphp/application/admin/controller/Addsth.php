<?php
namespace app\admin\controller;
use think\Controller;

class Addsth extends Controller
{
    public function addSong()
    {
        if(request() -> isPost()){
//            $data = input('post.');
//            $add = db('song') -> isnert($data);

//            $file = request()->file('so_file');
//            // 移动到框架应用根目录/public/uploads/ 目录下
//            if($file){
//                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
//                if($info){
//                    // 成功上传后 获取上传信息
//                    // 输出 jpg
//                    echo $info->getExtension();
//                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//                    echo $info->getSaveName();
//                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
//                    echo $info->getFilename();
//                    $image = $info->getSaveName();
//                }else{
//                    // 上传失败获取错误信息
//                    echo $file->getError();
//                }
//            }

            $data = [
                'so_name' => input('so_name'),
                'so_singer' => input('so_singer'),
                'so_style' => input('so_style'),
                'so_language' => input('so_language'),
                'so_album' => input('so_album'),
                'so_file' => input('so_file')
            ];
            if(db('song')->insert($data))
            {
                $this->success('success!','Songlist/song');
            }else{
                $this->error('fail!');
            }
        }

        return view();
    }

    public function addSinger()
    {
        if(request() -> isPost())
        {
            $data = [
                'si_name'    => input('si_name'),
                'si_sex'     => input('si_sex'),
                'si_area'    => input('si_area'),
                'si_company' => input('si_company'),
            ];
            if(db('singer')->insert($data))
            {
                $this->success('success!','Singerlist/singer');
            }else{
                $this->error('fail!');
            }
        }
        return view();
    }

    public function addAlbum()
    {
        if(request() -> isPost())
        {
            $data = [
                'al_name'   => input('al_name'),
                'al_time'   => input('al_time'),
                'al_singer' => input('al_singer'),
            ];

            if(db('album')->insert($data))
            {
                $this->success('success!','Albumlist/album');
            }else{
                $this->error('fail!');
            }
        }

        return view();
    }

//    public function upload()
//    {
//        // 获取表单上传文件 例如上传了001.jpg
//        $file = request()->file('so_file');
//
//        // 移动到框架应用根目录/public/uploads/ 目录下
//        if($file)
//        {
//            $info = $file->move(ROOT_PATH . 'public' . DS .'static'. DS . 'uploads');
//            if($info){
//                // 成功上传后 获取上传信息
//                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//                return $info->getSaveName();
//            }else{
//                // 上传失败获取错误信息
//                echo $file->getError();
//                die();
//            }
//        }
//        if($_FILES['so_file'])
//        {
//            $data['so_file']=$this->upload();
//        }
//    }


}
















