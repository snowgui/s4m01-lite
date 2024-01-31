<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\PerfilRequest;
use App\Http\Requests\User\UserRequest;
use Intervention\Image\ImageManagerStatic as Image;
use App\User;
use App\Models\Role;
use Auth;

class UserCtrl extends Controller{

    public function perfil_edit(){        
        $data = User::find(Auth::User()->id);        
        return view("admin.perfil.edit", compact("data"));
    }

    public function perfil_update(PerfilRequest $request, $id){
        $data = $request->all();
        $user = User::find($id);
        
        if(Auth::User()->id != $id) return response()->json(["Unauthorized"]);
        
        if($data['password'] == $user->password) unset($data['password']);
    
        if(isset($data['password'])) $data['password'] = bcrypt($data['password']);
        
        if($data['remover_foto'] == false || $request->hasFile('foto')){
                      
            if(isset($data['img'])){
                $img = $data['img'];
                $img = json_decode($img);
           
                $w = (int) $img->width;
                $h = (int) $img->height;
                $x = (int) $img->x;
                $y = (int) $img->y;

                if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                    $upload = Image::make($data['foto'])->crop($w, $h, $x, $y)->encode('data-url');
    
                    $upload = (object) $upload;
    
                    $src = $upload->encoded;
    
                    $data['foto'] = $src;
    
                }
            }
         

        }else{

            $data['foto'] = '';
        }

        $user->update($data);
        return redirect()->route("perfil.edit")->with("updated", true);

    }

    public function index(){

        $role = Auth::User()->role_id;
        
        if($role == 1) $usuarios = User::All();
        else $usuarios = User::where("role_id", "!=", 1)->get();

        return view("admin.usuarios.index", compact("usuarios"));
        
    }

    public function create(){

        $auth = Auth::User();

        if($auth->role_id == 1) $roles = Role::orderBy('id', 'desc')->get();
        else $roles = Role::orderBy('id', 'desc')->get()->except(1);
        
        return view("admin.usuarios.create", compact("roles"));
    }

    public function store(Request $request){
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        if(isset($data['img'])){
            $img = $data['img'];
            $img = json_decode($img);
            $w = (int) $img->width;
            $h = (int) $img->height;
            $x = (int) $img->x;
            $y = (int) $img->y;
        }

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $upload = Image::make($data['foto'])->crop($w, $h, $x, $y)->encode('data-url');

            $upload = (object) $upload;

            $src = $upload->encoded;

            $data['foto'] = $src;

        }   

        $user = User::create($data);        

        return redirect()->route('user.index')->with('created', true);
    }

    public function show($id){
        //
    }

    public function edit($id){

        $auth = Auth::User();
        if($auth->id != $id && $auth->role_id != 1) 
            return response()->json(["Unauthorized"]);

        $data = User::find($id);

        if($auth->role_id == 1) $roles = Role::orderBy('id', 'desc')->get();
        else $roles = Role::orderBy('id', 'desc')->get()->except(1);

        return view("admin.usuarios.edit", compact("data", "roles"));
    }

    public function update(UserRequest $request, $id){       

        if(Auth::User()->id != $id && Auth::User()->role_id != 1) 
        return response()->json(["Unauthorized"]);

        $data = $request->all();
        $user = User::find($id);
    
        if($data['password'] == $user->password) unset($data['password']);
    
        if(isset($data['password'])) $data['password'] = bcrypt($data['password']);
        
        if($data['remover_foto'] == false || $request->hasFile('foto')){
                      
            if(isset($data['img'])){
                $img = $data['img'];
                $img = json_decode($img);
           
                $w = (int) $img->width;
                $h = (int) $img->height;
                $x = (int) $img->x;
                $y = (int) $img->y;

                if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                    $upload = Image::make($data['foto'])->crop($w, $h, $x, $y)->encode('data-url');
    
                    $upload = (object) $upload;
    
                    $src = $upload->encoded;
    
                    $data['foto'] = $src;
    
                }
            }
         

        }else{

            $data['foto'] = '';
        }

        $user->update($data);
    
        return redirect()->route('user.edit', $id)->with('updated', true); 

    }

    public function destroy($id){
        //
    }

    
}
