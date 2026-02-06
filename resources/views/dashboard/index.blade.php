@extends('base')

@section('title', 'dashboard')
    
@section('content')
    <div class="p-5">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <h3 class="font-black">
                Bonjour {{ $user->name }} !
            </h3>
        </div>
        <div class="flex flex-row items-center justify-around gap-2 mb-5">
            <p class="whitespace-nowrap">
                Voici votre tableau de bord.
            </p>
            <div class="flex-1 bg-black h-px opacity-20"></div>
        </div>

        <div >
            @include('DailyTasks.daily_task')
        </div>
    </div>
@endsection