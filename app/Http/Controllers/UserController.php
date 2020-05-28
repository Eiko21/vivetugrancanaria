<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::all();
         return view('admin.indexusuarios', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createuser');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_' .time().'.' .$extension;
            $path=$request->file('image')->move(public_path('/img'), $fileNameToStore);
            $user->image=$fileNameToStore;
        }
        $user->name=$request->name;
        $user->city=$request->city;
        $user->email=$request->email;
        if($request->role == ('empresa')) $user->description=$request->description;
        $user->role=$request->role;
        if($request->role == ('empresa')) $user->contact=$request->contact;
        
        if($request->password == $request->password2){
        //     $validatedData = $request->validate([
        //         'password' => 'required|string|min:8|confirmed',
        //         'password2' => 'required|string|min:8|confirmed',
        //     ]);
            $user->password = bcrypt($request->get('password'));
            $user->save();
            return redirect(route('indexusuarios'));
        }else{
            return redirect()->back()->with("error","Las contraseñas no coinciden.");
        }
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        return view ('client.showclient', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view ('client.editclient', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_' .time().'.' .$extension;
            $path=$request->file('image')->move(public_path('/img'), $fileNameToStore);
            $user->image=$fileNameToStore;
        }
        $user->name=$request->name;
        $user->city=$request->city;
        $user->email=$request->email;
        $user->save();
        return redirect(route('showclient',Auth::user()->id));
    }
    public function updatePassword(Request $request, $id)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","La contraseña introducida no coincide con su contraseña actual. Inténtelo de nuevo.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","Su nueva contraseña no puede ser igual que la actual. Por favor, eliga una diferente.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);
 
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Contraseña cambiada con éxito");
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        if(!empty($user->image)){
            if(file_exists(public_path('/img/'.$user->image))){
                unlink(public_path('/img/'.$user->image));
            }
        }
 
        $user->delete();
        if(Auth::user()->role == ('administrador')) return redirect(route('indexusuarios'));
        else if(Auth::user()->role == ('cliente')) return redirect(route('indexactivities'));
    }
}
