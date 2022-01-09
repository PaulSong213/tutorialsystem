<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        if(!Auth::user()->is_teacher)return redirect('/home');

        $users = User::get();

        return view('table', [
            'actionUrl' => '/user',
            'tableTitle' => "Users",
            'tableColumnsName' => ['Id','Name','Email','User Role'],
            'tableColumns' => ['id','name','email','is_teacher'],
            'tableRows' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->is_teacher)return redirect('/home');

        return view('add', [
            'actionUrl' => '/user',
            'title' => "Add User",
            'inputs' => [
                [
                    "type" => "text",
                    "label" => "Name",
                    "name" => "name",
                ],
                [
                    "type" => "email",
                    "label" => "Email",
                    "name" => "email",
                ],
                [
                    "type" => "password",
                    "label" => "Password",
                    "name" => "password",
                ],
                [
                    "type" => "teacher_select",
                    "label" => "Role",
                    "name" => "is_teacher",
                ],
                
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->is_teacher)return redirect('/home');

        $row = new User;
        $row->name = $request['name'];
        $row->email = $request['email'];
        $row->is_teacher = $request['is_teacher'];
        $row->password = md5($request['password']);

        $row->save();
        return back()->with('success', 'User Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::user()->is_teacher)return redirect('/home');

        $users = User::where('id', $id)->first();
        return view('edit', [
            'actionUrl' => '/user',
            'title' => "Edit User #".$id,
            'inputs' => [
                [
                    "type" => "text",
                    "label" => "Name",
                    "name" => "name",
                ],
                [
                    "type" => "email",
                    "label" => "Email",
                    "name" => "email",
                ],
                [
                    "type" => "password",
                    "label" => "Password",
                    "name" => "password",
                ],
                [
                    "type" => "hidden",
                    "label" => "is_teacher",
                    "name" => "is_teacher",
                ],
                
            ],
            'data' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        if(!Auth::user()->is_teacher)return redirect('/home');

        $users = User::find($id);
        if(!$users){
            return back()->with('error', 'User not found');
        }
        $request['password'] = md5($request['password']);
        $users->update($request->all());
        return redirect('/user')->with('success', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->is_teacher)return redirect('/home');

        $users = User::find($id);
        if(!$users){
            return back()->with('error', 'User not found');
        }
        $users->delete();
        return back()->with('success', 'User Deleted Successfully!');
    }
}
