<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = []; 
    public function libros()
    {
       return $this->hasMany(Libro::class);
    } 
   
}
