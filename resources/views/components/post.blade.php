@props(['post' => $post])

<div class="border-l-2 border-blue-500 px-4 mb-6">
    <a href="{{ route('users.posts', $post->user) }}" class="text-sm font-bold"><span>@</span>{{ $post->user->username }}
    </a><span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
    <a class="block" href="{{route('posts.show', $post)}}">{{ $post->body }} </a>

    @if ($post->ownedBy(auth()->user()))
        <div>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="text-blue-500">Delete</button>
            </form>
        </div>
    @endif

    <div class="flex ites-center mt-2">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    <button class="text-blue-500 text-2xl">&#9825;</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 text-2xl">&hearts;</button>
                </form>
            @endif

        @endauth

        &nbsp;{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}
    </div>
</div>
