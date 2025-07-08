<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CategoryNotification;
use App\Models\User;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    function index(Request $request) {
    $query = Category::query();


    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $data['search'] = $request->search;
    $data['category'] = $query->paginate(10)->withQueryString(); 

    return view('category', $data);
}

    function create() {
        return view('insertCategory');
    }
    function store(CategoryRequest $request) {
        $input = $request -> all();
        $category = Category::create($input);

         // Kirim email notifikasi
        $recipient = User::first(); // ambil user pertama
        Mail::to($recipient->email)->send(new CategoryNotification('ditambahkan', $category));

        return redirect()->route('category');
        

        if ($category) {
            return redirect('/category')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/category')->with('Error', 'Data gagal ditambahkan');
        }
    }
    
    function edit(Request $request, $id) {
        $category = Category::find($id);
        return view ('formCategory',compact('category'));
    }
    function update(CategoryRequest $request, $id) {
        $rule = [
            'name' => 'required',
            'is_publish' => 'required',
        ];
        $input = $request -> all();
        $User = Category::find($id);
        $status = $User -> update($input);

        if ($status) {
            return redirect('/category')->with('success', 'Data berhasil diedit');
        } else {
            return redirect('/category/form/' . $id)->with('Error', 'Data gagal diedit');
        }
    }
    function destroy($id) {

        
        $category = Category::find($id);
        $recipient = User::first();
        Mail::to($recipient->email)->send(new CategoryNotification('dihapus', $category));

        $category1 = $category -> delete();
       
        return redirect()->route('category');
        if ($category1) {
            return redirect('/category')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/category')->with('Error', 'Data gagal dihapus');
        }
    }
}
