@extends('layouts.app')

@section('content')
  <section class="py-2">
    <div class="col-3 px-4 mx-auto" style="overflow: hidden;width: max-content;">
      @if ($file->is_module)
      <img class="m-auto" style="width: 5rem;" src="/image/document.svg" alt="">
      @else
      <img class="m-auto" style="width: 5rem;" src="/image/video.svg" alt="">
      @endif
    </div>

    <h1 class="text-center fw-bold fs-4 my-2">
      {{$file->title}}
    </h1>
    <h6 class="text-center text-secondary my-4">
      {{$file->description}}
    </h6>

    <div class="container w-100">

      @if ($file->is_module)
      <div class="mx-auto w-100" style="max-width: 800px;">
      <embed src="/storage/{{$file->filename}}" width="100%" height="1000px" />
      </div>
      @else
      <div class="mx-auto w-100" style="max-width: 800px;">
      <embed src="/storage/{{$file->filename}}" width="100%" height="500px" />
      </div>
      @endif

    </div>

  </section>
@endsection
