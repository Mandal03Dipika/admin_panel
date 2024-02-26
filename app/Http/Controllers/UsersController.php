<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = Users::get();
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data['users'] = Users::all();
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new USers;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['user'] = Users::find($id);
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Users::find($id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->password = $request->password;
        $user->update();
        return redirect()->route('user.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
