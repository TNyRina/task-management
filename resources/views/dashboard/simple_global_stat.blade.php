<h4 class="font-medium">
    Statitique des tâches
</h4>

<div class="flex-1 bg-black h-px opacity-20 my-2"></div>


<div class="flex flex-col sm:flex-row justify-around">
    <div>
        <livewire:task-donut />
    </div>
    <div class="flex sm:flex-col justify-between gap-2">
        <div class="flex-1 p-3 flex flex-col items-end bg-gray-200 border-2 border-gray-300 rounded-md  text-gray-600 h-max">
            <span  class="text-4xl">
                {{ $user->tasks->count() }}
            </span>
            <span  class="text-xs">
                tâches
            </span>
        </div>

        <div class="flex-1 p-3 flex flex-col items-end bg-green-200 border-2 border-green-300 rounded-md  text-green-600 h-max">
            <span  class="text-4xl">
                {{ $user->tasks()->completed()->count() }}
            </span>
            <span class="text-xs">
                réalisées
            </span>
        </div>
        <div class="flex-1 p-3 flex flex-col items-end bg-red-200 border-2 border-red-300 rounded-md  text-red-600 h-max">
            <span  class="text-4xl">
                {{ $user->tasks()->late()->count() }}
            </span>
            <span  class="text-xs">
                en retard
            </span>
        </div>
    </div>
</div>


