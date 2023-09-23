<?php

namespace App\Http\Controllers\Perkawinan;

use App\Http\Controllers\Controller;
use App\Models\Merak;
use App\Models\Hasil;
use App\Models\Perkawinan;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PerkawinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = perkawinan::orderBy('id','desc')->with('hasil','merak','warna')->paginate();
        $title = 'Delete Perkawinan!';
        $text = "Yakin Ingin Menghapus Data Ini?";
        confirmDelete($title, $text ,);
        return view("content/perkawinan/index")->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mer = Merak::all();
        return view('content/perkawinan/add',compact('mer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        perkawinan::where('id',$id)->delete();
        return redirect()->to('perkawinan')->with('success','Data perkawinan Berhasil Di Hapus');
    }
}
