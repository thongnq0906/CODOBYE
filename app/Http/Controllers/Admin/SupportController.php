<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Support;
use App\Http\Requests\SupportRequest;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    public function index()
    {
        $support = Support::paginate(10);

        return view('admin.support.index', compact('support'));
    }

    public function create()
    {
        return view('admin.support.create');
    }

    public function postCreate(SupportRequest $req)
    {
        $support = new Support;
        $support->name = $req['name'];
        $support->position = $req['position'];
        $support->status = (is_null($req['status']) ? '0' : '1');
        $support->zalo = $req['zalo'];
        $support->skype = $req['zalo'];
        $support->phone = $req['phone'];
        $support->save();

        return redirect()->route('admin.support.index');
    }

    public function update($id)
    {
        $support = Support::where('id', $id)->first();

        return view('admin.support.edit', compact('support'));
    }

    public function postUpdate($id, Request $req)
    {
        $support = Support::where('id', $id)->first();
        $support->name = $req['name'];
        $support->position = $req['position'];
        $support->status = (is_null($req['status']) ? '0' : '1');
        $support->zalo = $req['zalo'];
        $support->skype = $req['zalo'];
        $support->phone = $req['phone'];
        $validatedData = $req->validate([
            'name' => 'required',
            'phone' => 'required|regex:/(0)[0-9]{9,10}/|max:11',
            'position' => 'numeric|nullable|min:0|unique:supports,position,' .$support->id,
        ]);
        $support->save();

        return redirect()->route('admin.support.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        Support::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function open($id)
    {
        $result = Support::where('id', $id)->first();
        $result->status = 1;
        $result->save();

        return back();
    }

    public function close($id)
    {
        $result = Support::where('id', $id)->first();
        $result->status = 0;
        $result->save();
        return back();
    }
}
