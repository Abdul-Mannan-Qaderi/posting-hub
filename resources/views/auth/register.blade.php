@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="POST">
                  <h1 class="mb-4 text-2xl">Register Here</h1>


                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name"
                        class="bg-gray-100 border-2 border-gray-300 w-full p-4 rounded-lg @error('name')
                            border-red-500 invalid 
                        @enderror"
                        value="{{ old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username"
                        class="bg-gray-100 border-2 border-gray-300 w-full p-4 rounded-lg 
                        @error('usrename')
                            border-red-500
                        @enderror"
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500 mt-2 text-sm"> {{ $message }} </div>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"
                        class="bg-gray-100 border-2 border-gray-300 w-full p-4 rounded-lg @error('password_confirmation')
                            border-red-500
                        @enderror"
                        value="{{ old('password_confirmation') }}">
                    @error('confirm_password')
                        <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
                    @enderror
                </div>

                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">REGISTER</button>
            </form>
        </div>
    </div>
@endsection
