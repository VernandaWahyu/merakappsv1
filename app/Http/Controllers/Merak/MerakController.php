<?php

namespace App\Http\Controllers\Merak;

use App\Http\Controllers\Controller;
use App\Models\Merak;
use App\Models\Warna;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class MerakController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = merak::orderBy('id','desc')->with('warna')->paginate();
        $title = 'Delete Merak!';
        $text = "Yakin Ingin Menghapus Data Ini?";
        confirmDelete($title, $text ,);
        return view("content/merak/index")->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $war = Warna::all();
        return view('content/merak/add',compact('war'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('kode_merak',$request->kode_merak);
        Session::flash('warna_id',$request->warna_id);
        Session::flash('generasi',$request->generasi);
        Session::flash('jenis_kelamin',$request->jenis_kelamin);
        $request->validate([
            'kode_merak' =>'required|unique:merak,kode_merak',
            'warna_id' =>'required',
            'generasi' =>'required',
            'jenis_kelamin' =>'required'
        ],[
            'kode_merak.required'=>'Kode Merak Wajib Di Isi',
            'kode_merak.unique'=>'Kode Merak Sudah Di Gunakan',
            'warna_id.required'=>'Warna Wajib Di Isi',
            'generasi.required'=>'Generasi Wajib Di Isi',
            'jenis_kelamin.required'=>'Jenis Kelamin Wajib Di Pilih'
        ]);
        $data=[
            'kode_merak'=>$request->kode_merak,
            'warna_id'=>$request->warna_id,
            'generasi'=>$request->generasi,
            'jenis_kelamin'=>$request->jenis_kelamin
        ];
        merak::create($data);
        return redirect()->to('merak')->with('success','Data Merak Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $war = Warna::all();
        $data = merak::where('id',$id)->first();
        return view("content/merak/edit",compact('war'))->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_merak' =>'required',
            'warna_id' =>'required',
            'generasi' =>'required',
            'jenis_kelamin' =>'required'
        ],[
            'kode_merak.required'=>'Kode Merak Wajib Di Isi',
            'warna_id.required'=>'Warna Wajib Di Isi',
            'generasi.required'=>'Generasi Wajib Di Isi',
            'jenis_kelamin.required'=>'Jenis Kelamin Wajib Di Pilih'
        ]);
        
        $data=[
            'kode_merak'=>$request->kode_merak,
            'warna_id'=>$request->warna_id,
            'generasi'=>$request->generasi,
            'jenis_kelamin'=>$request->jenis_kelamin
        ];
        merak::where('id',$id)->update($data);
        return redirect()->to('merak')->with('success','Data Merak Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        merak::where('id',$id)->delete();
        return redirect()->to('merak')->with('success','Data Merak Berhasil Di Hapus');
    }
}
