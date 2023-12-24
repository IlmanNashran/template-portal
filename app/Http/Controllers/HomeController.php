<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = date('d-m-Y');

        $complaints = Complaint::all();
        $total_complaints = Complaint::all()->count();
        $total_completed_complaints = Complaint::where('status', 'Selesai')->count();
        $total_new_complaints = Complaint::where('status', 'Baharu')->count();
        $total_responded_complaints = Complaint::where('status', 'Dijawab')->count();
        $total_rated_complaints = Complaint::where('status', 'Dinilai')->count();
        $total_kiv_complaints = Complaint::where('status', 'KIV')->count();

        return view('home',compact('today','complaints', 'total_complaints', 'total_completed_complaints', 'total_new_complaints', 'total_responded_complaints', 'total_rated_complaints', 'total_kiv_complaints'));
    }
}
