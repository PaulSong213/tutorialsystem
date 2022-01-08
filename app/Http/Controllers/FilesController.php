<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use App\Models\ProgLanguages;
use App\Http\Requests\StoreFilesRequest;
use App\Http\Requests\UpdateFilesRequest;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Auth;


class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!isset($_GET['manage'])) {
            $progLangId = -1;

            if (!isset($_GET['progLangId'])) {
                return redirect('/programming-languages');
            } else {
                $progLangId = $_GET['progLangId'];
            }


            $files = Files::where('programming_language_id', $progLangId)->get();
            $progLang = ProgLanguages::where('id', $progLangId)->first();

            return view(
                'files.index',
                [
                'files' => $files,
                'progLang' => $progLang,
            ]
            );
        }else{
            if(!Auth::user()->is_teacher)return redirect('/home');

            $files = Files::all();
            $progLang = ProgLanguages::all();

            return view('table', [
                'actionUrl' => '/file',
                'tableTitle' => "Files",
                'progLang' => $progLang,
                'tableColumnsName' => [
                    'Id',
                    'Title',
                    'File',
                    'Description',
                    'Programming Language',
                    'Type'
                ],
                'tableColumns' => [
                    'id',
                    'title',
                    'filename',
                    'description',
                    'programming_language_id',
                    'is_module'
                ],
                'tableRows' => $files
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
        if(!Auth::user()->is_teacher)return redirect('/home');

        $progLang = ProgLanguages::all();

        return view('add', [
            'actionUrl' => '/file',
            'title' => "Add File",
            'inputs' => [
                [
                    "type" => "text",
                    "label" => "Title",
                    "name" => "title",
                ],
                [
                    "type" => "file",
                    "label" => "File",
                    "name" => "filename",
                ],
                [
                    "type" => "Text",
                    "label" => "Description",
                    "name" => "description",
                ],
                [
                    "type" => "select_progLang",
                    "label" => "Programming Language",
                    "name" => "programming_language_id",
                ],
                [
                    "type" => "select_isModule",
                    "label" => "Type",
                    "name" => "is_module",
                ],
                
            ],
            'data' => [
                "progLang" => $progLang
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFilesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->is_teacher)return redirect('/home');
        $request->filename->storeAs('public', $request->filename->getClientOriginalName());
        $row = new Files;
        $row->title = $request['title'];
        $row->filename = $request->filename->getClientOriginalName();
        $row->description = $request['description'];
        $row->programming_language_id = $request['programming_language_id'];
        $row->is_module = $request['is_module'];

        $row->save();
        return back()->with('success', 'File Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        if (!isset($_GET['manage'])) {
            $file = Files::where('id', $id)->first();

            return view(
                'files.show',
                [
            'file' => $file
            ]
            );
        }else{
            if(!Auth::user()->is_teacher)return redirect('/home');

            $users = Files::where('id', $id)->first();
            return view('edit', [
                'actionUrl' => '/file',
                'title' => "Edit File #".$id,
                'inputs' => [
                    [
                        "type" => "text",
                        "label" => "Title",
                        "name" => "title",
                    ],
                    [
                        "type" => "Text",
                        "label" => "Description",
                        "name" => "description",
                    ],
                    
                ],
                'data' => $users
            ]);
        }
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
    public function update(Request $request, $id)
    {
        if(!Auth::user()->is_teacher)return redirect('/home');

        $users = Files::find($id);
        if(!$users){
            return back()->with('error', 'File not found');
        }
        $users->update($request->all());
        return redirect('/file?manage=1')->with('success', 'File Updated Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->is_teacher)return redirect('/home');

        $users = Files::find($id);
        if(!$users){
            return back()->with('error', 'File not found');
        }
        $users->delete();
        return back()->with('success', 'File Deleted Successfully!');
    }
}
