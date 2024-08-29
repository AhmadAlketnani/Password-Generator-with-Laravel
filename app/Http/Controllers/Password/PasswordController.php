<?php

namespace App\Http\Controllers\Password;

use App\Models\Password;
use Illuminate\Http\Request;
use App\Http\Traits\PasswordTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Password\PasswordGenratorController;

class PasswordController extends Controller
{
    use PasswordTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $passwords = Password::query()->WhenSearch($request->search)->
        where('user_id', Auth::user()->id)->paginate(10);
        return view('password.index',compact('passwords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $password=$request->password;
        return view('password.create',compact('password'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'website' => 'required|string',
            'user_name' => 'nullable|string'
        ]);
        $exists = Password::query()->where(['website' =>$request->website,
         'user_id' => Auth::user()->id])->exists();
         if ($exists) {
            return  redirect()->back()->withErrors('The wesite is already exists');
         }


        $password = new Password();
        $password->website =$request->input('website');
        $password->user_name = $request->user_name;

        $password->password =($request->input('password'))?$request->input('password')
        :$this->genrate();

        $password->user_id =Auth::user()->id;
        $password->save();

        session()->flash('success' , 'password added successfully');
        return redirect(route('password.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $password = $this->genrate();

        return view('password.generate', compact('password'));
    }

    public function generate_view()
    {
        $password = $this->genrate();

        return view('password.generate', compact('password'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Password $password)
    {
        return view('password.edit', compact('password'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Password $password)
    {

        $request->validate([
            'website' => 'required|string',
            'user_name' => 'nullable|string'
        ]);
        $exists = Password::query()->where(
            ['website' =>$request->website,
         'user_id' => Auth::user()->id,['id', '!=' , $password->id]]
         )->exists();
         if ($exists) {
            return  redirect()->back()->withErrors('The website is already exists');
         }

         $password->website =$request->website;
        $password->user_name = $request->user_name;

        $password->save();

        session()->flash('success' , 'password updated successfully');

        return redirect(route('password.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Password $password)
    {
        $password->delete();
        session()->flash('success' , 'password deleted successfully');
        return redirect(route('password.index'));

    }
}
