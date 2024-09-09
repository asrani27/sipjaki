<?php

namespace App\Http\Controllers;

use App\Models\PJT;
use App\Models\IUJK;
use App\Models\Forum;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Halaman;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function beranda()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('superadmin')) {
                return redirect('superadmin/beranda');
            } elseif (Auth::user()->hasRole('pemohon')) {
                return redirect('pemohon');
            }
        }
        $berita = Berita::orderBy('id', 'DESC')->limit(6)->get()->split(2);
        $data1 = $berita[0];
        $data2 = $berita[1];

        $agenda = Agenda::orderBy('id', 'DESC')->get();
        $pengumuman = Pengumuman::orderBy('id', 'DESC')->get();
        return view('home', compact('data1', 'data2', 'agenda', 'pengumuman'));
    }
    public function struktur()
    {
        $data = Halaman::where('nama', 'struktur')->first();
        return view('struktur', compact('data'));
    }
    public function renstra()
    {
        $data = Halaman::where('nama', 'renstra')->first();
        return view('renstra', compact('data'));
    }
    public function tupoksi()
    {
        $data = Halaman::where('nama', 'tupoksi')->first();
        return view('tupoksi', compact('data'));
    }
    public function berita()
    {
        $berita = Berita::orderBy('id', 'DESC')->get();

        return view('berita', compact('berita'));
    }

    public function detailBerita($id, $slug)
    {
        $data = Berita::find($id);
        return view('detail_berita', compact('data'));
    }
    public function agenda()
    {
        $agenda = Agenda::orderBy('id', 'DESC')->get();
        return view('agenda', compact('agenda'));
    }
    public function pelatihan()
    {
        return view('pelatihan');
    }
    public function sertifikasi()
    {
        return view('sertifikasi');
    }
    public function bimtek()
    {
        return view('bimtek');
    }
    public function usaha()
    {
        return view('usaha');
    }
    public function penyelenggaraan()
    {
        return view('penyelenggaraan');
    }
    public function pemanfaatan()
    {
        return view('pemanfaatan');
    }
    public function iujk()
    {
        $data = IUJK::orderBy('id', 'DESC')->get();
        return view('iujk', compact('data'));
    }
    public function tdup()
    {
        return view('tdup');
    }
    public function bu()
    {
        return view('bu');
    }
    public function timpembina()
    {
        return view('timpembina');
    }
    public function standarbiaya()
    {
        return view('standarbiaya');
    }
    public function progresspaket()
    {
        return view('progresspaket');
    }
    public function skaskt()
    {
        return view('skaskt');
    }
    public function pjt()
    {
        $data = PJT::orderBy('id', 'DESC')->get();
        return view('pjt', compact('data'));
    }
    public function informasi()
    {
        return view('informasi');
    }
    public function laporan()
    {
        return view('laporan');
    }
    public function undangundang()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
        return view('undangundang');
    }
    public function pp()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
        return view('pp');
    }
    public function perpres()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
        return view('perpres');
    }
    public function permen()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
        return view('permen');
    }
    public function kepmen()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
        return view('kepmen');
    }
    public function edaran()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
        return view('edaran');
    }

    public function referensi()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
        return view('referensi');
    }

    public function perda()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
        return view('perda');
    }
    public function pergub()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
        return view('pergub');
    }
    public function perwali()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
        return view('perwali');
    }
    public function sk()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
        return view('sk');
    }
    public function forum()
    {
        $data = Forum::orderBy('id', 'DESC')->get();
        return view('forum', compact('data'));
    }
    public function detailForum($id, $slug)
    {
        $data = Forum::find($id);
        return view('detail_forum', compact('data'));
    }
}
