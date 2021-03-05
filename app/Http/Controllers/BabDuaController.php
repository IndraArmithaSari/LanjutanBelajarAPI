<?php

namespace App\Http\Controllers;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class BabDuaController extends Controller
{
    //soal5
    //Tampilkan pengumuman yang dibuat oleh user yang membuat galeri dengan nama kategori galeri  yang diawali dengan Aut 
    public function a5(){
         $pengumumans=Pengumuman::whereHas('user',function($query){
            $query->whereHas('galeris',function ($query){
                $query->whereHas('kategoriGaleri',function ($query){
                    $query->where('nama','like','aut%');
                });
            });
         })->with('user.galeris.kategoriGaleri')->get();
         return $pengumumans;
    }
    //soal6
    //Tampilkan pengumuman yang dibuat oleh user yang membuat galeri dan juga membuat berita
    public function a6(){
        $pengumumans=Pengumuman::whereHas('user',function($q){
            $q->whereHas('galeris')->orHas('beritas');     
        })->count();
        return $pengumumans;
    }
}
