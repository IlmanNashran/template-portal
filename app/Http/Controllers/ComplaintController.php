<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Category;


class ComplaintController extends Controller
{
    public function index()
    {   
        $complaints = Complaint::latest()->get();
        return view('complaints.index', compact('complaints'));
    }

    public function create(){
        $categories = Category::all()->sortBy('name');
        return view('complaints.create', compact('categories'));
    }

    public function store(Request $request){

        $complaint = new Complaint;
        $complaint->user_id = auth()->user()->id;
        $complaint->report_no = $complaint->generateRecordNumber(now()->toDateString());
        $complaint->category_id = $request->category_id;
        $complaint->block = $request->block;
        $complaint->location = $request->location;
        $complaint->description = $request->description;
        $complaint->status = 'Baharu';
        $complaint->save();

        $message = 'Aduan ' . $complaint->report_no . ' BERJAYA didaftarkan.';

        return redirect()->route('complaints.index')->with('success', $message);
    }
}

