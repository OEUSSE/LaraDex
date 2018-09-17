@if (session('status'))
    <div class="alert alert-success notification">
        {{ session('status') }}
    </div>
@endif