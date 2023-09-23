<?php

namespace App\Http\Controllers\Hasil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hasil;
use Illuminate\Support\Facades\Session;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = hasil::orderBy('id','desc')->paginate();
        $title = 'Delete Hasil!';
        $text = "Yakin Ingin Menghapus Data Ini?";
        confirmDelete($title, $text ,);
        return view("content/hasil/index")->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content/hasil/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('hasil',$request->hasil);
        $request->validate([
            'hasil' =>'required|unique:hasil,hasil'
        ],[
            'hasil.required'=>'hasil Wajib Di Isi',
            'hasil.unique'=>'hasil Sudah Ada Dalam Database',
        ]);
        $data=[
            'hasil'=>$request->hasil,
        ];
        hasil::create($data);
        return redirect()->to('hasil')->with('success','Data Berhasil Di Tambahkan');
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
        $data = hasil::where('id',$id)->first();
        return view("content/hasil/edit")->with('data',$data);
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
            'hasil' =>'required|unique:hasil,hasil'
        ],[
            'hasil.required'=>'hasil Wajib Di Isi',
        ]);
        $data=[
            'hasil'=>$request->hasil,
        ];
        hasil::where('id',$id)->update($data);
        return redirect()->to('hasil')->with('success','Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        hasil::where('id',$id)->delete();
        return redirect()->to('hasil')->with('success','Data Berhasil Di Hapus');
    }
}
