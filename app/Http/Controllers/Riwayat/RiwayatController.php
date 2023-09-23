<?php

namespace App\Http\Controllers\Riwayat;

use App\Http\Controllers\Controller;
use App\Models\Merak;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = riwayat::orderBy('id','desc')->with('merak')->paginate();
        $title = 'Delete Riwayat!';
        $text = "Yakin Ingin Menghapus Data Ini?";
        confirmDelete($title, $text ,);
        return view("content/riwayat/index")->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mer = Merak::all();
        return view('content/riwayat/add',compact('mer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('merak_id',$request->merak_id);
        Session::flash('status_hidup',$request->status_hidup);
        Session::flash('keterangan',$request->keterangan);
        Session::flash('tanggal',$request->tanggal);
        $request->validate([
            'merak_id' =>'required|unique:riwayat,merak_id',
            'status_hidup' =>'required',
            'keterangan' =>'required',
            'tanggal' =>'required'
        ],[
            'merak_id.required'=>'Kode Merak Wajib Di Isi',
            'merak_id.unique'=>'Kode Merak Sudah Di Gunakan',
            'status_hidup.required'=>'Status Hidup Wajib Di Isi',
            'keterangan.required'=>'Keterangan Wajib Di Isi',
            'tanggal.required'=>'Tanggal Wajib Di Pilih'
        ]);
        $data=[
            'merak_id'=>$request->merak_id,
            'status_hidup'=>$request->status_hidup,
            'keterangan'=>$request->keterangan,
            'tanggal'=>$request->tanggal
        ];
        riwayat::create($data);
        return redirect()->to('riwayat')->with('success','Data Riwayat Berhasil Di Tambahkan');
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
        $mer = Merak::all();
        $data = riwayat::where('id',$id)->first();
        return view("content/riwayat/edit",compact('mer'))->with('data',$data);
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
            'merak_id' =>'required',
            'status_hidup' =>'required',
            'keterangan' =>'required',
            'tanggal' =>'required'
        ],[
            'merak_id.required'=>'Kode Merak Wajib Di Isi',
            'status_hidup.required'=>'Status Hidup Wajib Di Isi',
            'keterangan.required'=>'Keterangan Wajib Di Isi',
            'tanggal.required'=>'Tanggal Wajib Di Pilih'
        ]);
        $data=[
            'merak_id'=>$request->merak_id,
            'status_hidup'=>$request->status_hidup,
            'keterangan'=>$request->keterangan,
            'tanggal'=>$request->tanggal
        ];
        riwayat::where('id',$id)->update($data);
        return redirect()->to('riwayat')->with('success','Data riwayat Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        riwayat::where('id',$id)->delete();
        return redirect()->to('riwayat')->with('success','Data riwayat Berhasil Di Hapus');
    }
}
