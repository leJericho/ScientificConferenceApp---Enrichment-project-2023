<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konferensi extends Model
{
    use HasFactory;
    protected $table = "konferensi";
    protected $fillable = ['nama', 'singkatan', 'website', 'tempat', 'tanggal', 'topik', 'penyelenggara'];



    public function book(){
        return $this->hasMany(Book::class);
    }

}


