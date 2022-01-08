@extends('layouts.app')

@section('content')
  <section class="py-5 my-5 ">

    <h1 class="text-center fw-bold fs-1 mb-5">Programming Languages</h1>

    <div class="container w-100">
      <div class="row ">

      @foreach ($progLang as $lang)
        <div class="col-12 col-md-6 col-xl-4 p-3">
          <a class="text-decoration-none d-flex flex-column justify-content-center rounded shadow bg-light" href="file?progLangId={{$lang->id}}"  style="height: 180px;">
            <div class="px-3 row ">
              <div class="col-5">
                <div class="mx-auto shadow" style="height: 7rem;width: 7rem;border-radius: 1.4rem;overflow: hidden;">
                <img class="w-100 h-100" src="/files/{{$lang->cover_photo_name}}" alt="">
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
