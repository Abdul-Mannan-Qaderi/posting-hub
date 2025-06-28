@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <div>
                @if (session('status'))
                    <div class="bg-red-100 text-red-500 w-full p-3 rounded mb-2">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                  <h1 class="mb-4 text-2xl">Login Here</h1>
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" id="email" name="email" placeholder="Your email"
                            class="bg-gray-100 border-2 border-gray-300 w-full p-4 rounded-lg
                            @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}">

                        @error('email')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="bg-gray-100 border-2 border-gray-300 w-full p-4 rounded-lg
                            @error('password')
                                border-red-500
                            @enderror
                        "
                            value="{{ old('password') }}">

                        @error('password')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="flex-items-center">
                            <input type="checkbox" id="remember" name="remember" class="mr-2">
                            <label for="rememeber">Remember Me</label>
                        </div>
                    </div>
                

                    <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
@endsection
