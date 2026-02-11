<div class="flex flex-col lg:flex-row  gap-3">
    <div class="basis-[40%] bg-white p-3 shadow-sm rounded-md">
        @include('dashboard.simple_global_stat')
    </div>
    <div class="basis-[60%] bg-white p-3 shadow-sm rounded-md">
        <div class="flex justify-between">
            <h4 class="font-medium">
                Evolution
            </h4>
            <ul class="flex gap-3">
                <li>
                    <a href="">Hebdomadaire</a>
                </li>
                <li>
                    <a href="">Mensuelle</a>
                </li>
                <li>
                    <a href="">Annulle</a>
                </li>
            </ul>
        </div>
       


        <div class="flex-1 bg-black h-px opacity-20 my-2"></div>

        <livewire:global-tasks-chart/>
    </div>
</div>
