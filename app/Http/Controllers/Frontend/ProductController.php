<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate_product;
use App\Models\Product;

class ProductController extends Controller
{

    public function cateProductLv1()
    {
        $cate_product = Cate_product::where('status', 1)->where('parent_id', 0)->get();

        return view('frontend.products.cate_lv1', compact('cate_product'));
    }

    public function product($id)
    {
        session()->put('id',$id);
        $product = Product::orderBy('position','ASC')->where(function($query)
        {
            $pro = $query;
            $id = session('id');
            $cate_product = Cate_product::find($id);

            $pro = $pro->orWhere('cate_product_id',$cate_product->id); // bài viết có id của danh muc cha cấp 1.
            $com = Cate_product::where('parent_id',$cate_product->id)->get();//danh mục cha cấp 2.
            foreach ($com as $dt) {
                $pro = $pro->orWhere('cate_product_id',$dt->id);// bài viết có id của danh muc cha cấp 2.
            }
            session()->forget('id');//xóa session;
        })->get();

        return view('frontend.products.cate_lv2', compact('product'));
    }

    public function detailProduct($id)
    {
        $product = Product::where('status', 1)->where('id', $id)->first();
        $involve_product = Product::where('cate_product_id', $product->id)->get();

        return view('frontend.products.detail_product', compact('product', 'involve_product'));
    }
}
