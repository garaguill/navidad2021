<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autors=Autor::orderBy("id")->get();
        return view("autors.index",compact("autors"));
    }

    public function create()
    {
        return view("autors.create");
    }

    public function store(Request $request)
    {
      $request->validate([
        'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
        'apellidos' => 'required|regex:/^[\pL\s\-]+$/u', 
        "f_nacimiento" => "required"

    ]);
		$datos=$request->all();
		Autor::create($datos);
		return redirect("/autores");
    }

    public function show(Autor $autor)
    {
        //
    }

    public function edit($id)
    {
        $autor=Autor::find($id);
		return view("autors.create",compact("autor"));
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
        'apellidos' => 'required|regex:/^[\pL\s\-]+$/u', 
        "f_nacimiento" => "required"

    ]);
		$datos=$request->all();
		Autor::find($id)->update($datos);
		return redirect("/autores");
    }

    public function destroy($id)
    {
        $autors=Autor::find($id);
        if ($autors){   //si libro se encontrรณ
			  $autors->delete();
			  return "ok";
		    }else{
          return "error";
		}
    }
}
