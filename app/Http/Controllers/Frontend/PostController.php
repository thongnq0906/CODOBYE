<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Cate_post;
use Illuminate\Support\Collection;

class PostController extends Controller
{
    public function listPost($id)
    {
        // $cate_post = Cate_post::where('parent_id', $id)->get()->toArray();

        // dd($cate_post[0]);
        // if(count($cate_post) != 0)
        // {
        //     $post = Post::where('status', 1)->where('cate_post_id', $cate_post->id)->orWhere('cate_post_id', $id)->get();
        // }else{
        //     $post = Post::where('cate_post_id', $id)->get();
        // }
        $cate_post = Cate_post::where('id', $id)->first();
        session()->put('id',$id);
        $post = Post::orderBy('position','ASC')->where(function($query)
        {
            $pro = $query;
            $id = session('id');
            $cate_post = Cate_post::find($id);

            $pro = $pro->orWhere('cate_post_id',$cate_post->id); // bài viết có id của danh muc cha cấp 1.
            $com = Cate_post::where('parent_id',$cate_post->id)->get();//danh mục cha cấp 2.
            foreach ($com as $dt) {
                $pro = $pro->orWhere('cate_post_id',$dt->id);// bài viết có id của danh muc cha cấp 2.
            }
            session()->forget('id');//xóa session;
        })->get();
        return view('frontend.posts.list', compact('post', 'cate_post'));
    }

    public function detail($id)
    {
        $detail = Post::where('status', 1)->where('id', $id)->first();

        return view('frontend.posts.detail', compact('detail'));
    }


}
