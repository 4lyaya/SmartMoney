@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <form method="POST" action="/login">
        @csrf

        <div class="mb-6">
            <label for="email" class="block text-gray-700 mb-2">Email Address</label>
            <input type="email" id="email" name="email"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-200 transition duration-200"
                placeholder="your@email.com" value="{{ old('email') }}" required autofocus>
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

        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox"
                    class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">
                    Remember me
                </label>
            </div>

            <div class="text-sm">
                <a href="#" class="font-medium text-primary-600 hover:text-primary-500">
                    Forgot password?
                </a>
            </div>
        </div>

        <button type="submit"
            class="w-full bg-gradient-to-r from-primary-600 to-primary-500 text-white py-3 px-4 rounded-lg hover:from-primary-700 hover:to-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition duration-200">
            Sign in
        </button>
    </form>
@endsection

@section('footer-links')
    <p class="text-gray-600">
        Don't have an account?
        <a href="/register" class="font-medium text-primary-600 hover:text-primary-500">Sign up</a>
    </p>
@endsection
