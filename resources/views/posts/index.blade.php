@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mb-10">
            <form action="{{ route('posts') }}" method="POST" class="mb-10">
                @csrf
                <div class="mb-2">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" rows="4" cols="30"
                    required
                        class="outline-0 transition-all duration-300 focus:border-blue-100 bg-gray-100 border-2 border-gray-300 focus:outline-gray-300 w-full p-4 rounded-lg"
                        placeholder="Post something"></textarea>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="hover:cursor-pointer bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                </div>
            </form>


            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                  <x-post :post="$post" />
                @endforeach
            @else
                <div class="bg-gray-100 border border-gray-300 p-4 rounded mb-3">
                    no posts yet!
                </div>
            @endif

            {{ $posts->links() }}

        </div>
    </div>

@endsection
