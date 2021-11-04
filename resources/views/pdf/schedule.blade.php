<!DOCTYPE html>
<html>
<head>
   <title>greenLand invoice</title>

</head>
<body>


	  <p colspan="2" width="60%" style="font-size:23px; font-family:Eurostile,sans-serif;"  align="center" ><b><u>SCHEDULE OF PRICE</u></b></p>
	  <p colspan="2" width="60%" style="font-size:18px; font-family:Eurostile,sans-serif;"  align="center" ><b><u>{{$invoice->lot}}</u></b></p>
	
	<table width="100%" border="2" cellpadding="4" cellspacing="0" style="font-family:Eurostile,sans-serif; " >
	<tr style="background-color:#4169E1;  color:#FFFFFF; ">
	<th align="left" >Sr No.</th>
	<th align="left">ITERM NAME</th>
	<th align="left">UNIT</th>
	<th align="left">QUANTITY</th>
	<th align="left">UNIT PRICE</th>
	<th align="left">TOTAL</th> 
	</tr>


	<?php $count=1; 
		$total=0;
		$total=0;
	?>
	@foreach($invoice_items as $invoice_item)
	<tr>
	<td align="left">{{ $count++ }}</td>
	<td align="left">{{ $invoice_item->item_name }}</td>
	<td align="left"><center>{{ $invoice_item->unit }}</center></td>
	<td align="left"><center>{{ $invoice_item->invoice_quantity }}</center></td>
	<td align="left"><center>{{ number_format($invoice_item->invoice_item_price, 2 , '.' , ',') }}</center></td>
	<td align="left"><center>{{  number_format(($invoice_item->invoice_item_final_amount), 2 , '.' , ',') }}</center></td>
		  
	</tr>
	<?php $total+=($invoice_item->invoice_item_final_amount); ?>
	@endforeach
	<tr>
	<td align="right" colspan="5"><b>GRAND TOTAL </b></td>
	<td align="center">{{  number_format(($total), 2 , '.' , ',') }}</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
<p style="float:left; font-family:Eurostile,sans-serif; "><b>Amount in words: <span>{{ucfirst(Terbilang::make(($total), ' shilling Only')) }}</span></b><p><br> 
<p style="float:right; padding-right:90px; font-family:Eurostile,sans-serif;"><b>Signature:</b></p>


</body>
</html>