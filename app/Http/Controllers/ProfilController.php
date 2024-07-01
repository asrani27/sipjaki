<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller
{
    public function index()
    {
        $data = Auth::user();
        return view('pemohon.profil.index', compact('data'));
    }

    public function struktur()
    {
        $data = Halaman::where('nama', 'struktur')->first();
        return view('admin.profil.struktur', compact('data'));
    }
    public function update_struktur(Request $req)
    {
        Halaman::where('nama', 'struktur')->first()->update(['isi' => $req->isi]);
        Session::flash('success', 'Di Update');
        return back();
    }
    public function renstra()
    {
        $data = Halaman::where('nama', 'renstra')->first();
        return view('admin.profil.renstra', compact('data'));
    }
    public function update_renstra(Request $req)
    {
        Halaman::where('nama', 'renstra')->first()->update(['isi' => $req->isi]);
        Session::flash('success', 'Di Update');
        return back();
    }
    public function tupoksi()
    {
        $data = Halaman::where('nama', 'tupoksi')->first();
        return view('admin.profil.tupoksi', compact('data'));
    }
    public function update_tupoksi(Request $req)
    {
        Halaman::where('nama', 'tupoksi')->first()->update(['isi' => $req->isi]);
        Session::flash('success', 'Di Update');
        return back();
    }
}
