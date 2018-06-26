<?php
namespace app\admin\controller;
use think\Controller;

class Editsth extends Controller
{
    public function editSong($id)
    {
        $myself = db('song') -> find($id);
        $this -> assign([
           'myself' => $myself,
        ]);

        if(request() -> isPost())
        {
            $data = [
                'so_name' => input('so_name'),
                'so_singer' => input('so_singer'),
                'so_style' => input('so_style'),
                'so_language' => input('so_language'),
                'so_album' => input('so_album'),
                'so_file' => input('so_file')
            ];

            $save = db('song') -> where('id', $id) ->update($data);
            if($save !== false)
            {
                $this->success('success!','Songlist/song');
            }else{
                $this->error('fail!');
            }
        }


        return view();
    }

    public function editSinger($id)
    {
        $myself=db('singer') -> find($id);
        $this -> assign([
            'myself' => $myself,
        ]);

        if(request() -> isPost())
        {
            $data = [
                'si_name'    => input('si_name'),
                'si_sex'     => input('si_sex'),
                'si_area'    => input('si_area'),
                'si_company' => input('si_company'),
            ];

            $save = db('singer') -> where('id', $id) ->update($data);
            if($save !== false)
            {
                $this->success('success!','Singerlist/singer');
            }else{
                $this->error('fail!');
            }
        }


        return view();
    }

    public function editAlbum($id)
    {
        $myself=db('album') -> find($id);
        $this -> assign([
            'myself' => $myself,
        ]);

        if(request() -> isPost())
        {
            $data = [
                'al_name'   => input('al_name'),
                'al_time'   => input('al_time'),
                'al_singer' => input('al_singer'),
            ];

            $save = db('album') -> where('id', $id) ->update($data);

            if($save !== false)
            {
                $this->success('success!','Albumlist/album');
            }else{
                $this->error('fail!');
            }
        }

        return view();
    }
}
















