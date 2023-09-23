<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkawinan extends Model
{
    use HasFactory;
    protected $fillable =['id','merak_id','merak_id1','hasil_id','tanggal'];
    protected $table ='perkawinan';
    protected $primaryKey ="id";
    public $timestamps = false;
    // relasi
    public function hasil()
{
    return $this->belongsTo(hasil::class);
}
    public function merak()
{
    return $this->belongsTo(merak::class);
}
    public function warna()
{
    return $this->belongsTo(warna::class);
}
}
