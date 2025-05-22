<div class="modal fade" id="{{ 'project_' . $project->id }}" tabindex="-1" aria-labelledby="{{ '_' . $project->id . 'Label'}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="{{ '_' . $project->id . 'Label'}}">New task</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('task.create', $project) }}" method="post">
          @csrf
          <div class="modal-body">  
                  @include('shared.input', [
                    'type' => 'text',
                    'class' => 'col',
                    'name' => 'title',
                    'label' => 'Title'
                  ])
                  @include('shared.input', [
                    'type' => 'textarea',
                    'class' => 'col',
                    'name' => 'description',
                    'label' => 'Description'
                  ])
      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
      
    