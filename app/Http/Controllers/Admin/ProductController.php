<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Cate_product;
use Image;
use Illuminate\Support\Facades\Validator;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $data=Cate_product::select('id','name','parent_id')->get()->toArray();

        return view('admin.product.index', compact('product', 'data'));
    }

    public function create()
    {
        $data=Cate_product::select('id','name','parent_id')->get()->toArray();
        return view('admin.product.create', compact('data'));
    }

    public function postCreate(ProductRequest $req)
    {
        $product = new Product;
        $product->name = $req['name'];
        $product->slug = str_slug($req['name']);
        $product->price = $req['price'];
        $product->cate_product_id = $req['cate_product_id'];
        $product->position = $req['position'];
        $product->status = (is_null($req['status']) ? '0' : '1');
        $product->is_home = (is_null($req['is_home']) ? '0' : '1');
        $product->title = $req['title'];
        $product->description = $req['description'];
        $product->content = $req['content'];
        $product->content2 = $req['content2'];
        $product->title_seo = $req['title_seo'];
        $product->meta_key = $req['meta_key'];
        $product->meta_des = $req['meta_des'];
        if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('images/upload/'.$filename));

            $product->image = ('images/upload/'.$filename);

        }
        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function update($slug)
    {
        $data=Cate_product::select('id','name','parent_id')->get()->toArray();
        $product = Product::where('slug', $slug)->first();

        return view('admin.product.edit', compact('data', 'product'));
    }

    public function postUpdate($slug, Request $req)
    {
        $product = Product::where('slug', $slug)->first();
        $product->name = $req['name'];
        $product->slug = str_slug($req['name']);
        $product->price = $req['price'];
        $product->cate_product_id = $req['cate_product_id'];
        $product->position = $req['position'];
        $product->status = (is_null($req['status']) ? '0' : '1');
        $product->is_home = (is_null($req['is_home']) ? '0' : '1');
        $product->title = $req['title'];
        $product->description = $req['description'];
        $product->content = $req['content'];
        $product->content2 = $req['content2'];
        $product->title_seo = $req['title_seo'];
        $product->meta_key = $req['meta_key'];
        $product->meta_des = $req['meta_des'];
        if($req->hasFile('image')){
            if(file_exists($product->image))
            {
                unlink($product->image);
            }
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('images/upload/'.$filename));
            $product->image = ('images/upload/'.$filename);
        }
        $validatedData = $req->validate([
            'name' => 'required|unique:products,name,' .$product->id,
            'price' => 'numeric|nullable|min:0',
            'position' => 'numeric|nullable|min:0|unique:products,position,' .$product->id,
        ]);
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Product::findOrFail($id);
        if(file_exists($result->image))
        {
            unlink($result->image);
        }
        $result->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function search(Request $req)
    {
        $id_cate_product = $req->cate_product;
        if($id_cate_product == 0){
            return redirect()->route('admin.product.index');
        }
        session()->put('id',$id_cate_product);
        $data=Cate_product::select('id','name','parent_id')->get()->toArray();
        $product = Product::orderBy('position','ASC')->where(function($query)
        {
            $pro = $query;
            $id = session('id');
            $cate_product = Cate_product::find($id);
            // dd($id);
            $pro = $pro->orWhere('cate_product_id',$cate_product->id); // bài viết có id của danh muc cha cấp 1.
            // dd($pro);
            $com = Cate_product::where('parent_id',$cate_product->id)->get();//danh mục cha cấp 2.

            foreach ($com as $dt) {
                $pro = $pro->orWhere('cate_product_id',$dt->id);// bài viết có id của danh muc cha cấp 2.
            }
            // dd($pro);
            session()->forget('id');//xóa session;
        })->get();

        return view('admin.product.search', compact('product', 'data', 'id_cate_product'));
    }

    public function checkbox(Request $req)
    {
        $checkbox = $req->checkbox;
        if(!isset($req->checkbox))
        {
            return back()->with('success', 'Chưa chọn sản phẩm');
        }
        if($req->select_action == 1)
        {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result = Product::findOrFail($c);
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
                $result = Product::where('id', $c)->first();
                $result->status = 1;
                $result->save();
            }

            return back()->with('success', 'Thao tác thành công');
        }
        if($req->select_action == 3)
        {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result = Product::where('id', $c)->first();
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
        $result = Product::where('id', $id)->first();
        $result->status = 1;
        $result->save();

        return back();
    }

    public function close($id)
    {
        $result = Product::where('id', $id)->first();
        $result->status = 0;
        $result->save();
        return back();
    }

    public function open_home($id)
    {
        $result = Product::where('id', $id)->first();
        $result->is_home = 1;
        $result->save();

        return back();
    }

    public function close_home($id)
    {
        $result = Product::where('id', $id)->first();
        $result->is_home = 0;
        $result->save();
        return back();
    }
}
