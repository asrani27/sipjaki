<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function header()
    {
        $data = Setting::where('nama', 'header')->first();
        return view('admin.setting.header', compact('data'));
    }
    public function updateHeader(Request $req)
    {

        if ($req->gambar != null) {
            $validator = Validator::make($req->all(), [
                'gambar'  => 'mimes:jpg,jpeg,png|max:1024'
            ]);

            if ($validator->fails()) {
                $req->flash();
                Session::flash('error', 'File harus gambar dan Maks 1MB');
                return back();
            }

            $path = public_path('storage') . '/header';

            $gambar = $req->file('gambar');
            $ext = $req->gambar->getClientOriginalExtension();
            $filename = 'gambar' . uniqid() . '.' . $ext;

            Storage::disk('minio')->putFileAs('sipjaki', $gambar, $filename);
            //$gambar->move($path, $filename);
        } else {
            $filename = Setting::where('nama', 'header')->first()->file;
        }

        $update = Setting::where('nama', 'header')->first();
        $update->file = $filename;
        $update->save();

        Session::flash('success', 'Di Update');
        return back();
    }

    public function slideshow()
    {
        $data1 = Setting::where('nama', 'slide1')->first();
        $data2 = Setting::where('nama', 'slide2')->first();
        $data3 = Setting::where('nama', 'slide3')->first();
        return view('admin.setting.slideshow', compact('data1', 'data2', 'data3'));
    }
    public function updateSlide1(Request $req)
    {

        if ($req->gambar != null) {
            $validator = Validator::make($req->all(), [
                'gambar'  => 'mimes:jpg,jpeg,png|max:1024'
            ]);

            if ($validator->fails()) {
                $req->flash();
                Session::flash('error', 'File harus gambar dan Maks 1MB');
                return back();
            }


            $gambar = $req->file('gambar');
            $ext = $req->gambar->getClientOriginalExtension();
            $filename = 'slide1' . uniqid() . '.' . $ext;
            Storage::disk('minio')->putFileAs('sipjaki', $gambar, $filename);
        } else {
            $filename = Setting::where('nama', 'slide1')->first()->file;
        }

        $update = Setting::where('nama', 'slide1')->first();
        $update->file = $filename;
        $update->save();

        Session::flash('success', 'Di Update');
        return back();
    }
    public function updateSlide2(Request $req)
    {

        if ($req->gambar != null) {
            $validator = Validator::make($req->all(), [
                'gambar'  => 'mimes:jpg,jpeg,png|max:1024'
            ]);

            if ($validator->fails()) {
                $req->flash();
                Session::flash('error', 'File harus gambar dan Maks 1MB');
                return back();
            }


            $gambar = $req->file('gambar');
            $ext = $req->gambar->getClientOriginalExtension();
            $filename = 'slide2' . uniqid() . '.' . $ext;
            Storage::disk('minio')->putFileAs('sipjaki', $gambar, $filename);
        } else {
            $filename = Setting::where('nama', 'slide2')->first()->file;
        }

        $update = Setting::where('nama', 'slide2')->first();
        $update->file = $filename;
        $update->save();

        Session::flash('success', 'Di Update');
        return back();
    }
    public function updateSlide3(Request $req)
    {
        if ($req->gambar != null) {
            $validator = Validator::make($req->all(), [
                'gambar'  => 'mimes:jpg,jpeg,png|max:1024'
            ]);

            if ($validator->fails()) {
                $req->flash();
                Session::flash('error', 'File harus gambar dan Maks 1MB');
                return back();
            }

            $gambar = $req->file('gambar');
            $ext = $req->gambar->getClientOriginalExtension();
            $filename = 'slide3' . uniqid() . '.' . $ext;
            Storage::disk('minio')->putFileAs('sipjaki', $gambar, $filename);
        } else {
            $filename = Setting::where('nama', 'slide3')->first()->file;
        }

        $update = Setting::where('nama', 'slide3')->first();
        $update->file = $filename;
        $update->save();

        Session::flash('success', 'Di Update');
        return back();
    }
}
