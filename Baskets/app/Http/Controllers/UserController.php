<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){ 
        $users = response()->json(User::all()); 
        return $users; 
    } 
 
    public function show($id){ 
        $user = response()->json(User::find($id)); 
        return $user; 
    } 
 
    public function store(Request $request){ 
        $user = new User(); 
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->password = $request->password; 
        $user->balance = $request->balance; 
        $user->save(); 
    } 
 
    public function update(Request $request, $id){ 
        $user = User::find($id); 
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->password = $request->password; 
        $user->balance = $request->balance; 
        $user->save(); 
    } 

 public function destroy($id){  
        user::find($id)->delete(); 
    } 
}
