<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Socio extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = []; 

    public function getAgeAttribute()
{
    return Carbon::parse($this->attributes['f_alta'])->age;
}
    public function prestamos(){
        return $this->hasMany(Prestamo::class);
    }
}
