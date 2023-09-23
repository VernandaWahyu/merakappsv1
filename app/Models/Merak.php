<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merak extends Model
{
    use HasFactory;
    protected $fillable =['id','kode_merak','warna_id','generasi','jenis_kelamin'];
    protected $table ='merak';
    protected $primaryKey ="id";
    public $timestamps = false;
    // relasi
    public function warna()
{
    return $this->belongsTo(warna::class);
}
    public function riwayat()
{
    return $this->hasMany(riwayat::class);
}
    public function perkawinan()
{
    return $this->hasMany(perkawinan::class);
}

}

