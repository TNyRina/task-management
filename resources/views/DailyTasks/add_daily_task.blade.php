@php
    $task = session('task');
    $route = session('task') ? 'daily_task.update' : 'daily_task.store';
    $param = session('task') ? ['daily_task'=>$task] : [];
    $btn_message = session('task') ? 'Modifier' : 'Ajouter'
@endphp

<h4 class="font-medium">
    Ajouter votre tâche d'aujourd'hui
</h4>

<div class="flex-1 bg-black h-px opacity-20 my-2"></div>
<form 
action="{{ route($route, $param)}}" 
method="post" 
class="flex flex-col gap-3">
    @csrf
    @if (session('task'))
        @method('PUT')
    @endif
    <div>
    @include('shared.input', [  
        'type' => 'text',
        'name' => 'title',
        'label' => 'Titre',
        'value' => $task->title??''
        ])
    </div>
    <div>
        @include('shared.input', [
        'type' => 'textarea',
        'name' => 'description',
        'label' => 'Description',
        'value' => $task->description??''
        ])
    </div>
    

    <button class="bg-blue-600 text-white rounded-md py-2">
        {{ $btn_message }}
    </button>
</form>