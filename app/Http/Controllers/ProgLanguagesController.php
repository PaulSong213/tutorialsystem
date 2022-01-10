<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgLanguages;
use App\Http\Requests\StoreProgLanguagesRequest;
use App\Http\Requests\UpdateProgLanguagesRequest;
use Illuminate\Support\Facades\Auth;

class ProgLanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user())return redirect('/login');
        $progLang = ProgLanguages::all();

        if(!isset($_GET['manage'])){
            return view('programmingLanguages.index',
            ['progLang' => $progLang]);
        }else{
            if(!Auth::user()->is_teacher)return redirect('/home');

            if(isset($_GET['query'])){
                $query = $_GET['query'];
                $progLang = ProgLanguages::where('name', 'LIKE', "%$query%")
                            ->orwhere('id', 'LIKE', "%$query%")
                            ->orwhere('cover_photo_name', 'LIKE', "%$query%")
                            ->get();
            }

            return view('table', [
                'actionUrl' => '/programming-languages',
                'tableTitle' => "Programming Languages",
                'tableColumnsName' => ['Id','Name','Cover Photo'],
                'tableColumns' => ['id','name','cover_photo_name'],
                'tableRows' => $progLang
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user())return redirect('/login');
        if(!Auth::user()->is_teacher)return redirect('/home');
        return view('add', [
            'actionUrl' => '/programming-languages',
            'title' => "Add Programming Language",
            'inputs' => [
                [
                    "type" => "text",
                    "label" => "Name",
                    "name" => "name",
                ],
                [
                    "type" => "file",
                    "label" => "Cover Photo",
                    "name" => "cover_photo_name",
                ]
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProgLanguagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user())return redirect('/login');
        
        // $request->cover_photo_name->store('files');
        
        if(!Auth::user()->is_teacher)return redirect('/home');
        $request->cover_photo_name->storeAs('public', $request->cover_photo_name->getClientOriginalName());
        $row = new ProgLanguages;
        $row->name = $request['name'];
        $row->cover_photo_name = $request->cover_photo_name->getClientOriginalName();
        $row->save();
        return back()->with('success', 'Programming Language Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgLanguages  $progLanguages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::user())return redirect('/login');

        if(!Auth::user()->is_teacher)return redirect('/home');
        $users = ProgLanguages::where('id', $id)->first();
        return view('edit', [
            'actionUrl' => '/programming-languages',
            'title' => "Edit User #".$id,
            'inputs' => [
                [
                    "type" => "text",
                    "label" => "Name",
                    "name" => "name",
                ]
            ],
            'data' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgLanguages  $progLanguages
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgLanguages $progLanguages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\ProgLanguages  $progLanguages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Auth::user())return redirect('/login');

        if(!Auth::user()->is_teacher)return redirect('/home');
        $users = ProgLanguages::find($id);
        if(!$users){
            return back()->with('error', 'Programming Language not found');
        }
        
        $users->update($request->all());
        return redirect('/programming-languages?manage=1')->with('success', 'Programming Language Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgLanguages  $progLanguages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user())return redirect('/login');

        if(!Auth::user()->is_teacher)return redirect('/home');
        $users = ProgLanguages::find($id);
        if(!$users){
            return back()->with('error', 'Programming Language not found');
        }
        $users->delete();
        return back()->with('success', 'Programming Language Deleted Successfully!');
    }
}
