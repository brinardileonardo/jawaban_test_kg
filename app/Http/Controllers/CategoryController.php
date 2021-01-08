<?php

namespace Portal\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$category_data = DB::table('tbl_category')
    					->join('users','tbl_category.author_id','=','users.id')
    					->select('tbl_category.*', 'users.name as nama_penulis')
    					->get();
    	return view('category/category',['category_data' => $category_data]);
    }

    public function add_view()
	{
		return view('category/add_category');
	}

	public function save_process(Request $request)
	{
		DB::table('tbl_category')->insert([
			'category_title' => $request->category,
			'author_id' => $request->id_penulis,
			'category_status' => '1'
		]);

		return redirect('/category');
	}

	public function edit_view($id)
	{
		$category_data = DB::table('tbl_category')
    					->join('users','tbl_category.author_id','=','users.id')
    					->select('tbl_category.*', 'users.name as nama_penulis')
    					->where('category_id',$id)
    					->get();

		return view('category/edit_category',['category_data' => $category_data]);
	}

	public function update_process(Request $request)
	{
		DB::table('tbl_category')->where('category_id',$request->id)->update([
			'category_title' => $request->category
		]);

		return redirect('/category');
	}

	public function hapus_process($id)
	{
		DB::table('tbl_category')->where('category_id',$id)->update([
			'category_status' => '0'
		]);
		return redirect('/category');
	}
}