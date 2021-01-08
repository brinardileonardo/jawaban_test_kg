<?php

namespace Portal\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$artikel_data = DB::table('tbl_artikel')
    					->join('users','tbl_artikel.author_id','=','users.id')
    					->join('tbl_status','tbl_artikel.status_publish','=','tbl_status.status_code')
    					->select('tbl_artikel.*', 'users.name as nama_penulis', 'tbl_status.status_value as status_value')
    					->where('tbl_artikel.status_publish','!=','2')
    					->get();
    	return view('artikel/cms',['artikel_data' => $artikel_data]);
    }

    public function add_view()
	{
		$category_data = DB::table('tbl_category')->where('category_status','!=','0')->get();
		$status_data = DB::table('tbl_status')->where('status_code','!=','2')->get();
		return view('artikel/add_artikel',['category_data' => $category_data, 'status_data' => $status_data]);
	}

	public function add_process(Request $request)
	{
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);

		$foto_artikel = $request->file('file');
		$tujuan_upload = 'artikel_img';
		$nama_file = 'artikel_'.time().$foto_artikel->getClientOriginalName();

		$move_image = $foto_artikel->move($tujuan_upload, $nama_file);
		$nama_file_baru = $tujuan_upload.'/'.$nama_file;

		DB::table('tbl_artikel')->insert([
			'artikel_judul' => $request->judul,
			'artikel_body' => $request->isi_artikel,
			'author_id' => $request->id_penulis,
			'tanggal_publish' => date('Y-m-d H:i:s'),
			'status_publish' => $request->status_publish,
			'path_image' => $nama_file_baru,
			'category_id' => $request->category
		]);

		return redirect('/artikel');
	}

	public function edit_view($id)
	{;
		$artikel_data = DB::table('tbl_artikel')
    					->join('users','tbl_artikel.author_id','=','users.id')
    					->select('tbl_artikel.*', 'users.name as nama_penulis')
    					->where('tbl_artikel.artikel_id',$id)
    					->get();

		$status_data = DB::table('tbl_status')->where('status_code','!=','2')->get();
		$category_data = DB::table('tbl_category')->where('category_status','!=','0')->get();

		return view('artikel/edit_artikel',['artikel_data' => $artikel_data, 'status_data' => $status_data,'category_data' => $category_data]);
	}

	public function update_process(Request $request)
	{
		$foto_data = DB::table('tbl_artikel')->where('artikel_id',$request->id)->value('path_image');
		if (empty($request->file('file_baru'))){
            $file_foto = $foto_data;
        }else{
			unlink($foto_data);

            $foto_artikel = $request->file('file_baru');
			$tujuan_upload = 'artikel_img';
			$nama_file = 'artikel_'.time().$foto_artikel->getClientOriginalName();

			$move_image = $foto_artikel->move($tujuan_upload, $nama_file);
			$file_foto = $tujuan_upload.'/'.$nama_file;
		}

		DB::table('tbl_artikel')->where('artikel_id',$request->id)->update([
			'artikel_judul' => $request->judul,
			'artikel_body' => $request->isi_artikel,
			'tanggal_publish' => date('Y-m-d H:i:s'),
			'status_publish' => $request->status_publish,
			'path_image' => $file_foto,
			'category_id' => $request->category
		]);

		return redirect('/artikel');
	}

	public function hapus_process($id)
	{
		DB::table('tbl_artikel')->where('artikel_id',$id)->update([
			'status_publish' => '2'
		]);
		return redirect('/artikel');
	}
}