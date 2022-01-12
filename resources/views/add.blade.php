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

    @if ($errors->any())
        <div class="alert alert-danger my-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
  <div class="w-100 mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between mb-3">
        <h6 class="text-secondary fw-bold fs-3"> {{$title}} </h6>
      </div>
      <form action="{{$actionUrl}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('POST')

      @foreach ($inputs as $input)
      <div class="my-3">
        @if($input['type'] != 'hidden')
        <label for="{{$input['label']}}" class="form-label">{{$input['label']}}</label>
        @endif
        @if($input['type'] == 'teacher_select')
        <select class="form-control form-control-lg" id="role" name="{{$input['name']}}" required
            focus>
            <option value="1" selected>Teacher</option>
            <option value="0" selected>Student</option>
            <option value="Select Role" disabled selected>Select Role</option>
        </select>
        @elseif($input['type'] == 'select_progLang')
        <select class="form-control form-control-lg" id="role" name="{{$input['name']}}" required
            focus>
            
            @foreach($data['progLang'] as $lang )
            <option value="{{$lang->id}}">{{$lang->name}}</option>
            @endforeach

            <option value="Select Role" disabled selected>Select Programming Language</option>
        </select>

        @elseif($input['type'] == 'select_isModule')
        <select class="form-control form-control-lg" id="role" name="{{$input['name']}}" required
            focus>
            <option value="1" selected>Module</option>
            <option value="0" selected>Video</option>
            <option value="Select Role" disabled selected>Select Type</option>
        </select>
        @else
        <input required type="{{$input['type']}}" class="form-control" name="{{$input['name']}}" id="{{$input['name']}}" value="{{ old($input['name']) }}">
        @endif
      </div>
      @endforeach

      <input type="submit" href="#" class="btn my-1 fs-5 px-5 text-light btn-success fw-bold" value="Add"  />

      </form>

      
  </div>

@endsection