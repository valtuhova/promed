<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $service_id)
    {
        $service = Service::query()->where('id', $service_id)->first();

        $application = Application::query()->where('id', $service_id)
            ->where('user_id', Auth::id())->where('status', 'Новая')
            ->firstOrCreate(['service_id'=>$service->id], ['user_id'=>Auth::id()], ['status'=>'Новая']);

        $client = new Client();
        $client->fio = $request->fio;
        $client->phone = $request->phone;
        $client->description = $request->description;
        $client->application_id = $application->id;


        $application->status = 'Новая';
        $application->save();
        $client->save();
        return redirect()->back()->with('ok', 'Ваша заявка отправлена, администратор свяжется с вами в ближайшее время');
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
