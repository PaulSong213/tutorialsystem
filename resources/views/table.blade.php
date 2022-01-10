@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if (session('success'))
    <section class="alert-added col-12 my-3 mx-auto" style="max-width: 1000px;">
        <div class="alert alert-success d-flex justify-content-between">
            <div>
                {{ session('success') }}
            </div>
        </div>
    </section>
    @endif
    @if (session('error'))
    <section class="alert-added col-12 my-3 mx-auto" style="max-width: 1000px;">
        <div class="alert alert-danger d-flex justify-content-between">
            <div>
                {{ session('error') }}
            </div>
        </div>
    </section>
    @endif

    
<div class="w-100 mx-auto my-5" style="max-width: 1000px;">
    <div class="mb-3 d-flex justify-content-between">
        <form action="{{$actionUrl}}" method="get">
        <div class="input-group" style="max-width: 300px;">
            @if(isset($_GET['query']) && $_GET['query'] )
                <input type="search" name="query" class="form-control rounded" placeholder="Search" value="{{$_GET['query']}}" />
            @else
                <input type="search" name="query" class="form-control rounded" placeholder="Search" />
            @endif
            <input type="hidden" name="manage" value="1">
            <button type="submit" class="btn btn-outline-primary">search</button>
        </div>
        </form>
        @if(isset($_GET['query']) && $_GET['query'] )
        <div>
            <h6 class="text-success fw-bold fs-4">Search Result for: {{$_GET['query']}} </h6>
        </div>
        @endif
    </div>
    <div class="d-flex justify-content-between">
        <h6 class="text-secondary fw-bold fs-3"> 
            {{$tableTitle}} 
            @if(isset($_GET['query']) && $_GET['query'])
                <a class="mx-3 fs-5" href="{{$actionUrl}}?manage=1">Show All</a>
            @endif
        </h6>

        <a href="{{$actionUrl.'/create'}}">
        <button class="btn btn-primary fw-bold fs-6">
            Add {{$tableTitle}}
        </button>
        </a>

    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach ($tableColumnsName as $column)
                <th> {{$column}} </th>    
                @endforeach
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tableRows as $key => $row)
            <tr>
                @foreach ($tableColumns as $column)
                <td> 
                    @if ($column == "is_teacher")
                        @if ($row['is_teacher']) 
                            <span>Teacher</span>
                        @else
                            <span>Student</span>
                        @endif
                    @elseif($column == "is_module")    
                        @if ($row['is_module'])
                        Module
                        @else
                        Video
                        @endif 
                    @elseif($column == "filename" || $column == "cover_photo_name")    
                        <a href="/storage/{{$row[$column]}}" target="_blank">
                            {{$row[$column]}}
                        </a>
                    @elseif($column == "programming_language_id")    
                        @foreach ($progLang as $lang)
                        @if ($lang['id'] == $row['programming_language_id'])
                        {{$lang['name']}}
                        @endif
                        @endforeach
                    @else
                    {{$row[$column]}} 
                    @endif

                </td>    
                @endforeach
                {{-- ACTIONS --}}
                <td class="d-flex">
                    <a href="{{$actionUrl.'/'.$row['id'].'?manage=1'}}" class="btn btn-success btn-sm fw-bold my-1 mx-1 d-block"  >
                    Edit
                    </a>
                    <form action="{{$actionUrl.'/'.$row['id']}}" method="POST" >
                    @csrf
                    @method('delete')
                    <input type="submit" href="#" class="btn my-1  btn-sm text-light btn-danger fw-bold" value="Delete"  />
                    </form>
                </td>
            </tr>
            @endforeach
            @if (sizeof($tableRows) == 0)
                <tr>
                    <td class="text-center text-danger" colspan=" {{ sizeof($tableColumns) + 2 }} ">Table is empty</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection