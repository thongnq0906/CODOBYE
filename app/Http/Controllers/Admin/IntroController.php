<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Intro;
use App\Http\Requests\IntroRequest;
use Image;
use Illuminate\Support\Facades\Validator;

class IntroController extends Controller
{
    public function index()
    {
        $intro = Intro::paginate(10);

        return view('admin.intro.index', compact('intro'));
    }

    public function create()
    {

        return view('admin.intro.create');
    }

    public function postCreate(IntroRequest $req)
    {
        $intro = new Intro;
        $intro->name = $req['name'];
        $intro->slug = str_slug($req['name']);
        $intro->position = $req['position'];
        $intro->status = (is_null($req['status']) ? '0' : '1');
        $intro->description = $req['description'];
        $intro->title_seo = $req['title_seo'];
        $intro->meta_key = $req['meta_key'];
        $intro->meta_des = $req['meta_des'];
        $intro->save();

        return redirect()->route('admin.intro.index');
    }

    public function update($slug)
    {
        $intro = Intro::where('slug', $slug)->first();

        return view('admin.intro.edit', compact('intro'));
    }

    public function postUpdate($slug, Request $req)
    {
        $intro = Intro::where('slug', $slug)->first();
        $intro->name = $req['name'];
        $intro->slug = str_slug($req['name']);
        $intro->position = $req['position'];
        $intro->status = (is_null($req['status']) ? '0' : '1');
        $intro->description = $req['description'];
        $intro->title_seo = $req['title_seo'];
        $intro->meta_key = $req['meta_key'];
        $intro->meta_des = $req['meta_des'];
        $validatedData = $req->validate([
            'name' => 'required|unique:intros,name,' .$intro->id,
            'position' => 'numeric|nullable|min:0|unique:intros,position,' .$intro->id,
        ]);
        $intro->save();

        return redirect()->route('admin.intro.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Intro::findOrFail($id);
        if(file_exists($result->image))
        {
            unlink($result->image);
        }
        $result->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function open($id)
    {
        $result = Intro::where('id', $id)->first();
        $result->status = 1;
        $result->save();

        return back();
    }

    public function close($id)
    {
        $result = Intro::where('id', $id)->first();
        $result->status = 0;
        $result->save();

        return back();
    }
}
