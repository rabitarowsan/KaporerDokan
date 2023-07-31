<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;

class FrontendController extends Controller
{
   public function index()
   {
        return view('frontend.index');
   }
   public function categories()
   {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
   }
}
