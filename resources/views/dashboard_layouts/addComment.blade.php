<div class="w-full max-w-[48rem] mx-auto bg-white p-5 rounded-lg shadow-md">
    <form action="{{route("comment.store" , $file)}}" method="POST">
        @csrf
        <div class="flex items-start space-x-4">
            <img class="w-12 h-12 rounded-full object-cover" src="{{Storage::url(Auth::user()->photo_url)}}" alt="User Image">
            <div class="flex-1">
                <textarea
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-gray-700 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="comment"
                    placeholder="Write your comment here..."
                ></textarea>
                <button
                    class="mt-2 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Submit
                </button>
            </div>
        </div>
    </form>
</div>
