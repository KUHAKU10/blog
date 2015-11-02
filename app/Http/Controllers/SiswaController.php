<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\siswa as Siswa;

use Illuminate\Http\Request;

class SiswaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(siswa $siswa)
	{
		$siswa = $siswa->get();
		return view('siswa.list',compact('siswa'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(siswa $siswa)
	{
		return view('siswa.add',compact('siswa'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req, Siswa $siswa)
	{
		$siswa = new $siswa;
$siswa->nama = $req->nama;
$siswa->jenis_kelamin = $req->jenis_kelamin;
$siswa->tanggal_lahir =
date_format(date_create($req->tanggal_lahir),"Y-m-d");
$siswa->save();
return redirect('siswa');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(siswa $siswa)
	{
		return view('siswa.detail',compact('siswa'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(siswa $siswa)
	{
		return view('siswa.edit',compact('siswa'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $req, siswa $siswa)
	{
		$siswa->nama  = $req->nama;
		$siswa->jenis_kelamin = $req->jenis_kelamin;
		$siswa->tanggal_lahir =
		date_format(date_create($req->tanggal_lahir),"Y-m-d");
		$siswa->save();
		return redirect('siswa');
		
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(siswa $siswa)
	{
		$siswa->delete();
		return redirect('siswa');
	}

}
