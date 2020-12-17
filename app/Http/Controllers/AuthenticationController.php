<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\NewNoticeRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Models\User;
use App\Models\Notice;
use App\Models\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class AuthenticationController extends Controller
{
    public function logout ()
    {
        Auth::logout();
        return redirect('/');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email','password']);

        try {
            if (Auth::attempt($credentials)) {
                return redirect('/admin/dashboard');
            } else {
                return redirect()->back()->withErrors('Wrong credentials provided');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error signing in');
        }
    }


    public function newuser(CreateNewUserRequest $request)
    {
        $password = $this->generatePassword();
        $data = $request->only([
            'first_name',
            'last_name',
            'email' 
        ]);
        $data['role'] = $request->user_category;
        $data['phone'] = $request->phone_number;
        $data['password'] = Hash::make($password);
        $newUser = User::create($data);
        
        $response = 'New User Created <br/> Email: '.$newUser->email.' <br/> Role: '.$this->formatRole($newUser->role).'<br/> Password '.$password;
        
        return redirect()->back()->with('message', $response);
       
    }

    private function generatePassword()
    {
        $tg = rand(20,2000) * time();
        $gh = "ABCDEFGHabcdefg&^%$";
        $password = sprintf("%0.8s", str_shuffle($tg.$gh));
        return $password;
    }

    private function formatRole($role)
    {
       return ucwords(str_replace("-"," ", $role));
    }

    public function removeUser(User $id)
    {
        $id->delete();
        $users = User::all(); 
        return redirect()->back(); 
    }

    public function resetPassword(PasswordResetRequest $request)
    {
       $password = $request->password;
       $user = User::find(auth()->user()->id);
       $user->update([
           'password' => Hash::make($password)
       ]);

       $response = 'Password updated';
        
        return redirect()->back()->with('message', $response);

    }
 
}
 