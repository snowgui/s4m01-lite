<?php

namespace App\Http\Controllers\CDHLang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CDHLang AS Lang;
use App\Http\Requests\CDHLang\CDHLangRequest;

class CDHLangCtrl extends Controller
{                 
    public function index()
    {
        $data = Lang::all();        

        if(session("del-error"))
        {
            $error = session()->get("error");
            return view("admin.cdh_lang.index", compact('data'));
        }else
        {
            return view("admin.cdh_lang.index", compact('data'));
        }            
    }

    public function create()
    {
        return view("admin.cdh_lang.create");
    }

    public function store(CDHLangRequest $request)
    {
        $data = $request->all();
        
        if(isset($data["atv"])) $data["atv"] = true;
        else $data["atv"] = false;

        Lang::create($data);

        return redirect()->route("CDHLang.index")->with('created', true);

    }    

    public function edit($id)
    {
        $data = Lang::find($id);
        return view("admin.cdh_lang.edit", compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        if(isset($data["atv"])) $data["atv"] = true;
        else $data["atv"] = false;

        Lang::find($id)->update($data);

        return redirect()->route("CDHLang.edit", $id)->with("updated", true);
    }

    public function destroy($id)
    {
        try
        {  
            Lang::find($id)->delete();
            return redirect()->route('CDHLang.index')->with('destroyed', true);

        }catch(\Exception $ex)
        {
            $error = $ex->getCode();
           
            return redirect()->route('CDHLang.index')
            ->with('del-error', true)
            ->with(compact('error'));
        }
    }

}
