<?php

namespace Portal\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $report_data = DB::table('tbl_artikel')
                        ->join('users','tbl_artikel.author_id','=','users.id')
                        ->select(DB::raw('COUNT(tbl_artikel.artikel_id) as jumlah_artikel'),'users.name as nama_penulis')
                        ->groupBy('nama_penulis')
                        ->get();
    	return view('report/report_view',['report_data' => $report_data]);
    }
}