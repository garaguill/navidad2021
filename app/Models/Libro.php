<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;



class Libro extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = []; 
    protected $appends = ["Nombre"];
  
    public function autor(){
        return $this->belongsTo(Autor::class);
    }
    public function editorial(){
        return $this->belongsTo(Editorial::class);
    }
    public function prestamos(){
        return $this->hasMany(Prestamo::class);
    }
    
    public function getAgeAttribute()   
    {
    return Carbon::parse($this->attributes['f_publicacion'])->age;
    }

    public function getNombreAttribute(){
        return $this->editorial->nombre;
    }
}
