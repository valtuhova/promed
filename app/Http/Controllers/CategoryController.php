<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

     public function filter(Request $request)
     {
         $services_old = session('services');
         $services = [];
         if ($services_old){
             if ($request->categories){
                 foreach ($request->categories as $category){
                    foreach ($services_old as $service){
                         if ($service->category_id==$category){
                             array_push($services, $service);
                         }
                     }
                 }
             }
         }else{
             $services = Service::query()->where('category_id',$request->categories)->get();
         }
         session(['services'=>$services]);
         return redirect()->back();
     }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.ы
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
