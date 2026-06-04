<div class="flex flex-col gap-3 my-3">
    @foreach ($user->projects as $project)
        <div class="bg-white shadow-sm rounded-md">
            <div x-data="{ open: false }">
                <div class="p-3 flex justify-between gap-3 items-center">
                    <div class="flex items-center gap-3">
                        <button
                        @click="open = !open"
                        class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md">
                            <svg class="w-4 h-4 transition-transform"
                                :class="{ 'rotate-180': open }"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m19 9-7 7-7-7" />
                            </svg>
                        </button>
                        <h4>
                            {{ $project->title }}
                        </h4>
                    </div>
                    <div class="flex gap-3">
                        <span class="text-gray-500 text-sm">
                            {{ $project->tasks()->completed()->count() }} / {{ $project->tasks->count() }} tâches
                        </span>
                        <div class="cursor-pointer">
                            <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 24 24" 
                            fill="currentColor" 
                            class="size-6">
                                <path 
                                fill-rule="evenodd" 
                                d="M10.5 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" 
                                clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Menu -->
                <ul
                    x-show="open"
                    x-transition
                    @click.outside="open = false"
                    class="">

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
    @endforeach
</div>
