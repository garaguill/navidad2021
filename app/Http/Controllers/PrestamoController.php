<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use App\Models\Socio;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos=Prestamo::orderBy("id")->get();
        return view("prestamos.index",compact("prestamos"));
    }

    public function create()
    {
        $libros = Libro::all();
        $socios = Socio::all();
        return view("prestamos.create", compact('socios', 'libros'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            "libro_id" => "required", 
            "socio_id" => "required", 
            "f_inicial" => "required", 
            "f_final" => "required"
    
        ]);
        $datos=$request->all();
		Prestamo::create($datos);
		return redirect("/prestamos");
    }

 
    public function show(Prestamo $prestamo)
    {
        //
    }

   
    public function edit($id)
    {
        $libros = Libro::all();
        $socios = Socio::all();
        $prestamo=Prestamo::find($id);
		return view("prestamos.create",compact("prestamo", "socios", "libros"));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "libro_id" => "required", 
            "socio_id" => "required", 
            "f_inicial" => "required", 
            "f_final" => "required"
    
        ]);
        $datos=$request->all();
		Prestamo::find($id)->update($datos);
		return redirect("/prestamos");
    }

  
    public function destroy($id)
    {
        $prestamos=Prestamo::find($id);
        if ($prestamos){   //si libro se encontrรณ
			$prestamos->delete();
			return "ok";
		}else{
			return "error";
		}
    }
}
