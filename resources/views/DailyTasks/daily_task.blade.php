<div class="flex flex-col sm:flex-row gap-3">
    <div class="sm:basis-[50%] lg:basis-[70%] bg-white p-3 rounded-md shadow-sm">
        <h4 class="font-medium">
            Vos tâches d'aujourd'hui
        </h4>

        <div class="flex-1 bg-black h-px opacity-20 my-2"></div>
    
        <div class="flex flex-col lg:flex-row lg:justify-between gap-5 py-5">

            @include('DailyTasks.stat_daily_task')

            @include('DailyTasks.list_daily_task')

        </div>
    </div>

    
    <div  class="sm:basis-[50%] lg:basis-[30%] bg-white p-3 rounded-md h-max shadow-sm">
        @include('DailyTasks.add_daily_task')
    </div>
</div>