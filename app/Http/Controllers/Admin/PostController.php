<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Cate_post;
use Image;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        $data=Cate_post::select('id','name','parent_id')->get()->toArray();

        return view('admin.post.index', compact('post', 'data'));
    }

    public function create()
    {
        $data=Cate_post::select('id','name','parent_id')->get()->toArray();
        return view('admin.post.create', compact('data'));
    }

    public function postCreate(PostRequest $req)
    {
        $post = new Post;
        $post->name = $req['name'];
        $post->slug = str_slug($req['name']);
        $post->cate_post_id = $req['cate_post_id'];
        $post->position = $req['position'];
        $post->status = (is_null($req['status']) ? '0' : '1');
        $post->is_home = (is_null($req['is_home']) ? '0' : '1');
        $post->title = $req['title'];
        $post->description = $req['description'];
        $post->title_seo = $req['title_seo'];
        $post->meta_key = $req['meta_key'];
        $post->meta_des = $req['meta_des'];
        if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(400,225)->save(public_path('images/upload/'.$filename));

            $post->image = ('images/upload/'.$filename);

        }
        $post->save();

        return redirect()->route('admin.post.index');
    }

    public function update($slug)
    {
        $data=Cate_post::select('id','name','parent_id')->get()->toArray();
        $post = Post::where('slug', $slug)->first();

        return view('admin.post.edit', compact('data', 'post'));
    }

    public function postUpdate($slug, Request $req)
    {
        $post = Post::where('slug', $slug)->first();
        $post->name = $req['name'];
        $post->slug = str_slug($req['name']);
        $post->cate_post_id = $req['cate_post_id'];
        $post->position = $req['position'];
        $post->status = (is_null($req['status']) ? '0' : '1');
        $post->is_home = (is_null($req['is_home']) ? '0' : '1');
        $post->title = $req['title'];
        $post->description = $req['description'];
        $post->title_seo = $req['title_seo'];
        $post->meta_key = $req['meta_key'];
        $post->meta_des = $req['meta_des'];
        if($req->hasFile('image')){
            if(file_exists($post->image))
            {
                unlink($post->image);
            }
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(400,225)->save(public_path('images/upload/'.$filename));
            $post->image = ('images/upload/'.$filename);
        }
        $validatedData = $req->validate([
            'name' => 'required|unique:posts,name,' .$post->id,
            'position' => 'numeric|nullable|min:0|unique:posts,position,' .$post->id,
        ]);
        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Post::findOrFail($id);
        if(file_exists($result->image))
        {
            unlink($result->image);
        }
        $result->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function search(Request $req)
    {
        $id_cate_post = $req->cate_post;
        if($id_cate_post == 0){
            return redirect()->route('admin.post.index');
        }
        session()->put('id',$id_cate_post);
        $data=Cate_post::select('id','name','parent_id')->get()->toArray();
        $post = Post::orderBy('position','ASC')->where(function($query)
        {
            $pro = $query;
            $id = session('id');
            $cate_post = Cate_post::find($id);
            // dd($id);
            $pro = $pro->orWhere('cate_post_id',$cate_post->id); // bài viết có id của danh muc cha cấp 1.
            // dd($pro);
            $com = Cate_post::where('parent_id',$cate_post->id)->get();//danh mục cha cấp 2.

            foreach ($com as $dt) {
                $pro = $pro->orWhere('cate_post_id',$dt->id);// bài viết có id của danh muc cha cấp 2.
            }
            // dd($pro);
            session()->forget('id');//xóa session;
        })->get();

        return view('admin.post.search', compact('post', 'data', 'id_cate_post'));
    }

    public function checkbox(Request $req)
    {
        $checkbox = $req->checkbox;
        if(!isset($req->checkbox))
        {
            return back()->with('success', 'Chưa chọn bài');
        }
        if($req->select_action == 1)
        {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result = Post::findOrFail($c);
                if(file_exists($result->image))
                {
                    unlink($result->image);
                }
                $result->delete();
            }

            return redirect()->back()->with('success', 'Xóa thành công');
        }
        if($req->select_action == 2)
        {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result = Post::where('id', $c)->first();
                $result->status = 1;
                $result->save();
            }

            return back()->with('success', 'Thao tác thành công');
        }

        if($req->select_action == 3)
        {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result = Post::where('id', $c)->first();
                $result->status = 0;
                $result->save();
            }

            return back()->with('success', 'Thao tác thành công');
        }
        if($req->select_action == 0)
        {

            return back()->with('success', 'Chưa chọn thao tác');
        }
        if($checkbox == NULL){

            return back()->with('success', 'Bạn chưa chọn cái nào');
        }
    }

    public function open($id)
    {
        $result = Post::where('id', $id)->first();
        $result->status = 1;
        $result->save();

        return back();
    }

    public function close($id)
    {
        $result = Post::where('id', $id)->first();
        $result->status = 0;
        $result->save();
        return back();
    }

    public function open_home($id)
    {
        $result = Post::where('id', $id)->first();
        $result->is_home = 1;
        $result->save();

        return back();
    }

    public function close_home($id)
    {
        $result = Post::where('id', $id)->first();
        $result->is_home = 0;
        $result->save();

        return back();
    }
}
