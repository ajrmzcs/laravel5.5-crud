<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(10);
        $year = date('Y');

        return view('home',compact('users','year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create a new User';
        $action = '/user';
        $year = date('Y');
        return view('form',compact('year','title','action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'address' => 'required',
            'password' => 'required'
        ]);

        // Store in DB

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $request->password,
        ]);

        if ($user) {
            return redirect('/')->with('status','New user created!!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $title = 'Edit User';
        $action = "/user/$id";
        $put = true;
        $year = date('Y');

        return view('form',compact('title','action','put','year','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($id) // Apply Unique Email against all records but the one selected.
                // This is needed only when updating
            ],
            'address' => 'required',
            'password' => 'required'
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = $request->password;

        $user->save();

        if ($user) {
            return redirect('/')->with('status','User edited!!');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {

            $deleteUser = User::destroy($id);

            return redirect('/')->with('status','User deleted!!');

        } catch (QueryException $e) {

            return redirect('/')->withErrors($e);

        }
    }
}
