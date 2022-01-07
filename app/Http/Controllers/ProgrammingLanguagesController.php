<?php

namespace App\Http\Controllers;

use App\Models\ProgrammingLanguages;
use App\Http\Requests\StoreProgrammingLanguagesRequest;
use App\Http\Requests\UpdateProgrammingLanguagesRequest;

class ProgrammingLanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProgrammingLanguagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgrammingLanguagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgrammingLanguages  $programmingLanguages
     * @return \Illuminate\Http\Response
     */
    public function show(ProgrammingLanguages $programmingLanguages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgrammingLanguages  $programmingLanguages
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgrammingLanguages $programmingLanguages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgrammingLanguagesRequest  $request
     * @param  \App\Models\ProgrammingLanguages  $programmingLanguages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgrammingLanguagesRequest $request, ProgrammingLanguages $programmingLanguages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgrammingLanguages  $programmingLanguages
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgrammingLanguages $programmingLanguages)
    {
        //
    }
}
