<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\User;

class NewComplaintController extends Controller
{
    public function index(){
        $complaints = Complaint::where('status', 'Baharu')->latest()->get();

        $technicians = User::where('role', 'technician')
        ->orWhere('role', 'supervisor')
        ->get();

        return view('new-complaints.index', compact('complaints','technicians'));
    }

    public function edit(Complaint $complaint){
        $technicians = User::where('role', 'technician')
        ->orWhere('role', 'supervisor')
        ->get();
        return view('new-complaints.edit',compact('complaint','technicians'));
    }
}
