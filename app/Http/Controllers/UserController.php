<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', ['title' => 'Minha conta', 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', ['title' => 'Editar informações pessoais', 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $sessionData = ['successOnUpdate' => false];

        try {
            if (isset($validatedData['profileImage'])) {
                if ($user->profile_image_path) {
                    ImageHelper::deleteImage($user->profile_image_path);
                }

                $imagePath = ImageHelper::saveImage($validatedData['profileImage']);
                $validatedData['profile_image_path'] = $imagePath;
            }

            if (isset($validatedData['bannerImage'])) {
                if ($user->banner_image_path) {
                    ImageHelper::deleteImage($user->banner_image_path);
                }

                $imagePath = ImageHelper::saveImage($validatedData['bannerImage']);
                $validatedData['banner_image_path'] = $imagePath;
            }

            $sessionData['successOnUpdate'] = $user->update($validatedData);;
        } catch (\Throwable $th) {
            return back()->with($sessionData);
        }

        return back()->with($sessionData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
