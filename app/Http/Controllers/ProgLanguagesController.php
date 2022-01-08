<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgLanguages;
use App\Http\Requests\StoreProgLanguagesRequest;
use App\Http\Requests\UpdateProgLanguagesRequest;

class ProgLanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progLang = ProgLanguages::all();

        if(!isset($_GET['manage'])){
            return view('programmingLanguages.index',
            ['progLang' => $progLang]);
        }else{
            return view('table', [
                'actionUrl' => '/programming-languages',
                'tableTitle' => "Manage Programming Languages",
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProgLanguagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgLanguagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgLanguages  $progLanguages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = ProgLanguages::where('id', $id)->first();
        return view('edit', [
            'actionUrl' => '/programming-languages',
            'title' => "Edit User #".$id,
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
        $users = ProgLanguages::find($id);
        if(!$users){
            return back()->with('error', 'Programming Language not found');
        }
        $users->delete();
        return back()->with('success', 'Programming Language Deleted Successfully!');
    }
}
