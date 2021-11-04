@if (session()->has('message') )
    <div class="row ">
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> {{session()->get('message')}}
        </div>
    </div>
@endif