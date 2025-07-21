@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <form method="POST" action="/register">
        @csrf

        <div class="mb-6">
            <label for="name" class="block text-gray-700 mb-2">Full Name</label>
            <input type="text" id="name" name="name"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-200 transition duration-200"
                placeholder="John Doe" value="{{ old('name') }}" required autofocus>
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block text-gray-700 mb-2">Email Address</label>
            <input type="email" id="email" name="email"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-200 transition duration-200"
                placeholder="your@email.com" value="{{ old('email') }}" required>
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 mb-2">Password</label>
            <input type="password" id="password" name="password"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-200 transition duration-200"
                placeholder="••••••••" required>
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-200 transition duration-200"
                placeholder="••••••••" required>
        </div>

        <button type="submit"
            class="w-full py-3 px-4 text-white rounded-lg bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-200">
            Create Account
        </button>
    </form> 
@endsection

@section('footer-links')
    <p class="text-gray-600">
        Already have an account?
        <a href="/login" class="font-medium text-primary-600 hover:text-primary-500">Sign in</a>
    </p>
@endsection
