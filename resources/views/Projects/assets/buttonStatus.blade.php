<form class="col" action="{{route('project.status', ['project'=>$project, 'code_status' => $code_status])}}" method="post">
    @csrf
    <button type="submit" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$label}}">
        @if ($label === 'play')
            <i class="bi bi-skip-start-circle-fill"></i>
        @elseif ($label === 'stop')
            <i class="bi bi-stop-circle"></i>
        @elseif ($label === 'done')
            <i class="bi bi-check-circle-fill"></i>
        @elseif ($label === 'abondone')
            <i class="bi bi-x-circle"></i>
        @elseif ($label === 'update')
            <i class="bi bi-pencil-square"></i>
        @elseif ($label === 'resume') 
            <i class="bi bi-arrow-clockwise"></i>
        @endif
    </button>
</form>