<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    //get register form
    public function create(){
        return view('users.register');
    }

    //create a new user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        if($request['role']){
                $formFields['role'] = $request['role'];   
        }
        else
            $formFields['role'] = $request['crole'];
      

    //hash password
    
    $formFields['password'] = bcrypt($formFields['password']);  
    //create user
    $user = User::create($formFields);

    auth()->login($user);

    return redirect('/courses')->with('message', 'User created and logged in!');

    }

    //logout user
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/courses')->with('message', 'You have been logged out!');
    }

    //get login form
    public function login(){
        return view('users.login');
    }

    //log in user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/courses')->with('message', 'You are logged in!');
        }
        return back()->withErrors(['email' => 'Invalid credientals'])->onlyInput('email');
    }

    //get all users
    public function manage(){
        $users = User::all();

        return view('users.manage', [
            'users' => $users
        ]);
    }

    //delete a user
    public function destroy(User $user){
        $user->delete();

        return back()->with('message', 'User deleted successfully');
    }

    //get user profile
    public function profile(User $user){
        
        if(auth()->user()->id != $user->id){
            abort(403, 'Unautorized access.');
        }

        return view('users.profile', [
            'user' => $user
        ]);
    }

    //get change password form
    public function changePasswordForm(User $user){

        if(auth()->user()->id != $user->id){
            abort(403, 'Unautorized access.');
        }

        return view('users.changePassword', [
            'user' => $user
        ]);
    }

    //change password
    public function changePassword(Request $request, User $user){

        if($user->id != auth()->id()){
            abort(403, 'Unauthorized action');
        }

        $formField = $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);

        $currentpassword = $request['currentpassword'];

        $verified = password_verify($currentpassword, auth()->user()->password);

        $verified_old = false;
        $oldpasswords = [];

        if($verified){

            if($user->old_passwords){
                $oldpasswords = explode('|', $user->old_passwords);

                foreach($oldpasswords as $oldpassword){
                    $verified_old = password_verify($formField['password'], $oldpassword);
                    if($verified_old) break;
                }
                if($verified_old) return back()->with('message', 'New password must be different than the last three');
                else{

                    if(count($oldpasswords) == 3){
                        array_pop($oldpasswords);
                        array_unshift($oldpasswords, $user->password);
                    }
                    else{
                        array_unshift($oldpasswords, $user->password);
                    }

                }
            }
            else{
                array_unshift($oldpasswords, $user->password);
            }
          
            

            $formField['password'] = bcrypt($formField['password']);
            $formField['old_passwords'] = implode('|', $oldpasswords);
    
            $user->update($formField);
    
            return redirect("/users/profile/$user->id")->with('message', 'Password changed successfully');
        }
        else
        return back()->with('message', 'The current password that you entered is incorrect');

    }


}
