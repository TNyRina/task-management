<div class="flex flex-col sm:flex-row gap-3">
    <div class="sm:basis-[50%] lg:basis-[70%] bg-white p-3 rounded-md">
        <h4 class="font-medium">Vos tâches d'aujourd'hui</h4>
        <div class="flex-1 bg-black h-px opacity-20 my-2"></div>
        <ul>
            @foreach ($user->tasks as $task)
                <li>{{ $task->title }}</li>
            @endforeach
        </ul>
        
    </div>


    <div  class="sm:basis-[50%] lg:basis-[30%] bg-white p-3 rounded-md">
        <h4 class="font-medium">Ajouter votre tâche d'aujourd'hui</h4>
        <div class="flex-1 bg-black h-px opacity-20 my-2"></div>
        <form action="{{ route('daily_task.store') }}" method="post" class="flex flex-col gap-3">
            @csrf
            <div>
            @include('shared.input', [  
                'type' => 'text',
                'class' => 'col',
                'name' => 'title',
                'label' => 'Title'
                ])
            </div>
            <div>
                @include('shared.input', [
                'type' => 'textarea',
                'class' => 'col',
                'name' => 'description',
                'label' => 'Description'
                ])
            </div>
            
        
            <button class="btn btn-primary">Create</button>
        </form>
    </div>
</div>