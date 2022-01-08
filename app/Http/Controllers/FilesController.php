<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\ProgLanguages;
use App\Http\Requests\StoreFilesRequest;
use App\Http\Requests\UpdateFilesRequest;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progLangId = -1;

        if(!isset($_GET['progLangId'])){
            return redirect('/programming-languages');
        }else{
            $progLangId = $_GET['progLangId'];
        }


        $files = Files::where('programming_language_id', $progLangId)->get();
        $progLang = ProgLanguages::where('id', $progLangId)->first();

        return view('files.index',
        [
            'files' => $files,
            'progLang' => $progLang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFilesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = Files::where('id', $id)->first();

        return view('files.show',
        [
            'file' => $file,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function edit(Files $files)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFilesRequest  $request
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFilesRequest $request, Files $files)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function destroy(Files $files)
    {
        //
    }
}
