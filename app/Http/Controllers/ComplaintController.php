<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Category;

class ComplaintController extends Controller
{
    public function index()
    {   
        $complaints = Complaint::all();
        return view('complaints.index', compact('complaints'));
    }

    public function create(){
        $categories = Category::all()->sortBy('name');
        return view('complaints.create', compact('categories'));
    }

}
