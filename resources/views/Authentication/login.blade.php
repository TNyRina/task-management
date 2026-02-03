@extends('Authentication.base')

@section('title', 'Se connecter')


@section('content')
<div class="h-full flex flex-col lg:flex-row justify-center items-center">
    <div class="basis-[50%] items-center">
        <img src="/images/illustrations/IT Admin Accessing Data.jpeg" alt="">
    </div>
    <div class="mx-5 flex flex-col">
        <h2 class="text-5xl font-bold">Bienvenue !</h2>
        <p>Connectez-vous pour gérer vos tâches éfficacement.</p>

        <form action="{{ route('login') }}" method="post" class="my-5 flex flex-col gap-3">
            @csrf
            @include('shared.input', [
                'type' => 'email',
                'class' => 'col',
                'name' => 'email',
                'label' => 'Email'
            ])
            @include('shared.input', [
                'type' => 'password',
                'class' => 'col',
                'name' => 'password',
                'label' => 'Mot de passe'
            ])
            <button class="basis-[100%] bg-blue-800 rounded-md p-2 text-white">@yield('title')</button>
        </form>
        <a href="{{ route('google.redirect') }}" class="basis-[100%] p-2 rounded-md border-2 border-blue-80 flex flex-row items-center justify-center gap-5" >
            <svg width="24" height="24" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-label="Google logo">
                <path fill="#EA4335" d="M24 9.5c3.54 0 6.32 1.22 8.19 3.03l6.1-6.1C34.59 2.91 29.74 1 24 1 14.73 1 6.88 6.28 3.19 13.98l7.1 5.51C12.1 13.36 17.57 9.5 24 9.5z"/>
                <path fill="#4285F4" d="M46.1 24.5c0-1.63-.15-3.2-.43-4.72H24v9.02h12.43c-.54 2.88-2.15 5.32-4.58 6.95l7.05 5.47C43.04 37.36 46.1 31.46 46.1 24.5z"/>
                <path fill="#FBBC05" d="M10.29 28.49c-.47-1.41-.74-2.92-.74-4.49s.27-3.08.74-4.49l-7.1-5.51C1.82 16.67 1 20.22 1 24s.82 7.33 2.19 10.02l7.1-5.53z"/>
                <path fill="#34A853" d="M24 47c5.74 0 10.59-1.9 14.12-5.18l-7.05-5.47c-1.96 1.32-4.48 2.1-7.07 2.1-6.43 0-11.9-3.86-13.71-9.51l-7.1 5.53C6.88 41.72 14.73 47 24 47z"/>
            </svg>
            Continuer avec google
        </a>
        <p>Vous n'avez pas encore de compte? <a href="{{ route('registerPage') }}" class="text-blue-800 underline">Inscrivez-vous</a></p>
    </div>
</div>
    
@endsection