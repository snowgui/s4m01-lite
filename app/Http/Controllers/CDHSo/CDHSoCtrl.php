<?php

namespace App\Http\Controllers\CDHSo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CDHSo As SO;
use App\Http\Requests\CDHSo\CDHSoRequest;

class CDHSoCtrl extends Controller
{
    public function index()
    {
        $data = SO::orderBy('nome', 'asc')->get();
        return view('admin.cdh_so.index', compact('data'));
    }

    public function create()
    {
        return view('admin.cdh_so.create');
    }

    public function store(CDHSoRequest $request)
    {
        $data = $request->all();

        if(isset($data["atv"])) $data["atv"] = true;
        else $data["atv"] = false;

        SO::create($data);

        return redirect()->route('CDHSo.index')->with('created', true);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       $data = SO::find($id);
        return view('admin.cdh_so.edit', compact('data'));
    }

    public function update(CDHSoRequest $request, $id)
    {
        $data = $request->all();
        if(isset($data["atv"])) $data["atv"] = true;
        else $data["atv"] = false;

        SO::find($id)->update($data);        

        return redirect()->route('CDHSo.edit', $id)->with('updated', true);
    }

    public function destroy($id)
    {
        //
    }
}
