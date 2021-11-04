@extends('layouts.app')

@section('css')
    <style> #disable-calender { pointer-events: none; } </style>
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
                <div class="col-lg-12">
                    <h1 class="page-header"><h2 class="title">Create Invoice</h2></h1>
                    <div class="panel">

<div class="panel-body">   
    <div class="content-invoice">
    <form action="{{route('insert-greenland-invoice')}}" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
        <div class="load-animate animated fadeInUp">
             @csrf
            @method('post')
            <input id="currency" type="hidden" value="$" required>
            <div class="row">
                            
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                    <h3>To,</h3>
                    <div class="form-group">
                        <input type="text" class="form-control @error('companyName') is-invalid @enderror" name="companyName" id="companyName" value="{{ old('companyName') }}" placeholder="Company Name" autocomplete="off" required>
                         @error('companyName')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control @error('address') is-invalid @enderror" rows="2" name="address" id="address"value="{{ old('address') }}" placeholder="Address" required></textarea>
                        @error('address')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <input type="text" class="form-control @error('pobox') is-invalid @enderror" name="pobox" id="pobox" value="{{ old('pobox') }}" placeholder="P. O. BOX" autocomplete="off" required>
                         @error('pobox')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control @error('city') is-invalid @enderror" rows="2" name="city" id="city"value="{{ old('city') }}" placeholder="City" required></textarea>
                        @error('city')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control @error('lot') is-invalid @enderror" rows="2" name="lot" id="lot"value="{{ old('lot') }}" placeholder="Lot" required></textarea>
                        @error('lot')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <section ><strong><h4>For Tsh</h4></strong></section>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered table-hover" id="invoiceItem">   
                        <tr>
                            <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox" required></th>
                           <!--  <th width="15%">Item No</th> -->
                            <th width="38%">Item Name</th>
                            <th width="15%">unit</th>
                            <th width="15%">Quantity</th>
                            <th width="15%">Price</th>                              
                            <th width="15%">Total</th>
                        </tr>                           
                        <tr>
                            <td><input class="itemRow" type="checkbox" required></td>
                            <input type="hidden" name="productCode[]" id="productCode_1" class="form-control @error('productCode[]') is-invalid @enderror" autocomplete="off" required>
                            @error('productCode[]')
                         <span class="invalid-feedback col-sm-4" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            <td><input type="text" name="productName[]" id="productName_1" class="form-control @error('productName') is-invalid @enderror" autocomplete="off" required>
                                @error('productName')
                             <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </td>
                            <td><input type="text" name="unit[]" id="unit_1" class="form-control  @error('unit[]') is-invalid @enderror" autocomplete="off" required>
                            @error('unit[]')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </td>
                            <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity @error('quantity[]') is-invalid @enderror" autocomplete="off" required>@error('quantity[]')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                            <td><input type="number" name="price[]" id="price_1" class="form-control price @error('price[]') is-invalid @enderror" autocomplete="off">@error('price[]')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                            <td><input type="number" name="total[]" id="total_1" class="form-control total @error('total[]') is-invalid @enderror" autocomplete="off" required>@error('total[]')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                        </tr>                       
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
                    <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
                </div>
            </div>


         
            <br>
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


