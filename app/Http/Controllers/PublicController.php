<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Mail\WorkWithUsMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\AdminWorkWithUsMail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    
    public function homepage(){
        
        $categories = Category::all();
        $announcements = Announcement::where('is_accepted' , true)->orderBy('created_at', 'desc')->take(5)->get();
        return view('homepage' , compact('announcements','categories'));

    }

    public function search(Request $request){

        $q = $request->input('q');
        $announcements = Announcement::search($q)->get();
        return view('search_results', compact('q', 'announcements'));
    }


    public function workWithUs(){
        return view('workWithUs');
    }


    public function workWithUsSubmit(Request $request){
        // $name = $request->input('name');
        $name = Auth::user()->name;
        $surname = $request->surname;
        $email = Auth::user()->email;
        $aboutYou = $request->input('aboutYou');

        $user_contact = compact('name', 'surname', 'email', 'aboutYou');

        Mail::to($email)->send(new WorkWithUsMail($user_contact));
        Mail::to('Amministratore@presto.com')->send(new AdminWorkWithUsMail($user_contact));



        return redirect(route('homepage'))->with('flash','E-mail inviata correttamente');

    }

    public function tips(){
        return view('advice.advice');
    }



    public function locale($locale){
        // dd($locale);
        session()->put('locale', $locale);
        // App::setLocale($locale);

        return redirect()->back();
    }
    
}
