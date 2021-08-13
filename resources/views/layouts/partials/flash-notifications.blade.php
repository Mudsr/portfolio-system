@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $message }}

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    There is a problem with form sumission. Please check the errors below
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
