<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDataStoreRequest;
use App\Http\Requests\UserDataUpdateRequest;
use App\Mail\UserDataMail;
use App\Models\UserData;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = UserData::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserDataStoreRequest $request): RedirectResponse
    {
        Log::info('Validated store data:', $request->validated());
        $userData = UserData::create($request->validated());
        Mail::to('kuvandykov.ruslanchik@mail.ru')->send(new UserDataMail($userData));
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $user = UserData::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = UserData::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserDataUpdateRequest $request, UserData $user): RedirectResponse
    {
        Log::info('Validated update data:', $request->validated());
        $user->update($request->validated());
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserData $user)
    {
        $user->delete();
        return response()->noContent();
    }
}
