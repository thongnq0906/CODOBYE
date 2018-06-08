<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::paginate(10);

        return view('admin.contact.index', compact('contact'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
