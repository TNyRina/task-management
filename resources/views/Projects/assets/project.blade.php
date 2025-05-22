<div class="accordion-item">
    <h2 class="accordion-header" id="heading{{$project->id}}">
        <div class="row accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$project->id}}" aria-expanded="false" aria-controls="collapse{{$project->id}}">
            <div class="col-6 row"> 
                <span class="col-4">{{$project->title}} </span>
                <div class="col-2">
                    @if ($project->status === 0 || $project->status === 1)
                        <span class="col badge bg-{{($project->status === 0) ? 'info' : 'secondary'}}">
                            {{$project->getStatus()}} 
                            : <span class="text-warning"> {{ $project->duration() }}</span>
                            @if($project->status === 1)
                                | accrued time : <span class="text-warning">{{ $project->getAccruedTime() }}</span>
                            @endif
                        </span>
                    @elseif ( $project->status === 2 )
                        <span class="col badge bg-success">
                            {{$project->getStatus()}} 
                        </span>
                    @else 
                        <span class="col badge bg-warning">
                            {{$project->getStatus()}} 
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-3 row">
                @if ($project->status === 3) 
                    @include('Projects.assets.buttonStatus', ['code_status' => 1, 'label' => 'resume'])
                @elseif ($project->status === 2)
                    @include('Projects.assets.buttonStatus', ['code_status' => 1, 'label' => 'update'])
                @else
                    @include('Projects.assets.buttonStatus', ['code_status' => 1, 'label' => ($project->status === 0) ? "stop" : "play"])
                    @include('Projects.assets.buttonStatus', ['code_status' => 2, 'label' => 'done'])
                    @include('Projects.assets.buttonStatus', ['code_status' => 3, 'label' => 'abondone'])
                @endif
                
            </div>
            <div class="col-3 row">
                @if (!$project->isDone() && !$project->isAbondoned())
                @if ($project->deadline())
                    @if ($project->deadline()['expired'])
                        <span class="col badge bg-danger">
                            expired for {{ $project->deadline()['days'] }} days
                        </span>
                    @else
                        <span class="col badge bg-primary">
                            deadline {{ $project->deadline()['days'] }} days
                        </span>
                    @endif
                    
                @else
                    <span class="col badge bg-dark">
                        starting from {{ $project->durationStart() }} days
                    </span>
                @endif
            @endif
            </div>
        </div>
    </h2>
    <div id="collapse{{$project->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$project->id}}" data-bs-parent="#accordionProject">
        <div class="accordion-body">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <div class="row">
                            <div class="col-10">
                                {{ $project->title }}
                            </div>
                            <div class="col-2 row">
                                <div class="col" data-bs-toggle="modal" data-bs-target="#{{ '_update'.$project->id }}">
                                    <i class="bi bi-info-circle"></i>
                                </div>
                                <div class="col" data-bs-toggle="modal" data-bs-target="#{{ 'delete_'.$project->id }}">
                                    <i class="bi bi-trash3-fill" style="color: red"></i>
                                </div>
                            </div>
                        </div>
                    </h5>
                    <p class="card-text">{{$project->description}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="nav-link" data-bs-toggle="modal" data-bs-target="#{{ 'project_' . $project->id }}">
                            <i class="bi bi-patch-plus"></i> New task
                        </span>
                    </li>
                    @forelse ($project->Tasks as $task)
                        @include('Tasks.task', $project)
                    @empty
                        
                    @endforelse
                    </ul>
              </div>
        </div>
    </div>
</div>

@include('Projects.forms.updateForm')
@include('Projects.assets.deleteModal')
@include('Tasks.forms.add')