<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $fillable =['id','merak_id','status_hidup','keterangan','tanggal'];
    protected $table ='riwayat';
    protected $primaryKey ="id";
    public $timestamps = false;
    // relasi
    public function merak()
{
    return $this->belongsTo(merak::class);
}

}
