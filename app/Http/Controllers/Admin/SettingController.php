<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    public function update(Request $req)
    {
        $product = Setting::first();
        $product->name = $req['name'];
        $product->title = $req['title'];
        $product->address = $req['address'];
        $product->phone = $req['phone'];
        $product->holine = $req['holine'];
        $product->facebook = $req['facebook'];
        $product->zalo = $req['zalo'];
        $product->contact_info = $req['contact_info'];
        $product->title_seo = $req['title_seo'];
        $product->meta_des = $req['meta_des'];
        $product->meta_key = $req['meta_key'];
        $product->save();
        return redirect()->route('admin.setting');
    }

    public function index()
    {
        $product = Setting::first();
        return view('admin.setting.index', compact('product'));
    }

    public function create()
    {

        return view('admin.setting.create');
    }

    public function postCreate(Request $req)
    {
        $setting = new Setting;
        $setting->name = $req['name'];
        $setting->save();
        return view('admin.setting.create');
    }
}
