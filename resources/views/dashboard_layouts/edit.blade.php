@extends('dashboard')
@section('content')
<div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-[550px] bg-white">
      <form
      action="{{route("file.update" , $file->id)}}" method="POST" enctype="multipart/form-data"
      class="py-6 px-9"
      >
      @csrf
        <div class="mb-5">
          <label
            for="email"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Enter new title
          </label>
          <input
            type="text"
            name="title"
            id="text"
            placeholder="new title file"
            value="{{$file->name}}"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>
        <div>
            <button
            class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
          >
            upload
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
