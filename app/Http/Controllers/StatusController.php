<?php

namespace Portal\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$status_data = DB::table('tbl_status')->get();
    	return view('status/status_index',['status_data' => $status_data]);
    }
}