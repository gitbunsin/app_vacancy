@if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    <button type="button" class="close" data-dismiss="alert">&times;</button>

    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {!! session('error') !!}
    </div>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
@endif