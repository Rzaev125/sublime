<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function email(Request $request) {
        Mail::send('emails.message', ['msg' => 'Message: '. 'You have successfully subscribed to the newsletter'], function($message) use ($request){
            $message ->to($request -> email) ->subject('Sublime');
            $message ->from('sublime_125@mail.ru', 'Sublime');
        });

        return back();
    }

    public function contact(Request $request) {
        Mail::send('emails.cmessage', ['cmsg' => $request->name,$request->sname,$request->subject,$request->message], function($message){
            $message ->to('alievirshad2003@gmail.com') ->subject('Sublime');
            $message ->from('sublime_125@mail.ru', 'Sublime/Contact');
        });

        return redirect(route('home'));
    }

    public function postLogin(Request $request) {
        // return $request->only(['email', 'password']);
        $email = $request->post('email');
        $password = $request->post('password');
        $result = Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);

        // $result = auth()->attempt($request->only(['email', 'password']));

        if($result) {
            return redirect()->route('cartIndex');
            // return to_route('cartIndex');
        }

        return redirect(route('login'));
    }

    public function postRegister(Request $request) {
        $request->validate([
            'fin'=>'required',
            'email'=>'required|email|unique:users',
            'name'=>'required',
            'password'=>'required|min:6',
        ]);


        $user = User::create([
            'sname'=>$request->fin,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'slug'=>Str::slug($request->name),
            'author'=>1,
        ]);

        Auth::login($user);
        
        $login=$request->only('email','password');
        if(Auth::attempt($login)) {
            return redirect('login');
        } else {
            return back();
        }
    }
}
