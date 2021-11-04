<!DOCTYPE html>
<html>
<head>
	<title>MASUO Proforma Invoice</title>
	
	 <!-- Custom CSS -->
<style type="text/css">
	.card::before
	{
		/*width:150%;
		height:150%;
		display: block;
*/
		/*position: absolute;
		top: -75%;
		left: -75%;*/

		transform: rotate(-45deg);
		-webkit-transform: rotate(-45deg);
		-moz-transform: rotate(-45deg);
		content: attr(data-watermark);

		font-size: 18px;
		opacity: 0.1;
		line-height: 1em;
		letter-spacing: 2px;
		/*color: #000;*/
}
body{
	color: #6590C0;
}
</style>

</head>
<body>
	<div class="card"  >
<table  width="100%" border="0" cellpadding="4" cellspacing="0" style="margin-top: -65px;">
	<tr>
	<td colspan="4">
		<b>
		
		<div >
			<h2><center>MASUO GENERAL SUPPLY</center></h2>
			    <h6 style="margin-top:-20px;"><center>TEL:+255 773 961 282</center></h6>
			     <h6 style="margin-top:-20px;"><center>MAGOGONI-ZANZIBAR</center></h6>
		</div>
		</b>
	</td>
	</tr>
	<tr>
	<td colspan="4">
		
		<p   style=" font-size:12px; font-family:Eurostile, sans-serif;"><center><b><u>PROFORMA INVOICE</u></b></center></p>
		<div style="float:left; border:outset 2px #6590C0; 	border-radius: 10px;  font-family:Eurostile,sans-serif; font-size: 12px; margin: 20px;">
            	<b>TIN No:152-005-870</b>
            	<br>
            	<b>ZRB No:02688344</b><br/>
        	</div>
		<div style="float: right;">
			
				<b style=" font-size:12px;">No:</b> 
			
				<span style="color: black;">{{ str_pad(800+$invoice->invoice_id, 4, '0', STR_PAD_LEFT) }}</span> 
				<br>
				<b style=" font-size:12px; font-family:Eurostile,sans-serif;">Date :</b>
			
				<span style="font-size:10px; font-family:Eurostile,sans-serif;">{{ date('d-m-Y', strtotime($invoice->created_at)) }}</span>

		
	</div>
	</td>
	</tr>

	<tr >	
	<td>
	</td>
	</tr>
	<tr >	
	<td>
	</td>
	</tr>
	<tr >	
	<td>
	</td>
	</tr>
	<tr >	
	<td>
	</td>
	</tr>

	<tr>
		
	<td colspan="4"  style=" font-family:Eurostile,sans-serif; font-size: 12px; float: left; ">
	<div style="border:solid 2px #6590C0; 	border-radius: 10px;">
	<b style=" font-size: 17px; font-family:Eurostile,sans-serif; ">M/S:</b>
	<u ><b style="border-bottom: dotted;">&nbsp;{{ $invoice->companyName }}</b></u><br /> 
	{{-- <b><strong>ADDRESS :</strong> &nbsp;{{ $invoice->address }}</b><br />
	<b><strong>P.O.BOX :</strong>&nbsp;{{ $invoice->pobox }}</b><br />
	<b><strong>CITY  :</strong>&nbsp;{{ $invoice->city }}</b><br /> --}}
	</div>
	</td>
	</tr>
	</table>

	  
	{{-- <p colspan="2" width="60%" align="center" style="color:#60332D;s font-size:12px;  font-family:Eurostile, sans-serif;"><b><u>{{ $invoice->lot }}</u></b></p> --}}
	
		<table width="100%" border="1"  cellpadding="4" cellspacing="0" style="border-collapse: separate;margin-bottom: 2em;border-spacing: 0pt; font-family:Eurostile,sans-serif; font-size: 12px; font-weight: 10px; border-radius: 10px; border: 2px outset #6590C0;" >
	<tr>{{-- #FF5252; --}}
	<th align="left" ><center>QTY</center></th>
	<th align="left"><center>PARTICULARS</center></th>
	<th align="left"><center>@</center></th>
<!--	<th align="left"><center>VAT</center></th>-->
	<th align="left"><center>TOTAL</center></th> 
	</tr>
	<?php $count=1; 
		$total=0;
	?>
	@foreach($invoice_items as $invoice_item)
	<tr>
	<td align="left"><center>{{ $invoice_item->invoice_quantity }}</center></td>
	<td align="left">{{ $invoice_item->item_name }}</td>
	<td align="left"><center>{{ number_format($invoice_item->invoice_item_price, 2 , '.' , ',') }}</center></td>
	<?php $vat=$invoice_item->invoice_item_price*0.15 ?>
	<!--<td align="left"><center>{{ number_format($vat, 2 , '.' , ',') }}</center></td>-->
	<?php $Tvat=$invoice_item->invoice_item_final_amount*0.15 ?>
	<td align="center">{{  number_format(($invoice_item->invoice_item_final_amount), 2 , '.' , ',') }}</td>
		  
	</tr>
	<?php $total+=($invoice_item->invoice_item_final_amount); ?>
	@endforeach
	<tr>
	<td align="center">EO&E</td>
	<td align="right" colspan="2">TOTAL</td>
	<td align="center">{{ number_format($total, 2 , '.' , ',') }}</td>
	</tr>
	</table>
	</td>
</tr>
</table>
	<br>
<div style="font-size:12px;font-weight:10px;  float:left; font-family: Eurostile, sans-serif;" >
	<b>Amount in words:<span style="border-bottom: dotted;">{{ucfirst(Terbilang::make(($total), ' shillings only'))  }}</span> </b></div>
<br>
<div>
<p style="font-size:12px; font-family:Eurostile, sans-serif;"><span><b>Full Name:...........................................................................................................................</b>&nbsp;&nbsp;</span><b>Signature:........................................</b></p>
</div>
</section>


    
</body>
</html>