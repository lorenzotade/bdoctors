<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Profile;
use App\Service;
use App\Spec;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        /* $profile = User::find($user->id)->profile; */
        return view('admin.dashboard', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $specs = Spec::all();
        return view('admin.create', compact('user', 'specs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {   
        $user = User::find(Auth::id());
        $data = $request->all();

        if(array_key_exists('picture', $data)) {

            $picture_path = Storage::put('profile_pictures', $data['picture']);

            $data['picture'] = $picture_path;
        }

        $profile = new Profile();
        $profile->user_id = Auth::id();
        $profile->fill($data);
        $profile->save();

    
        if(array_key_exists('specs', $data)){  
            $user->specs()->attach($data['specs']);
        }

        /* Dalla request prendo tutti i nomi delle prestazioni, con i relativi prezzi. */
        $names = $request->name;
        $prices = $request->price;
        /* Salvo ogni singolo servizio del medico nel db */
        foreach ($names as $key => $name) {
            $service = new Service();
            $service->user_id = Auth::id();
            $service->fill(['name' => $name ]);
            $service->fill(['price' => $prices[$key] ]);
            $service->save();
        }

        return redirect()->route('admin.user.show', $user->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = Auth::user();
        $profile = $user->profile;
        return view('admin.show', compact('user','profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = Auth::user();
        $profile = $user->profile;
        $specs = Spec::all();
        $services = $user->services;
        return view('admin.edit', compact('user', 'profile', 'specs', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {

        $data = $request->all();
        $profile = $user->profile;

        if(array_key_exists('picture', $data)) {

            if($profile->picture) {
                Storage::delete($profile->picture);
            }

            $picture_path = Storage::put('profile_pictures', $data['picture']);

            $data['picture'] = $picture_path;
        }

        $profile->update($data);

        $services = $user->services;
        
        if (array_key_exists('name', $data)) {
        if(count($data['name']) >= count($services)){
            foreach($data['name'] as $key => $name){
                        if($key <= count($services) - 1){
                        $services[$key]->update(['name' => $data['name'][$key]]);
                        $services[$key]->update(['price' =>  $data['price'][$key]]);
                        } else{
                        $service = new Service();
                        $service->user_id = Auth::id();
                        $service->fill(['name' => $name ]);
                        $service->fill(['price' => $data['price'][$key] ]);
                        $service->save();
                        } 
                    }
        } elseif(count($data['name']) < count($services)) {
            foreach($services as $key => $service){
                if($key <= count($data['name']) - 1){
                $services[$key]->update(['name' => $data['name'][$key]]);
                $services[$key]->update(['price' =>  $data['price'][$key]]);
                } else{
                $services[$key]->delete();
                } 
            }
        } 



        if (array_key_exists('specs', $data)) {
            $user->specs()->sync($data['specs']);
        } else {
            $user->specs()->detach();
        }

        return redirect()->route('admin.user.show', $user->slug);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $profile = $user->profile;
        if($profile) {
            if($profile->picture) {
                Storage::delete($profile->picture);
            }
        }
        Auth::logout();
        $user->delete();
        return redirect()->route('login');
    }
}
