<form 
action="{{ route('daily_task.store') }}" 
method="post" 
class="flex flex-col gap-3">
    @csrf
    <div>
    @include('shared.input', [  
        'type' => 'text',
        'class' => 'col',
        'name' => 'title',
        'label' => 'Titre'
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
    

    <button class="bg-blue-600 text-white rounded-md py-2">
        Ajouter
    </button>
</form>