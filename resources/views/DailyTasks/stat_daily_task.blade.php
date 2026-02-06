<div class="flex-1">
    <div class="flex justify-between gap-2">
        <div class="flex-1 p-3 flex flex-col items-end bg-gray-200 border-2 border-gray-300 rounded-md h-max">
            <span class="text-4xl">
                {{ $user->tasks()->daily()->count() }}
            </span>
            <span class="text-xs">
                tâches 
            </span> 
        </div>

        
        <div class="flex-1 p-3 flex flex-col items-end bg-green-200 border-2 border-green-300 rounded-md  text-green-600 h-max">
            <span class="text-4xl">
                {{ $user->tasks()->completed()->count() }}
            </span>
            <span class="text-xs">
                réalisées
            </span>
        </div>


        <div class="flex-1 p-3 flex flex-col items-end bg-blue-200 border-2 border-blue-300 rounded-md  text-blue-600 h-max">
            <span class="text-4xl">
                {{ $user->tasks()->toDo()->count() }}
            </span>
            <span class="text-xs">
                à faire
            </span>
        </div>
    </div>

    <livewire:progress-bar :user="$user"/>
</div>