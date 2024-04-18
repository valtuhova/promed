<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function sort(Request $request)
    {
        $sort = $request->sort;
        $services = Service::all();

        switch($sort){
            case 'price':
                $services = $services->sortBy('price');
                break;
            case 'price-desc':
                $services = $services->sortByDesc('price');
                break;
            default:
            $services = $services->all();
        }

        session(['services'=>$services]);
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filter(Request $request)
    {
        $doctors_old = session('doctors');
        $doctors = [];
        if ($doctors_old){
            if ($request->services){
                foreach ($request->services as $service){
                    foreach ($doctors_old as $doctor){
                        if ($doctor->service_id==$service){
                            array_push($doctors, $doctor);
                        }
                    }
                }
            }
        }else{
            $doctors = Doctor::query()->where('service_id',$request->services)->get();
        }
        session(['doctors'=>$doctors]);
        return redirect()->back();
    }

    public function clear(){
        session()->forget('doctors');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function service(Request $request)
    {
        $service = new Service();

        if($request->file('img')){
            $path = $request->file('img')->store('img');
            $service->img = '/public/storage/'.$path;
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->category_id = $request->category;
        $service->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {

        if($request->file('img')){
            $path = $request->file('img')->store('img');
            $service->img = '/public/storage/'.$path;
        }else{
            $img_old = $service->img;
            $service->img = $img_old;
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;

        if ($request->category !== null) {
            $service->category_id = $request->category;
          } else {
              $category_old = $service->category_id;
              $service->category_id = $category_old;
          }
        $service->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back();
    }
}
