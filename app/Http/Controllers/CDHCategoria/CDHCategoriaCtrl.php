<?php

namespace App\Http\Controllers\CDHCategoria;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CDHCategoria AS Cat;
use App\Http\Requests\CDHCategoria\CDHCategoriaRequest;

class CDHCategoriaCtrl extends Controller
{

    public function index()
    {
        $data = Cat::all();

        if(session("del-error"))
        {
            $error = session()->get("error");
            return view("admin.cdh_categoria.index", compact("data", "error"));
        }else
        {
            return view("admin.cdh_categoria.index", compact('data'));
        } 
    }

    public function create()
    {
        return view("admin.cdh_categoria.create");
    }

    public function store(CDHCategoriaRequest $request)
    {
        $data = $request->all();

        if(isset($data["atv"])) $data["atv"] = true;
        else $data["atv"] = false;

        Cat::create($data);
        return redirect()->route("CDHCategoria.index")->with("created", true);

    }

    public function edit($id)
    {
        $data = Cat::find($id);
        return view("admin.cdh_categoria.edit", compact("data"));
    }

    public function update(CDHCategoriaRequest $request, $id)
    {
        $data = $request->all();
        
        if(isset($data["atv"])) $data["atv"] = true;
        else $data["atv"] = false;

        Cat::find($id)->update($data);
        return redirect()->route("CDHCategoria.edit", $id)->with("updated", true);
    }

    public function destroy($id)
    {
        try
        {  
            Cat::find($id)->delete();
            return redirect()->route('CDHCategoria.index')->with('destroyed', true);

        }catch(\Exception $ex)
        {
            $error = $ex->getCode();
           
            return redirect()->route('CDHCategoria.index')
            ->with('del-error', true)
            ->with(compact('error'));
        }
    }
    
}
