<?php

namespace App\Http\Controllers;

use App\Http\Requests\WaitlistedUser\StoreWaitlistedUserRequest;
use App\Models\WaitlistedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class WaitlistedUserController extends Controller
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
    public function store(StoreWaitlistedUserRequest $request)
    {
        try {
            $waitlistedUser = WaitlistedUser::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'type' => $request->get('type'),
                'number_of_properties' => $request->get('number_of_properties'),
            ]);

            $waitlistedUser->save();
        } catch (Throwable $th) {
            Log::error($th);
            return back()->withErrors([
                'general' => 'Something went wrong. Please try again.'
            ]);
        }

        return to_route('landing');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
