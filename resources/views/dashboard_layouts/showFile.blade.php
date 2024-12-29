@extends('dashboard')
@section('content')
<div class="w-75 m-auto">
<div class="flex my-5 items-center justify-center">
    <div class="relative flex w-full max-w-[48rem] flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
        @php
                $icons = ['pdf' => 'fa-file-pdf','jpg' => 'fa-file-image','png' => 'fa-file-image','psd' => 'fa-palette','docx' => 'fa-file-word'];
                $currentIcon = 'fa-file';
                $currentColor = 'blue-300';
            @endphp
      <div class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-dark text-gray-700">
        <i class="fas flex justify-center items-center text-white {{ $icons[$file->metadata->extension] ?? $currentIcon }} h-full w-full object-cover" style="font-size: 5rem"></i>
      </div>
      <div class="p-6">
        <div class="flex items-center">
            <img src="{{Storage::url($file->user->photo_url)}}" class="w-10 h-10 rounded-full" alt="img">
            <span class="text-lg font-bold text-gray-700 ms-3">{{ $file->user->name }}</>
        </div>
        <h6 class="mb-4 mt-3 block font-sans text-base font-semibold uppercase leading-relaxed tracking-normal antialiased">
          {{$file->metadata->extension}}
        </h6>
        <h4 class="mb-2 block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
          {{$file->name}}
        </h4>
        <p class="mb-4 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
            Like so many organizations these days, Autodesk is a company in
            transition. It was until recently a traditional boxed software company
            selling licenses. Yet its own business model disruption is only part of
            the story
          </p>
        <span class="font-bold text-sm mt-2 block"> {{$file->created_at->diffForHumans()}} </span>
        <span class="font-bold text-sm mt-2 block">
           Size file: {{$file->readable_size}}
        </span>
        <form action="{{route("like.store" , $file->id)}}" method="POST">
            @csrf
            <button
            class="mt-4 flex select-none items-center gap-2 rounded-lg py-3 px-6 text-center align-middle font-sans font-bold uppercase text-blue-500 transition-all hover:bg-blue-500/10 active:bg-blue-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            type="submit" name="like"
          >
           {{count($file->likes)}} <i class="fas fa-thumbs-up"></i>
          </button>
        </form>
          <a href="{{Storage::url($file->path)}}" download class="w-fit mt-4 flex select-none items-center gap-2 rounded-lg py-3 px-6 text-center align-middle font-sans font-bold uppercase bg-blue-500/20 text-blue-500 transition-all hover:bg-blue-500/10 active:bg-blue-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
            <span> Download </span>
          </a>
      </div>
    </div>
    </div>
  </div>
  @include('dashboard_layouts.addComment')
  @include("dashboard_layouts.showComments")
</div>
@endsection
