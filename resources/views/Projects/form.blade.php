<h4 class="font-medium">
    Ajouter un projet
</h4>

<div class="flex-1 bg-black h-px opacity-20 my-2"></div>

<form 
action="{{ route('project.store') }}" 
method="post"
class="flex flex-col gap-3">
    @csrf
    <div>
        @include('shared.input', [
            'type' => 'text',
            'name' => 'title',
            'label' => 'Titre'
        ])
    </div>
    <div>
        @include('shared.input', [
            'type' => 'textarea',
            'name' => 'description',
            'label' => 'Description'
        ])
    </div>

    <div class="flex flex-col">
        <label for="deadline">
            Deadline
        </label>
        @include('shared.input', [
            'type' => 'date',
            'name' => 'deadline'
        ])
    </div>
    <button class="bg-blue-600 text-white rounded-md py-2">
        Ajouter
    </button>
</form>