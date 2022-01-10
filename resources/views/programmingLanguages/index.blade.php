@extends('layouts.app')

@section('content')
  <section class="py-5 my-5 ">

    <h1 class="text-center fw-bold fs-1 mb-5">Programming Languages</h1>

    <div class="container mb-3 d-flex justify-content-between">
        <form action="/programming-languages" method="get">
        <div class="input-group" style="max-width: 300px;">
            @if(isset($_GET['query']) && $_GET['query'] )
                <input type="search" name="query" class="form-control rounded" placeholder="Search" value="{{$_GET['query']}}" />
            @else
                <input type="search" name="query" class="form-control rounded" placeholder="Search" />
            @endif
            <button type="submit" class="btn btn-outline-primary">search</button>
        </div>
        </form>
        @if(isset($_GET['query']) && $_GET['query'] )
        <div class="d-flex flex-column">
            <a class="fs-6" style="text-align: right;" href="/programming-languages">Show All</a>
            <h6 class="text-success fw-bold fs-5">Search Result for: {{$_GET['query']}} </h6>
        </div>
        @endif
    </div>

    <div class="container w-100">
      <div class="row ">
      @if(sizeof($progLang) <= 0 )
      <h6 class="text-center text-danger fw-bold">No Data Found</h6>
      @endif
      @foreach ($progLang as $lang)
        <div class="col-12 col-md-6 col-xl-4 p-3">
          <a class="text-decoration-none d-flex flex-column justify-content-center rounded shadow bg-light" href="file?progLangId={{$lang->id}}"  style="height: 180px;">
            <div class="px-3 row ">
              <div class="col-5">
                <div class="mx-auto shadow" style="height: 7rem;width: 7rem;border-radius: 1.4rem;overflow: hidden;">
                
                <img class="w-100 h-100" src="/storage/{{$lang->cover_photo_name}}" alt="">
                </div>
              </div>
              <div class="col-7">
                <h6 class="fs-3 fw-bold text-secondary text-decoration-none">
                {{ $lang->name }}
                </h6>
              </div>
            </div>
          </a>
        </div>
      @endforeach  
        
        
      </div>
    </div>

  </section>
@endsection
