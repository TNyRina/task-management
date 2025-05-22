<li class="list-group-item">
    <div class="row">
        <span class="col-1">
            @if ($task->completed)
                <i class="bi bi-check2-circle"></i>
            @else
            @endif
        </span>
        <span class="col-8 {{($task->completed) ? 'text-muted' : ''}}">{{ $task->title }}</span>
        <div class="col-2 row">
            <div class="col" data-bs-toggle="modal" data-bs-target="#{{ 'update_'.$task->id }}">
                <i class="bi bi-info-circle"></i>
            </div>
            <div class="col" data-bs-toggle="modal" data-bs-target="#{{ 'delete_'.$task->id }}">
                <i class="bi bi-trash3-fill" style="color: red"></i>
            </div>
        </div>
    </div>
</li>

@include('Tasks.assets.deleteModal')
@include('Tasks.forms.update')