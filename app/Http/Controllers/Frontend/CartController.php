<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
use App\Http\Requests\OrderRequest;
use App\Models\Bill;
use App\Models\BillDetail;
use Session;

class CartController extends Controller
{
    public function index()
    {
        $content = Cart::content();
        $total = Cart::total();
        // dd(Cart::count());
        return view('frontend.carts.index', compact('content', 'total'));
    }

    public function addCart($id)
    {
        $query = Product::where('id', $id)->first();
        Cart::add(array(
            'id' => $query->id,
            'name' => $query->name,
            'qty' => 1,
            'price' => $query->price,
            'options' => array('img' => $query->image),
        ));

        return back();
    }

    public function destroyCart($id)
    {
        Cart::remove($id);

        return back();
    }

    public function order()
    {

        return view('frontend.carts.order');
    }

    public function postOrder(OrderRequest $req)
    {
        $content = Cart::content();
        $total = Cart::total(null,null,'');
        // dd($total);
        if ($total > 0)
        {
            $bill = new Bill;
            $bill->name = $req['name'];
            $bill->email = $req['email'];
            $bill->address = $req['address'];
            $bill->phone = $req['phone'];
            $bill->total = $total;
            $bill->note = $req['note'];
            $bill->payment = $req['payment'];
            $bill->status = 1;
            $bill->save();

            foreach ($content as $c) {
                $bill_detail = new BillDetail;
                $bill_detail->bill_id = $bill->id;
                $bill_detail->product_id = $c->id;
                $bill_detail->product_id = $c->id;
                $bill_detail->quantity = $c->qty;
                $bill_detail->price = $c->price;
                $bill_detail->save();
            }
            Session::forget('cart');
            return back()->with('message', 'Đặt hàng thành công');
        }else{
            return back()->with('message', 'Giỏ hàng rỗng, xin vui lòng thêm sản phẩm rồi đặt hàng');
        }

        return back();
    }
}
