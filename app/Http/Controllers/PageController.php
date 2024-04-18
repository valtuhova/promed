<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Client;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function regPage(){
        return view('reg');
    }

    public function authPage(){
        return view('auth');
    }

    public function welcome(){
        $doctors = Doctor::query()->limit(4)->get();
        return view('welcome', compact('doctors'));
    }

    public function categoryPage(){
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function servicePage(){
        $services = Service::all();
        $categories = Category::all();
        return view('service', compact('services', 'categories'));
    }

    public function doctorPage(){
        $services = Service::all();
        $doctors = Doctor::all();
        return view('doctor', compact('services', 'doctors'));
    }

    public function doctorsPage(){
        $services = Service::all();
        if (session('doctors')){
            $doctors=session('doctors');
        }else{
            $doctors = Doctor::query()->latest('created_at')->get();
        }
        return view('doctors', compact('doctors', 'services'));
    }

    public function servicesPage(){
        $categories = Category::all();
        if (session('services')){
            $services=session('services');
        }else{
            $services = Service::all();
        }
        return view('services', compact('categories', 'services'));
    }

    public function detail(Request $request){
        $service = Service::query()->where('id', $request->id)->first();
        $doctors = Doctor::all();
        return view('detail', compact('service', 'doctors'));
    }

    public function application(Request $request){
        $applications = Application::all();
        $clients = Client::query()->latest('created_at')->get();
        $doctors = Doctor::all();
        return view('application', compact('clients', 'doctors', 'applications'));
    }

    public function profile(){
        $clients = Client::all();
        $users = User::all();
        return view('profile', compact('users', 'clients'));
    }

    public function contacts(){
        return view('contacts');
    }

}
