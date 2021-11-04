@extends('layouts.app')

@section('css')
    <style> #disable-calender { pointer-events: none; } </style>
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">
@endsection
@section('scriptTop')
<script src="{{asset('js/tinymce.min.js') }}"></script>
{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
  <script>tinymce.init({selector:'textarea'});</script>
@endsection
@section('content')
                <div class="col-lg-12">
                    <h1 class="page-header"><h2 class="title">Create Letter</h2></h1>
                    <div class="panel">

<div class="panel-body">   
    <div class="content-letter">
    <form action="{{route('insert-rate')}}" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
        <div class="load-animate animated fadeInUp">
             @csrf
            @method('post')
            <div class="row">
                            
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   <div class="form-group">
                        <input type="text" name="rate" class="form-control @error('rate') is-invalid @enderror"> 
                         @error('rate')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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


