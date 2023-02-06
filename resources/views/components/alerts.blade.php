@if (Session::has('success'))
<div class="alert alert-success alert-dismissible show fade" role="alert">
    {{(Session::get('success'))}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-success alert-dismissible show fade" role="alert">
    {{(Session::get('error'))}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-success alert-dismissible show fade" role="alert">
    <ul>
        @foreach ($errors->all() as $message )
            <li>{{$message}}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif