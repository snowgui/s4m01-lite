<?php

namespace App\Http\Controllers\CDHTool;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CDHTool As Tool;
use App\Http\Requests\CDHTool\CDHToolRequest;

class CDHToolCtrl extends Controller
{
    public function index()
    {
        $data = Tool::orderBy('nome', 'asc')->get();
        return view('admin.cdh_tool.index', compact('data'));
    }

    public function create()
    {
        return view('admin.cdh_tool.create');
    }

    public function store(CDHToolRequest $request)
    {
        $data = $request->all();

        if(isset($data["atv"])) $data["atv"] = true;
        else $data["atv"] = false;

        Tool::create($data);

        return redirect()->route('CDHTool.index')->with('created', true);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Tool::find($id);
        return view('admin.cdh_tool.edit', compact('data'));
    }

    public function update(CDHToolRequest $request, $id)
    {
        $data = $request->all();

        if(isset($data["atv"])) $data["atv"] = true;
        else $data["atv"] = false;

        Tool::find($id)->update($data);

        return redirect()->route('CDHTool.edit', $id)->with('updated', true);
    }

    public function destroy($id)
    {
        //
    }
}
