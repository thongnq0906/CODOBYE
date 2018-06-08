<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate_product;
use App\Http\Requests\Cate_productRequest;
use App\Http\Requests\UpdateCate_productRequest;
use Image;

class CateProductController extends Controller
{
    public function index()
    {
    	$cate_product = Cate_product::all();

    	return view('admin/cate_product/index', compact('cate_product'));
    }

    public function create()
    {
    	$data=Cate_product::select('id','name','parent_id')->get()->toArray();

    	return view('admin/cate_product/create', compact('data'));
    }

    public function postCreate(Cate_productRequest $req)
    {
    	$cate_product = new Cate_product;
    	$cate_product->name = $req['name'];
    	$cate_product->parent_id = $req->parent_id;
    	$cate_product->slug = str_slug($cate_product->name);
    	$cate_product->description = $req['description'];
        $cate_product->position = $req['position'];
    	$cate_product->status = (is_null($req['status']) ? '0' : '1');
    	if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(400,225)->save(public_path('images/upload/'.$filename));

            $cate_product->image = ('images/upload/'.$filename);

        }
    	$cate_product->save();

    	return redirect()->route('admin.cate_product.home')->with('success','Thêm thành công');
    }

    public function update($slug)
    {
    	$data=Cate_product::select('id','name','parent_id')->get()->toArray();
    	$cate_product = Cate_product::where('slug', $slug)->first();

    	return view('admin.cate_product.edit', compact('cate_product', 'data'));
    }

    public function postUpdate($slug, Request $req)
    {
    	// $cate_product = Cate_product::findOrFail($slug);
    	$cate_product = Cate_product::where('slug', $slug)->first();
    	$cate_product->name = $req['name'];
    	$cate_product->parent_id = $req->parent_id;
    	$cate_product->slug = str_slug($cate_product->name);
    	$cate_product->description = $req['description'];
        $cate_product->position = $req['position'];
    	$cate_product->status = (is_null($req['status']) ? '0' : '1');
    	if($req->hasFile('image'))
        {
            if(file_exists($cate_product->image))
            {
                unlink($cate_product->image);
            }
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(400,225)->save(public_path('images/upload/'.$filename));

            $cate_product->image = ('images/upload/'.$filename);

        }
        $validatedData = $req->validate([
            'name' => 'required|unique:cate_products,name,' .$cate_product->id,
            'position' => 'numeric|nullable|min:0|unique:cate_products,position,' .$cate_product->id,
        ]);
    	$cate_product->save();

    	return redirect()->route('admin.cate_product.home')->with('success','Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Cate_product::findOrFail($id);
        $result2 = Cate_product::where('parent_id', $id)->first();
        if(file_exists($result->image))
        {
            unlink($result->image);
        }
        if(isset($result2))
        {
            if(file_exists($result2->image))
            {
                unlink($result2->image);
            }
            $result2->delete();
        }
        $result->delete();

    	return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function open($id)
    {
        $result = Cate_product::where('id', $id)->first();
        $result->status = 1;
        $result->save();

        return back();
    }

    public function close($id)
    {
        $result = Cate_product::where('id', $id)->first();
        $result->status = 0;
        $result->save();
        return back();
    }
}
