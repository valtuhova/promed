<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function ok(Request $request, Application $application)
    {
        $application->doctor_id = $request->doctor;
        $application->date = $request->date;
        $application->time = $request->time;
        $application->status = 'Подтверждено';
        $application->update();
        return redirect()->back();

    }
    public function allOrders(){
        session()->forget('applications');
        return redirect()->back();
    }




    public function reason(Request $request, Application $application)
    {
        $application->reason = $request->reason;
        $application->status = 'Отклонено';
        $application->update();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
