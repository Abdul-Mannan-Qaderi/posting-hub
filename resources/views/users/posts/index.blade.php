@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="mb-4">
                <h1 class="text-4xl">
                    {{ $user->username }}
                </h1>
                <p>Posted {{$user->posts->count()}} {{Str::plural('post', $posts->count())}} and received {{ $user->receivedLikes->count()}} likes.</p> 
            </div>

            <div class="bg-white p-6 rounded-lg">

                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach
                @endif
            </div>

        </div>
    </div>
@endsection
