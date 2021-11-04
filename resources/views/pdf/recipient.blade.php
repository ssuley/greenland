<!DOCTYPE html>
<html>
<head>
   <title>greenLand invoice</title>

</head>
<body>

<table  width="100%" border="0" cellpadding="5" cellspacing="0"style="margin-top:-50px;">
	<tr >
	<td colspan="2" ><b><img style="height:150px; width:700px; " src="../images/greenland.jpg" /></b>
	 <hr style=" border: 1px solid red;"> </hr>
	</td>
	</tr>
	<table width="100%" border="0" cellpadding="5" cellspacing="0" >
	<tr>
	<tr>
	<td colspan="2">
	</table>
	<tr>
	<td width="65%" style="color:#008000; Eurostile ,sans-serif; font-size: 13px;">
	<b>TIN No:138-219-305</b>
	<br>
	<b>ZRB No: 025563637 </b><br/>
	<br>
	<b >To:<b><br />
	
	<b style="text-align:center;";>Company Name : &nbsp;{{ $invoice->companyName }}</b><br /> 
	<b>Address : &nbsp;{{ $invoice->address }}</b><br />
	<b>P.O.Box :&nbsp;{{ $invoice->pobox }}</b><br />
	<b>City  :&nbsp;{{ $invoice->city }}</b><br />
	</td>
	<td  style=" padding-top:-110px;  padding-left:100px;">  
		<b style="color:#33648D; font-size:13px;">No: <span style="color:red ">{{ str_pad($invoice->invoice_id, 4, '0', STR_PAD_LEFT) }}</span></b><br />      
	<b style="color:#008000; font-size: 12px; Eurostile ,sans-serif;">Invoice Date : {{ date('d-m-Y') }}</b><br />
	</td>
	</tr>
	</table>
	  <p colspan="2" width="60%" style="font-size:23px; font-family:Eurostile,sans-serif;"  align="center" ><b><u>TAX INVOICE</u></b></p>
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
<p style="float:left; font-family:Eurostile,sans-serif; "><b>Amount in words: <span>{{ucfirst(Terbilang::make(($total), ' shillings'))  }}</span></b><p><br> 
<p style="float:right; padding-right:90px; font-family:Eurostile,sans-serif;"><b>Signature:</b></p>


</body>
</html>