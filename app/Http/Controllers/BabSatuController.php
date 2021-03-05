<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BabSatuController;
use Illuminate\Database\Eloquent\Builder;
use\App\Models\Artikel;
use Illuminate\Http\Request;

class BabSatuController extends Controller
{
    //soal1
    //Tampilkan artikel dengan id=17 dan users_id=160   
    public function a1(){
        $artikels=Artikel::where('id',17)->where('users_id',160)->get();
        return $artikels;
    }
    //soal2
    //Tampilkan artikel dengan id=2 dan users_id=5
    public function a2(){
        $artikels=Artikel::where('id',2)->orWhere('id',5)->get();
        return $artikels;
    }
    //soal3
    //Tampilkan artikel dengan id=32 dan user dengan nama=Aslijan Megantara, sertakan usernya
    public function a3(){
        $artikels=Artikel::where('id',34)->WhereHas('user',function (Builder $qquery){
            $qquery->where('name','Aslijan Megantara');
        })->with('user')->get();
        return $artikels;
    }
    //soal4
    //Tampilkan pengumuman yang dibuat oleh user yang membuat galeri dengan galeri id=269
    public function a4(){
        $pengumumans=Pengumuman::whereHas('user',function (Builder $query){
            $query->whereHas('galeris','function'( $query){
                $query->where('id',269)
            });
        })->with('user.galeris')->get();
        return $pengumumans;
    }
}
