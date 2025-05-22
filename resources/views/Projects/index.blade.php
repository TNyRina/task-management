@extends('Projects.base')

@section('title', $user->name)
    
@section('content') 
    <div class="container">
        <div>
            @include('shared.flash')
        </div>

        <div class="btn-group m-3" role="group" aria-label="filter">
            <a type="button"  class="btn btn-primary" href="{{ route('project.filter', ['code_status'=>-1]) }}">All</a>
            <a type="button"  class="btn btn-primary" href="{{ route('project.filter', ['code_status'=>0]) }}">In progressing</a>
            <a type="button"  class="btn btn-primary" href="{{ route('project.filter', ['code_status'=>1]) }}">On pause</a>
            <a type="button"  class="btn btn-primary" href="{{ route('project.filter', ['code_status'=>2]) }}">Done</a>
            <a type="button"  class="btn btn-primary" href="{{ route('project.filter', ['code_status'=>3]) }}">Abandoned</a>
        </div>

        <div>
            @php
                $projects = ($projects)??$user->projects
            @endphp
            @forelse ($projects as $project)
                <div class="accordion accordion-flush" id="accordionProject">
                    @include('Projects.assets.project')
                </div>
            @empty
                <div class="alert alert-warning col">
                    Aucun tache disponible pour le moment (ajouter une nouvelle tache <i class="bi bi-arrow-up-left" style="color: red"></i>) !
                </div>
            @endforelse
        </div>

    </div>

    @include('Projects.forms.addForm')
@endsection