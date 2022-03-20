<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all_product()
    {
        return view('admin.all_product');
    }

    public function add_product()
    {
        return view('admin.add_product');
    }
}
