<?php

namespace App\Http\Controllers\Warna;

use App\Http\Controllers\Controller;
use App\Models\Warna;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class WarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = warna::orderBy('id','desc')->paginate();
        $title = 'Delete Warna!';
        $text = "Yakin Ingin Menghapus Data Ini?";
        confirmDelete($title, $text ,);
        return view("content/warna/index")->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("content/warna/add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('warna',$request->warna);
        $request->validate([
            'warna' =>'required|unique:warna,warna'
        ],[
            'warna.required'=>'Warna Wajib Di Isi',
            'warna.unique'=>'Warna Sudah Ada Dalam Database',
        ]);
        $data=[
            'warna'=>$request->warna,
        ];
        warna::create($data);
        return redirect()->to('warna')->with('success','Data Berhasil Di Tambahkan');
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
        $data = warna::where('id',$id)->first();
        return view("content/warna/edit")->with('data',$data);
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
            'warna' =>'required|unique:warna,warna'
        ],[
            'warna.required'=>'Warna Wajib Di Isi',
        ]);
        $data=[
            'warna'=>$request->warna,
        ];
        warna::where('id',$id)->update($data);
        return redirect()->to('warna')->with('success','Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        warna::where('id',$id)->delete();
        return redirect()->to('warna')->with('success','Data Berhasil Di Hapus');
    }
}
