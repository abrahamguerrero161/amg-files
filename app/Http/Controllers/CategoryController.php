<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    
    public function dropDownShow(Request $request)

{

   $items = Category::pluck('name', 'id');

   $selectedID = 2;

   return view('items.edit', compact('id', 'items'));

}


}
