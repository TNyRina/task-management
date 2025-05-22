<div class="modal fade" id="{{ 'update_' . $task->id }}" tabindex="-1" aria-labelledby="{{ '_' . $task->id . 'Label'}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="{{ '_' . $task->id . 'Label'}}">New task</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('task.update', $task) }}" method="post">
          @csrf
          @method('PATCH')
          <div class="modal-body">  
                  @include('shared.input', [
                    'type' => 'text',
                    'class' => 'col',
                    'name' => 'title',
                    'label' => 'Title',
                    'value' => $task->title
                  ])
                  @include('shared.input', [
                    'type' => 'textarea',
                    'class' => 'col',
                    'name' => 'description',
                    'label' => 'Description',
                    'value' => $task->description
                  ])
                  @include('shared.checkbox', [
                    'class' => 'col',
                    'label' => 'Completed',
                    'name' => 'completed',
                    'value' => $task->completed
                  ])
      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
      
    