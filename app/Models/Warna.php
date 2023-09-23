<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
    use HasFactory;
    protected $fillable =['id','warna'];
    protected $table ='warna';
    protected $primaryKey ="id";
    public $timestamps = false;
    //relasi
    public function merak()
{
    return $this->hasMany(merak::class);
}
    public function perkawinan()
{
    return $this->hasMany(perkawinan::class);
}
}
