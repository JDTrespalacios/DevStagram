<div>
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{route('posts.show', ['post' => $post , 'user' => $post->user ])}}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Post {{$post->titulo}} Image">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="my-6">
            {{ $posts->links() }}
        </div>


    @else
        <div class="flex justify-center gap-2 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
            </svg>
            <p class="text-center">No posts available</p>
        </div>
    @endif
    
    {{-- @forelse ($posts as $post)
        <h1> {{$post->titulo}} </h1>
    @empty
        <p>No posts available</p>
    @endforelse --}}
</div>