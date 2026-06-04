@extends('base')

@section('title', $user->name)
    
@section('content') 
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif
     <div>
        <h3 class="font-black">
            Vos projets
        </h3>
    </div>
    <div class="flex-1 bg-black h-px opacity-20 my-3"></div>

    <div class="flex flex-col md:flex-row gap-3">
        <div class="md:basis-[70%]">
            <div class="flex flex-col lg:flex-row items-end gap-3  bg-white p-3 rounded-md shadow-sm">
                @include('shared.input', [  
                    'type' => 'text',
                    'class' => 'place-self-stretch col lg:basis-[70%]',
                    'name' => 'title',
                    'label' => 'Recherche'
                ])

                <div x-data="{ open: false }" class="relative inline-block text-left lg:basis-[30%]">
                    <button
                        @click="open = !open"
                        class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md">
                        Tous les projets
                        <svg class="w-4 h-4 transition-transform"
                            :class="{ 'rotate-180': open }"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <ul
                        x-show="open"
                        x-transition
                        @click.outside="open = false"
                        class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg z-50">

                        <li>
                            <a href="#">
                                a
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                b
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @include('Projects.list')
        </div>


        <div class="md:basis-[30%] bg-white p-3 rounded-md shadow-sm">
            @include('Projects.form')
        </div>
    </div>
    
    
@endsection