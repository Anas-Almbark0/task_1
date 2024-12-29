@extends('dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
@if (Route::is("file.index"))
<h4 class="fw-bold py-3 mb-4">my Files</h4>
<form action="{{route("file.create")}}">
    <button class="btn bg-dark mb-2 text-white"> upload file </button>
</form>
@endif
@if (Route::is("file.allFiles"))
<h4 class="fw-bold py-3 mb-4">All Files</h4>
@endif
<div class="row">
    <div class="p-3">
        <div class="list-groups bg-white w-fit p-4 shadow-sm mb-4 rounded">
            @php
                $allGroups = $files->flatMap->groups->unique('id');
            @endphp
            <h3 class="mb-3"> All Groups: </h3>
            @foreach ($allGroups as $group)
            <div class="flex items-center mb-2">
                <span class="block w-5 h-5 mb-2 rounded-full mr-2" style="background-color: {{$group->color}}"></span>
                <span class="text-sm font-semibold text-gray-700">{{ $group->name }}</span>
            </div>
            @endforeach
        </div>
        <div class="grid grid-cols-4 gap-5 w-full flex-wrap">
            @foreach($files as $file)
            @php
                $icons = ['pdf' => 'fa-file-pdf','jpg' => 'fa-file-image','png' => 'fa-file-image','psd' => 'fa-palette','docx' => 'fa-file-word'];
                $currentIcon = 'fa-file';
                $currentColor = 'blue-300';
                $ex = $file->metadata->extension;
                if($ex == "pdf"){
                    $currentColor = 'red-300';
                }else if($ex == "jpg"){
                    $currentColor = 'blue-300';
                }else if($ex == "png"){
                    $currentColor = 'green-300';
                }else if($ex == "docx"){
                    $currentColor = 'orange-300';
                }else if($ex == "psd"){
                    $currentColor = 'zinc-700';
                }else if($ex == "rar"){
                    $currentColor = 'amber-300';
                }
                else{
                    $currentColor = 'gray-300';
                }
            @endphp
            <div class="w-full bg-white shadow-sm rounded p-4">
                @if (Auth::id() == $file->user_id)
                <div class="mb-2 mt-1 flex justify-end">
                    <form action="{{route("file.edit" , $file->id)}}" method="POST">
                        @csrf
                        <button class="text-blue-500 hover:text-blue-700 block mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 3.487a2.25 2.25 0 113.182 3.182L7.5 19.5l-4.5 1.5 1.5-4.5L16.862 3.487z" />
                            </svg>
                        </button>
                    </form>
                    <form action="{{route("file.destroy" , $file->id)}}" method="POST">
                        @csrf
                        @method("delete")
                        <button class="text-red-500 ml-3 hover:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 4.5h3m7.5 3h-18m1.125 3h15.75M4.5 21h15M7.875 21v-12m8.25 12v-12" />
                            </svg>
                        </button>
                    </form>
                </div>
            @endif
                    <div class="flex">
                        <div class="text-center  flex-shrink-0  h-12 w-12 rounded-xl">
                            <i class="fas {{$icons[$file->metadata->extension] ?? $currentIcon}} text-{{$currentColor}}" style="font-size: 40px"></i>
                            <span class="font-bold text-sm mt-4 text-{{$currentColor}}"> {{$file->metadata->extension}} </span>
                        </div>
                        <div class="flex flex-col flex-grow ml-4">
                            <a href="{{route("file.show" , $file->id)}}" class="text-sm text-gray-500">{{$file->name}}</a>
                            <div class="font-bold text-sm mt-2 "> {{$file->readable_size}} </div>
                        </div>
                    </div>

                <div class="groups mt-2 flex">
                    @foreach ($file->groups as $group)
                    <span class="mt-3 ms-3 block w-5 h-5 rounded-full" style="background-color: {{$group->color}}"> </span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection



