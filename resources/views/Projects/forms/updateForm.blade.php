<div class="modal fade" id="{{ '_update' . $project->id }}" tabindex="-1" aria-labelledby="{{ '_' . $project->id . 'Label'}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="{{ '_' . $project->id . 'Label'}}">{{ $project->title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('project.update', $project) }}" method="post">
          @csrf
          <div class="modal-body">
                  
                  @include('shared.input', [
                    'type' => 'text',
                    'class' => 'col',
                    'name' => 'title',
                    'label' => 'Titre',
                    'value' => $project->title
                  ])
                  @include('shared.input', [
                    'type' => 'textarea',
                    'class' => 'col',
                    'name' => 'description',
                    'label' => 'Description',
                    'value' => $project->description
                  ])
                
                  <div class="form-group my-3">
                      <label class="form-label">Deadline</label>
                      <input type="date" name="deadline" value="{{ $project->deadline }}">
                  </div>

                  <div class="form-group my-3">
                    <label class="form-label">Start</label>
                    <input type="date" name="start" value="{{ $project->start }}">
                </div>
                  
                  
                  <ul class="list-group mt-2">
                    <li class="list-group-item text-secondary">
                        Date de creation : {{ $project->created_at }}
                    </li>
                    <li class="list-group-item text-secondary">
                        Derniere modification : {{ $project->updated_at }}
                    </li>
                    @if (!empty($project->deadline))
                        <li class="list-group-item text-secondary">
                            Deadline : {{ $project->deadline }}
                        </li>
                    @endif
                    
                </ul>
      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
      
    