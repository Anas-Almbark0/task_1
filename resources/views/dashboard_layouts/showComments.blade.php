<div class="w-full max-w-[48rem] mx-auto mt-5 space-y-4">
    @foreach ($file->comments as $comment)
    <div class="bg-white p-4 rounded-lg shadow-md flex items-start space-x-4">
        <img class="w-10 h-10 rounded-full object-cover" src="{{Storage::url($comment->user->photo_url)}}" alt="User Image">
        <div class="w-full">
            <h4 class="text-sm font-medium text-blue-700">{{$comment->user->name}}</h4>
            <p class="text-gray-600 mt-3"> {{$comment->comment}} </p>
            <div class="border-t border-gray-300 w-full py-2 mt-2">
                <span class="text-sm w-full block mt-1"> {{$comment->created_at->diffForHumans()}} </span>
            </div>
        </div>
    </div>
    @endforeach
</div>
