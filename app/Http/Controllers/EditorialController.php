<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index()
    {
        $editorials=Editorial::orderBy("id")->get();
        return view("editorials.index",compact("editorials"));
    }

    public function create()
    {
        return view("editorials.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required", 
    
        ]);
        $datos=$request->all();
		Editorial::create($datos);
		return redirect("/editoriales");
    }

    public function show(Editorial $editorial)
    {
        //
    }

    public function edit($id)
    {
        $editorial=Editorial::find($id);
		return view("editorials.create",compact("editorial"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "nombre" => "required", 
    
        ]);
        $datos=$request->all();
		Editorial::find($id)->update($datos);
		return redirect("/editoriales");
    }

    
    public function destroy($id)
    {
        $editorials=Editorial::find($id);
        if ($editorials){   //si libro se encontrรณ
			$editorials->delete();
			return "ok";
		}else{
			return "error";
		}
    }

    
}
