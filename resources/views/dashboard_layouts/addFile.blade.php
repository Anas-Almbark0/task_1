@extends('dashboard')
@section('content')
<div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-[550px] bg-white">
      <form
      action="{{route("file.store")}}" method="POST" enctype="multipart/form-data"
      class="py-6 px-9"
      >
      @csrf
        <div class="mb-5">
          <label
            for="email"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Send files to this email:
          </label>
          <input
            type="text"
            name="title"
            id="text"
            placeholder="title file"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>

         <div class="max-w-2xl mx-auto">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
            <textarea id="message" name="description" class="block bg-white text-black p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your description..."></textarea>
        </div>

        <div class="mb-6 pt-4">
          <label class="mb-5 block text-xl font-semibold text-[#07074D]">
            Upload File
          </label>

          <div class="mb-8">
            <input type="file" name="file" id="file" class="sr-only" />
            <label
              for="file"
              class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center"
            >
              <div>
                <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                  Drop files here
                </span>
                <span class="mb-2 block text-base font-medium text-[#6B7280]">
                  Or
                </span>
                <span
                  class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]"
                >
                  Browse
                </span>
              </div>
            </label>
          </div>
        </div>
        <div class="h-fp-10">
            <select name="groups[]" multiple class="select w-full my-4">
                @foreach ($groups as $group)
                <option value="{{$group->id}}"> {{$group->name}} </option>
                @endforeach
            </select>
        </div>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <div class="flex">
        <div class="relative py-3">
            <div x-data="{value: '0', offValue: '0', onValue:'1'}">
                <div class="flex items-center m-2 cursor-pointer cm-toggle-wrapper">
                    <span class="mr-3"> is private ? </span>
                    <input type="checkbox" name="isPrivate">
                </div>
            </div>
            </div>
        </div>

        <div>
          <button
            class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
          >
            Send File
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
