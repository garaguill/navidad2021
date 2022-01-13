<?php

namespace App\Http\Controllers;
use App\Models\Autor;
use App\Models\Editorial;
use App\Models\Libro;
use Illuminate\Http\Request;
use PDF;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listado($autorId){
        return Autor::find($autorId)->libros;
    }

    public function index()
    {

        $libros=Libro::orderBy("id")->get();
        return view("libros.index",compact("libros"));
    }

    public function create()
    {
        
        $editoriales = Editorial::all();
        $autores = Autor::all();
        return view("libros.create", compact('autores', 'editoriales'));

    }

    public function store(Request $request)
    {
        $request->validate([
            "titulo" => "required", 
            "autor_id" => "required", 
            "editorial_id" => "required", 
            "f_publicacion" => "required"

        ]);
        $datos=$request->all();
		Libro::create($datos);
		return redirect("/libros");
    }

    public function show(Libro $libro)
    {
        //
    }

   
    public function edit($id)
    {
        $editoriales = Editorial::all();
        $autores = Autor::all();
        $libro=Libro::find($id);
        return view("libros.create", compact('libro', 'autores', 'editoriales'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "titulo" => "required", 
            "autor_id" => "required", 
            "editorial_id" => "required", 
            "f_publicacion" => "required"

        ]);
        
        $datos=$request->all();
		Libro::find($id)->update($datos);
		return redirect("/libros");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libros=Libro::find($id);
        if ($libros){   //si libro se encontrรณ
			$libros->delete();
			return "ok";
		}else{
			return "error";
		}
    }

    public function listadoPdf(){
        $libros=Libro::orderBy("titulo")->limit(20)->get();
        $pdf = PDF::loadView('libros.pdf',compact("libros"));
        return $pdf->download('listado_libros.pdf');		
   }
}
