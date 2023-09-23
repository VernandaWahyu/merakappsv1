<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable =['id','hasil'];
    protected $table ='hasil';
    public $timestamps = false;
    //relasi
    public function perkawinan()
{
    return $this->hasMany(perkawinan::class);
}
}
