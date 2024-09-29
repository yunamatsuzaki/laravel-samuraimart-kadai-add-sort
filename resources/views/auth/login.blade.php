<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>@extends('layouts.app')
 
 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-5">
             <h3 class="mt-3 mb-3">ログイン</h3>
 
             <hr>
             <form method="POST" action="{{ route('login') }}">
                 @csrf
 
                 <div class="form-group">
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror samuraimart-login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">
 
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                         <strong>メールアドレスが正しくない可能性があります。</strong>
                     </span>
                     @enderror
                 </div>
 
                 <div class="form-group">
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror samuraimart-login-input" name="password" required autocomplete="current-password" placeholder="パスワード">
 
                     @error('password')
                     <span class="invalid-feedback" role="alert">
                         <strong>パスワードが正しくない可能性があります。</strong>
                     </span>
                     @enderror
                 </div>
 
                 <div class="form-group">
                     <div class="form-check">
                         <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
 
                         <label class="form-check-label samuraimart-check-label w-100" for="remember">
                             次回から自動的にログインする
                         </label>
                     </div>
                 </div>
 
                 <div class="form-group">
                     <button type="submit" class="mt-3 btn samuraimart-submit-button w-100">
                         ログイン
                     </button>
 
                     <a class="btn btn-link mt-3 d-flex justify-content-center samuraimart-login-text" href="{{ route('password.request') }}">
                         パスワードをお忘れの場合
                     </a>
                 </div>
             </form>
 
             <hr>
 
             <div class="form-group">
                 <a class="btn btn-link mt-3 d-flex justify-content-center samuraimart-login-text" href="{{ route('register') }}">
                     新規登録
                 </a>
             </div>
         </div>
     </div>
 </div>
 @endsection
