<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;

class OrderController extends Controller
{
    public function order()
    {
        $order = Bill::all();

        return view('admin.carts.order', compact('order'));
    }

    public function bill($id)
    {
        $bill = BillDetail::where('bill_id', $id)->get();
        $order = Bill::where('id', $id)->first();

        return view('admin.carts.bill', compact('bill', 'order'));
    }

    public function destroyOrder($id)
    {
        $bill = Bill::findOrFail($id);
        BillDetail::where('bill_id', $id)->delete();
        $bill->delete();
        return back();
    }

    public function postStatus(Request $req, $id)
    {
        $bill = Bill::where('id', $id)->first();
        $bill->status = $req->status;
        $bill->save();

        return back()->with('success', 'Thao tác thành công');
    }

    public function checkbox(Request $req)
    {
        $checkbox = $req->checkbox;
        if(!isset($req->checkbox))
        {
            return back()->with('success', 'Chưa chọn hóa đơn');
        }
        if($req->select_action == 1)
        {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $bill = Bill::findOrFail($c);
                BillDetail::where('bill_id', $c)->delete();
                $bill->delete();
            }

            return redirect()->back()->with('success', 'Xóa thành công');
        }else{
            return back()->with('success', 'Chưa chọn thao tác');
        }
    }
}
