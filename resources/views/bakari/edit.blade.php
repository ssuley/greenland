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
    <form action="{{route('update-bakari-invoice',$invoices[0]->invoice_id)}}" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
        <div class="load-animate animated fadeInUp">
              @csrf
            @method('PATCH')
            <input id="currency" type="hidden" value="$" required>
            <div class="row">
                               <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-left">
                   <div class="form-group">
                        <textarea class="form-control @error('transport') is-invalid @enderror" rows="2" name="transport" id="transport"value="{{ old('transport') }}" placeholder="transport cost" required>{{ $invoices[0]->transport }}</textarea>
                        @error('transport')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                
                <div class="form-group">
                        <textarea class="form-control @error('insurence') is-invalid @enderror" rows="2" name="insurence" id="insurence" value="{{ old('insurence') }}" placeholder="insurence cost" required>{{ $invoices[0]->insurence }}</textarea>
                        @error('insurence')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                </div>             
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                    <h3>To,</h3>
                    <div class="form-group">
                        <input type="text" class="form-control @error('companyName') is-invalid @enderror" name="companyName" id="companyName" value="{{ $invoices[0]->companyName }}" placeholder="Company Name" autocomplete="off" required>
                         @error('companyName')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control @error('address') is-invalid @enderror" rows="2" name="address" id="address" value="" placeholder="Address" required>{{$invoices[0]->address }}</textarea>
                        @error('address')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <input type="text" class="form-control @error('pobox') is-invalid @enderror" name="pobox" id="pobox" value="{{$invoices[0]->pobox }}" placeholder="P. O. BOX" autocomplete="off" required>
                         @error('pobox')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control @error('city') is-invalid @enderror" rows="2" name="city" id="city" value="" placeholder="City" required>{{$invoices[0]->city }}</textarea>
                        @error('city')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control @error('lot') is-invalid @enderror" rows="2" name="lot" id="lot" value="" placeholder="Lot" required>{{ $invoices[0]->lot }}</textarea>
                        @error('lot')
                         <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered table-hover" id="invoiceItem">   
                        <tr>
                            <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox" required></th>
                           <!--  <th width="15%">Item No</th> -->
                            <th width="38%">Item Name</th>
                            <th width="15%">Unit</th>
                            <th width="15%">Quantity</th>
                            <th width="15%">Price</th>                              
                            <th width="15%">Total</th>
                        </tr>  
                        <?php $count=0; ?>
                        @if($status)
                         @foreach($invoices as $invoice)  
                         <?php ++$count; ?>
                        <tr>
                            <td><input class="itemRow" type="checkbox" required></td>
                            <input type="hidden"  name="productCode[]" id="productCode_{{ $count }}" class="form-control @error('productCode[]') is-invalid @enderror" autocomplete="off" required>
                            @error('productCode[]')
                         <span class="invalid-feedback col-sm-4" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            <td><input type="text" value="{{ $invoice->item_name }}" name="productName[]" id="productName_{{ $count }}" class="form-control @error('productName') is-invalid @enderror" autocomplete="off" required>
                                @error('productName')
                             <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </td>
                            <td><input type="text" value="{{ $invoice->unit }}" name="unit[]" id="unit_{{ $count }}" class="form-control  @error('unit[]') is-invalid @enderror" autocomplete="off" required>
                            @error('unit[]')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </td>
                            <td><input type="number" value="{{ $invoice->invoice_quantity  }}" name="quantity[]" id="quantity_{{ $count }}" class="form-control quantity @error('quantity[]') is-invalid @enderror" autocomplete="off" required>@error('quantity[]')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                            <td><input type="number" value="{{ $invoice->invoice_item_price }}" name="price[]" id="price_{{ $count }}" class="form-control price @error('price[]') is-invalid @enderror" autocomplete="off">@error('price[]')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                            <td><input type="number" value="{{ $invoice->invoice_item_final_amount }}" name="total[]" id="total_{{ $count }}" class="form-control total @error('total[]') is-invalid @enderror" autocomplete="off" required>@error('total[]')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                        </tr>  
                        @endforeach  
                        @else
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
                        @endif
                                           
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
                    <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
                </div>
            </div>
{{-- <br>
<section ><strong><h4>For Dollar</h4></strong></section>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered table-hover" id="invoiceItem2">   
                        <tr>
                            <th width="2%"><input id="checkAll2" class="formcontrol2" type="checkbox" required></th>
                           <!--  <th width="15%">Item No</th> -->
                            <th width="38%">Item Name</th>
                            <th width="15%">Unit</th>
                            <th width="15%">Quantity</th>
                            <th width="15%">Price</th>                              
                            <th width="15%">Total</th>
                        </tr>                           
                        <tr>
                            <td><input class="itemRow2" type="checkbox" required></td>
                            <input type="hidden" name="productCode2[]" id="productCode_12" class="form-control @error('productCode2[]') is-invalid @enderror" autocomplete="off" required>
                            @error('productCode2[]')
                         <span class="invalid-feedback col-sm-4" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            <td><input type="text" name="productName2[]" id="productName2_1" class="form-control @error('productName2') is-invalid @enderror" autocomplete="off" required>
                                @error('productName2')
                             <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </td>
                           <td><input type="text" name="unit2[]" id="unit2_1" class="form-control  @error('unit2[]') is-invalid @enderror" autocomplete="off" required>
                            @error('unit2[]')
                            <span class="invalid-feedback " role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </td>
                            <td><input type="number" name="quantity2[]" id="quantity2_1" class="form-control quantity2 @error('quantity2[]') is-invalid @enderror" autocomplete="off" required>@error('quantity2[]')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                            <td><input type="number" name="price2[]" id="price2_1" class="form-control price2 @error('price2[]') is-invalid @enderror" autocomplete="off">@error('price2[]')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                            <td><input type="number" name="total2[]" id="total2_1" class="form-control total2 @error('total2[]') is-invalid @enderror" autocomplete="off" required>@error('total2[]')
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
                    <button class="btn btn-danger delete2" id="removeRows2" type="button">- Delete</button>
                    <button class="btn btn-success" id="addRows2" type="button">+ Add More</button>
                </div>
            </div> --}}

           <!-- <div class="row">   
                
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                    <span class="form-inline">
                         <div class="form-group">
                                <label><b>Grand Total: &nbsp;</b></label>
                                <div class="input-group">
                                    <div class="input-group-addon currency">Tsh</div>

                                    <input value="<?php //echo number_format($invoiceValues['order_total_before_tax'], 2 , '.' , ',') ?>" type="number" class="form-control @error('subTotal') is-invalid @enderror" name="subTotal" id="subTotal" placeholder="Grand Total">
                                   
                                </div>
                                 @error('subTotal')
                            <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input value="" type="hidden" class="form-control @error('taxRate') is-invalid @enderror" name="taxRate" id="taxRate" placeholder="Tax Rate" required>
                                @error('taxRate')
                            <span class="invalid-feedback " role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input value="" type="hidden" class="form-control @error('taxAmount') is-invalid @enderror" name="taxAmount" id="taxAmount" placeholder="Tax Amount" required>
                                @error('taxAmount')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>                          
                        <div class="form-group">
                            <div class="input-group">
                                <input value="" type="hidden" class="form-control @error('totalAftertax') is-invalid @enderror" name="totalAftertax" id="totalAftertax" placeholder="Total" required>
                                @error('totalAftertax')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input value="" type="hidden" class="form-control @error('amountPaid') is-invalid @enderror" name="amountPaid" id="amountPaid" placeholder="Amount Paid" required>
                                @error('amountPaid')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input value="" type="hidden" class="form-control @error('amountDue') is-invalid @enderror" name="amountDue" id="amountDue" placeholder="Amount Due" required>
                                @error('amountDue')
                            <span class="invalid-feedback col-sm-4" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                    </span>
                </div>
            </div>-->
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


