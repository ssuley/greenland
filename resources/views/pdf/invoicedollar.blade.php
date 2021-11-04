<!DOCTYPE html>
<html>
<head>
   <title>Invoice PDF</title>

</head>
<body>
<table  width="100%" border="0" cellpadding="5" cellspacing="0"style="margin-top:-50px;">
	<tr >
		<td colspan="2" style="padding-left:10px;"><b>
	<img  style="margin-top: 30px; height:210px; width:210px; float: center; padding-left: 300px;" src="{{ public_path().'/images\logo.png' }} " /></b>
	 <hr style=" border: 1px solid red;"> </hr>
	</td>
	</tr>
	<table width="100%" border="0" cellpadding="5" cellspacing="0" >
	<tr>
	<tr>
	<td colspan="2">
	</table>
	<tr>
	<td width="65%" style="font-size:12px; color:#91b5db; font-family:Eurostile ,sans-serif;">
<b>ADDRESS DETAILS</b>
<br>
<b>HURUMA INVESTMENT IMPORT & EXPORT COMPANY LTD</b>
<br>
<b>AMANI- MAGOGONI</b>
<br>
<b>P O BOX 1568  ZANZIBAR</b>
<br>
<b>TEL: +(255) 24 223 4163</b>
<br>
<b>Mobile: +(255) 777 470 883, + (255) 652 084 994</b>
<br>
<b>E-mail : kimenya@yahoo.com</b>
<br>
<br>
	<b >To:<b><br />
	
	<b style="text-align:center;";>Name : &nbsp;{{ $invoice->companyName }}</b><br /> 
	<b>Address : &nbsp;{{ $invoice->address }}</b><br />
	</td>
	<td  style=" padding-top:-110px;  padding-left:70px;">  
	<b style="color:#e61212; font-size:12px;">Invoice No:{{date('ymd').'-'.str_pad($invoice->invoice_id, 4, '0', STR_PAD_LEFT)}}</b><br />      
	<b style="font-size:12px; color:#91b5db; font-family:Eurostile,sans-serif;">Invoice Date : {{ date_format($invoice->created_at,"d-m-Y")}}</b><br />
	</td>
	</tr>
	</table>
	  <p colspan="2" width="60%" style="font-size:16px font-family=Eurostile,sans-serif;" align="center"> <b><u>INVOICE</u></b></p>

	<p colspan="2" width="60%" style="font-size:12px; font-family:Eurostile,sans-serif;"  align="right"> <b>Rate: ${{$rate->rate}}</b></p>

	<table width="100%" border="2" cellpadding="4" cellspacing="0" style="font-family:Eurostile ,sans-serif; font-size:12px; " >
	<tr style="background-color:#91b5db;  color:#FFFFFF; ">
	<th align="left" >Sr No.</th>
	<th align="left">DETAILS</th>
	<th align="left">UNIT PRICE</th>
	<th align="left">QUANTITY</th>
	<th align="left">TOTAL(TZS)</th>
	<th align="left">TOTAL(USD)</th> 
	</tr>

  <?php $count = 1; 
  	$grandTotal=0;
  	$grandTotalDoller=0;
  ?> 
 @foreach($invoice_items as $invoice_Item)
	@if($invoice_Item->currency_type=="tsh")
	<tr>
	<td align="left">{{ $count++ }}</td>
	<td align="left">{{ $invoice_Item->item_name }}</td>
	<td align="left">{{  number_format($invoice_Item->order_item_price , 2 , '.' , ',' ) }}</td>
	<td align="left">{{ $invoice_Item->order_item_quantity }}</td>
	<td align="left">{{ number_format($invoice_Item->order_item_final_amount , 2 , '.' , ',' )}}</td>
	<td align="left">{{ number_format($invoice_Item->order_item_final_amount/$rate->rate , 2 , '.' , ',' )}}</td> 

	</tr>
	<?php $grandTotal+=$invoice_Item->order_item_final_amount;?>
	@else
	<tr>
	<td align="left">{{ $count++ }}</td>
	<td align="left">{{ $invoice_Item->item_name }}</td>
	<td align="left">{{  number_format($invoice_Item->order_item_price , 2 , '.' , ',' ) }}</td>
	<td align="left">{{ $invoice_Item->order_item_quantity }}</td>
	<td align="left"></td>
	<td align="left">{{ number_format($invoice_Item->order_item_final_amount , 2 , '.' , ',' )}}</td>  
	</tr>
	<?php $grandTotalDoller+=$invoice_Item->order_item_final_amount;?>
	@endif
	@endforeach
	<tr>
	<td align="right" colspan="5"><b>GRAND TOTAL </b></td>
	<td align="left">{{  number_format(($grandTotal+$grandTotalDoller) , 2 , '.' , ',' )}}</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
{{-- <p style="font-size:12px; float:left; font-family: Eurostile, sans-serif;" ><b>Amount in words: </b><span>{{Terbilang::make(($invoice->subTotal)/$rate->rate, ' dollars')  }}</span><p><br> --}}
	<hr>
<section>
	<div style="float: left; font-size:13px;">
		<h2 style="color: #91b5db;"><strong><u>Payment Details</u></strong></h2>
		<p><strong>NOTES:</strong> BANK DETAILS:</p>
		<p><strong>BANK NAME:</strong> PEOPLES BANK OF ZANZIBAR</p>
		<p><strong>BRANCH NAME:</strong> MWANAKWEREKWE BRANCH</p>
		<p><strong>ACCOUNT NAME:</strong> HURUMA INV/ IMP/EXP CO LTD</p>
		<p><strong>ACCOUNT NUMBER:</strong>0766815002</p>
		<p><strong>BENEFICIARY:</strong> HURUMA INVESTMENT IMPORT&EXPORT COMPANY LTD</p>
		<p><strong>SWIFT CODE:</strong>PBZATZTZ</p>
	</div>
	
	<!-- <p style="float:right; padding-right:90px; font-family:Eurostile,sans-serif;"><b>Signature:</b></p> -->
</section>


    <script type="text/php">
          if (isset($pdf)) {
        $x = 285;
        $y = 810;
        $text = "{PAGE_NUM}";
        $font = null;
        $size = 12;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
    </script>
</body>
</html>