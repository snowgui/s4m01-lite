<?php

namespace App\Http\Controllers\CDHFramework;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CDHFramework as Framework;
use App\Models\CDHLang;
use App\Http\Requests\CDHFramework\CDHFrameworkRequest;

class CDHFrameworkCtrl extends Controller
{
    public function index()
    {
        $model = Framework::orderBy('nome', 'asc')->get();

        return view('admin.cdh_framework.index', compact('model'));
    }

    public function create()
    {
        return view('admin.cdh_framework.create');
    }

    public function store(CDHFrameworkRequest $request)
    {
        $data = $request->all();

        if (isset($data["atv"])) $data["atv"] = true;
        else $data["atv"] = false;

        Framework::create($data);

        return redirect()->route('CDHFramework.index')->with('created', true);
    }

    public function show($id)
    {
        return 'Method not implemented';
    }

    public function edit($id)
    {
        $model = Framework::find($id);
        
        return view('admin.cdh_framework.edit', compact('model'));
    }

    public function update(CDHFrameworkRequest $request, $id)
    {
        $data = $request->all();

        if (isset($data["atv"])) $data["atv"] = true;
        else $data["atv"] = false;

        Framework::find($id)->update($data);
        return redirect()->route('CDHFramework.edit', $id)->with('updated', true);
    }

    public function destroy($id)
    {
        //
    }
}
