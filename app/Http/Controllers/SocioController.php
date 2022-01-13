<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{
   
    public function index()
    {
        $socios=Socio::orderBy("id")->get();
         return view("socios.index",compact("socios"));
    }

   
    public function create()
    {
        return view("socios.create");
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:socios,email,', 
            "f_alta" => "required"
    
        ]);
        $datos=$request->all();
		Socio::create($datos);
		return redirect("/socios");
    }

    
    public function show(Socio $socio)
    {
        //
    }

   
    public function edit($id)
    {
        $socio=Socio::find($id);
		return view("socios.create",compact("socio"));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:socios,email,', 
            "f_alta" => "required"
    
        ]);
        $datos=$request->all();
		Socio::find($id)->update($datos);
		return redirect("/socios");
    }

   
    public function destroy($id)
    {
        $socios=Socio::find($id);
        if ($socios){   //si libro se encontrรณ
			$socios->delete();
			return "ok";
		}else{
			return "error";
		}
    }

}
