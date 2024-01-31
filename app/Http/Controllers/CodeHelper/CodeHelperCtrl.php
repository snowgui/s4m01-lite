<?php

namespace App\Http\Controllers\CodeHelper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CodeHelper;
use App\Http\Requests\CodeHelper\CodeHelperRequest;
use App\Models\CDHCategoria As Categoria;
use App\Models\CDHLang As Lang;
use App\Models\CDHFramework As Framework;
use App\Models\CDHTool As Tool;
use App\Models\CDHSo As SO;

class CodeHelperCtrl extends Controller{

    public function index(){   

        $data = CodeHelper::with(['Cat', 'Lang', 'Frame', 'Tool', 'SO'])->get(); 
    
        if(session('del-error'))
        {
            $error = session()->get('error');
            return view('admin.code_helper.index', compact('data', 'error'));
        }else
        {
            return view('admin.code_helper.index', compact('data'));
        }              
        
    }

    public function create(){

        $cats = Categoria::where('atv', true)->orderBy('nome', 'asc')->get();
        $langs = Lang::where('atv', true)->orderBy('nome', 'asc')->get();
        $frames = Framework::where('atv', true)->orderBy('nome', 'asc')->get();
        $tools = Tool::where('atv', true)->orderBy('nome', 'asc')->get();
        $sos = SO::where('atv', true)->orderBy('nome', 'asc')->get();

        return view('admin.code_helper.create', compact('cats', 'langs', 'frames', 'tools', 'sos'));
    }

    public function store(CodeHelperRequest $request){
        
        $data = $request->all();
        CodeHelper::create($data);

        return redirect()->route('CodeHelper.index')->with('created', true);
    }

    public function edit($id){
        $data = CodeHelper::find($id);

        $cats = Categoria::where('atv', true)->orderBy('nome', 'asc')->get();
        $langs = Lang::where('atv', true)->orderBy('nome', 'asc')->get();
        $frames = Framework::where('atv', true)->orderBy('nome', 'asc')->get();
        $tools = Tool::where('atv', true)->orderBy('nome', 'asc')->get();
        $sos = SO::where('atv', true)->orderBy('nome', 'asc')->get();

        return view('admin.code_helper.edit', compact('data', 'cats', 'langs', 'frames', 'tools', 'sos'));

    }

    public function update(CodeHelperRequest $request, $id){
        
        $data = $request->all();
        CodeHelper::find($id)->update($data);
        return redirect()->route('CodeHelper.edit', $id)->with('updated', true);
    }

    public function destroy($id){

        try
        {  
            CodeHelper::find($id)->delete();
            return redirect()->route('CodeHelper.index')->with('destroyed', true);

        }catch(\Exception $ex)
        {
            $error = $ex->getCode();
           
            return redirect()->route('CodeHelper.index')
            ->with('del-error', true)
            ->with(compact('error'));
        }

    }

    public function getCode(Request $request){
        $data =  CodeHelper::find($request->id);        
        return response()->json($data);
    }
}
