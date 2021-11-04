@extends('layouts.app')

@section('css')
    <style> #disable-calender { pointer-events: none; } </style>
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">
@endsection
@section('scriptTop')
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
@endsection
@section('content')
                <div class="col-lg-12">
                    <h1 class="page-header"><h2 class="title">Create Letter</h2></h1>
                    <div class="panel">

<div class="panel-body">   
    <div class="content-letter">
    <form action="{{route('insert-letter')}}" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
        <div class="load-animate animated fadeInUp">
             @csrf
            @method('post')
            <div class="row">
                            
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   <div class="form-group">
                        <textarea name="content" id="editor">
            This is some sample content.;
        </textarea>
                   </div>
                </div>
            </div>

            <div class="clearfix"></div> 
                 <div class="form-group">
                            <div class="input-group">
                                <input type="submit" class="form-control" name="submit" value="Save & Print" class="btn btn-success btn-lg">
                            </div>
                        </div>           
        </div>
    </form>        
    </div>                              
                                               
                                            </div>
                                        </div>
                </div>
                
          

@endsection

@section('script')
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
