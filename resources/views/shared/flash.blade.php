<div class="toast-container position-fixed top-0 end-0 p-3">
    @if (session('success'))
        <div class="toast show text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Success</strong>       
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <div class="toast  show text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Error</strong>         
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ $err }}
                </div>
            </div>
        @endforeach 
    @endif
</div>



