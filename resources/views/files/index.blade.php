@extends('layouts.app')

@section('content')
  <section class="py-5 my-5 ">
    
    <div class="mx-auto" style="height: 3rem;width: 3rem;border-radius: 1.4rem;overflow: hidden;">
      <img class="w-100 h-100" src="/storage/{{$progLang->cover_photo_name}}"  alt="">
    </div>

    <h1 class="text-center fw-bold fs-1 my-4">
      {{$progLang->name}}
    </h1>
    

    <div class="container w-100">
      <div class="">

      @foreach ($files as $file)
        <div class="mx-auto p-3 w-100" style="max-width: 800px;">
          <a class="text-decoration-none d-flex flex-column pt-3 rounded shadow-sm bg-light" href="/file/{{$file->id}}" style="height: 130px;">
            <div class="px-3 row ">
              <div class="col-3 px-4" style="overflow: hidden;">
                @if ($file->is_module)
                <img class="m-auto" style="width: 7rem;" src="/image/document.svg" alt="">
                @else
                <img class="m-auto" style="width: 7rem;" src="/image/video.svg" alt="">
                @endif

              </div>
              <div class="col-9">
                <h6 class="fs-4 text-dark text-decoration-none">
                {{ $file->title }}
                </h6>
                <p class="text-secondary text-decoration-none">
                  {{ $file->description }}
                </p>
              </div>
            </div>
          </a>
        </div>
      @endforeach  
        
        
      </div>
    </div>

  </section>
@endsection
