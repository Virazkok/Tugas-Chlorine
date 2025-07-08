<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    public function index() { return Category::paginate(10); }
    public function store(Request $r) { return Category::create($r->all()); }
    public function show(Category $c) { return $c; }
    public function update(Request $r, Category $c) { $c->update($r->all()); return $c; }
    public function destroy(Category $c) { $c->delete(); return response()->noContent(); }
}

