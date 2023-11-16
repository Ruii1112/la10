<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Category $category): View
    {
        return view('categories.index')->with(['posts' => $category->getByCategory()]);
    }
}
