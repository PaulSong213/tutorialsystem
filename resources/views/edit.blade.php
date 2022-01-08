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

    
  <div class="w-100 mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between mb-3">
          <h6 class="text-secondary fw-bold fs-3"> {{$title}} </h6>
      </div>
      <form action="{{$actionUrl.'/'.$data['id']}}" method="POST" >
      @csrf
      @method('PATCH')

      @foreach ($inputs as $input)
      <div class="my-3">
        @if($input['type'] != 'hidden')
        <label for="{{$input['label']}}" class="form-label">{{$input['label']}}</label>
        @endif
        @if($input['type'] != 'password')
        <input required type="{{$input['type']}}" class="form-control" name="{{$input['name']}}" id="{{$input['name']}}" value="{{$data[$input['name']]}}">
        @else
        <input required type="{{$input['type']}}" class="form-control" name="{{$input['name']}}" id="{{$input['name']}}">
        @endif
      </div>
      @endforeach

      <input type="submit" href="#" class="btn my-1 fs-5 px-5 text-light btn-success fw-bold" value="Edit"  />


      </form>

      
  </div>

@endsection