<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = []; 
    public function socio(){
        return $this->belongsTo(Socio::class);
    }
    public function libro(){
        return $this->belongsTo(Libro::class);
    }
}
