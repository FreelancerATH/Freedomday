<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class SpeakerController extends Controller
{
    public function index()
    {
        $users_active=User::all()->where('status','=','2')->where('role_id','=','6');
        $users_active_number=User::all()->where('status','=','2')->where('role_id','=','6')->count();
      

       
       
        $variables=[
            'menu'=>'users_all',
            'title_page'=>'Conferencistas',
            'users_actives'=>$users_active,
            'users_active_number'=> $users_active_number,

        ];
        return view('speaker.index')->with($variables);
    }

    public function create()
    {
        $rol_available=Role::all()->where('status','=','2');
        $variables=[
            'menu'=>'users_all',
            'title_page'=>'Usuarios',
            'rol_available'=>$rol_available,


        ];

        return view('speaker.create')->with($variables);
    }

    public function store(Request $request)
    {
        $user =new User();
        $user->name = $request->name;
        $user->first_surname = $request->first_surname;
        $user->second_surname = $request->second_surname;
        $user->gender = $request->gender;
        $user->role_id =$request->role_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
 
         if ($user->save()) {
             return back()->with('success','Se ha registrado el usuario exitosamente...');
 
         }
         else
         {
             return  back()->withErrors('No se ha registrado el usuario...');
 
         }
    }

    public function edit(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->first_surname = $request->first_surname;
        $user->second_surname = $request->second_surname;
        $user->gender = $request->gender;
        $user->role_id = $request->role_id;
        $user->email = $request->email;

        if ($user->save()) {
            
            return back()->with('success','Se ha actualizado el curso exitosamente...');

        }
        else
        {
            return  back()->withErrors('No se ha actualizado el curso...');

        }
    }

    public function update($user_id)
    {
        $current_user=User::findOrFail($user_id);
        $rol_available=Role::all()->where('status','=','2');

        $variables=[
            'menu'=>'users_all',
            'title_page'=>'Usuarios',
            'rol_available'=>$rol_available,
            'current_user'=>$current_user,



        ];

        return view('student.update')->with($variables);
    }

    public function delete($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->status=-2;

        if($user->save()){
            return back()->with('success','Se ha eliminado el curso exitosamente...');
        } else {
            return back()->with('success','No se ha eliminado el curso exitosamente...');
        }
    }
}