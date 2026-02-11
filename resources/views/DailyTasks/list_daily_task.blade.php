<ul class="flex-1 flex flex-col">
    @foreach ($user->tasks()->daily()->get() as $task)
        <li>
            <div class="flex items-start gap-2">
                    <a 
                    href="{{ route('task.completed', ['id'=>$task->id]) }}"  
                    class="{{ $task->completed ? 'text-green-500' : 'text-blue-600' }}">

                    @if ($task->completed)
                        <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 24 24" 
                        fill="currentColor" 
                        class="size-6">
                            <path 
                            fill-rule="evenodd" 
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" 
                            clip-rule="evenodd" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-6">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    @endif  
                </a>


                <div class="flex-1 flex flex-col">
                    <div class="flex flex-row items-center">
                        <h6 class="{{ $task->completed ? 'text-gray-400 line-through' : 'text-black before:bg-blue-500' }} ">
                            {{ $task->title }}
                        </h6> 


                        <div class="flex-1 bg-black h-px opacity-10 m-3"></div>


                        <div  
                        x-data="{ open: false }" 
                        class="relative">
                            <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="size-6 hover:cursor-pointer" 
                            @click="open = !open">
                                <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                            </svg>

                            <div 
                            x-show="open" 
                            @click.outside="open = false" 
                            class="absolute right-0 mt-2 z-50 flex flex-col gap-2 p-3 bg-white border rounded shadow-lg">
                                <form 
                                action="{{ route('daily_task.destroy', ['daily_task'=>$task]) }}" 
                                method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        Supprimer
                                    </button>
                                </form>
                                <a href="{{ route('daily_task.edit', ['daily_task'=>$task]) }}">
                                    Modifer
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    @if ($task->description)
                        <p class="text-xs text-gray-500">
                            {{$task->description}}
                        </p>
                    @endif 
                </div>
            </div>
        </li>
    @endforeach
</ul>