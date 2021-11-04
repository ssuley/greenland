<!DOCTYPE html>
<html>
<head>
	<title>Meridian Tax Invoice</title>
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
</style>

</head>
<body>
	<div class="card"  >
<table  width="100%" border="0" cellpadding="4" cellspacing="0"style="margin-top:-125px;">
	<tr>
	<td colspan="2" style="padding-left:10px;">
		<!--<b>
		
		<div style="color: #60332D;">
			<br/><br/>
			<b style="background-color:#E99067; font-size: 20px; font-family:Eurostile,sans-serif; ">Company Name </b><br/>
			<b style="font-size: 20px; font-family:Eurostile,sans-serif; ">MERRIDIAN CHEF'S & CATERING SUPPLY</b><br/>
			<b>Tel:(+255) 747 238 019</b><br>
			<b>Tel2:(+255) 734 481 875</b><br>
			<b>ZANZIBAR</b><br/>
		</div>
		</b>-->
		<b>
		
		<div style="color: #60332D;">
			    <img style=" height:120px; width: 450px; float:left;" src="../images/meridian.png" />
			   
			
		</div>
		</b>
	</td>
	<td width="25%">
		<br>
		<p width="60%"  style="color:#60332D; font-size:12px;  font-family:Eurostile, sans-serif;"><b><u>TAX INVOICE</u></b></p>
		<div >
			<table  width="100%" border="1"  cellpadding="7" cellspacing="0" style="padding-right: -30px; border:solid 2px #60332D;   font-family:Eurostile,sans-serif; " >
		<tr>
			<td>
				<b style="color:#E99067; font-size:12px;">No:</b> 
			</td>
			<td>
				<span style="color:red ">{{ str_pad(400+$invoice->invoice_id, 4, '0', STR_PAD_LEFT) }}</span> 
			</td>
		</tr>
		<tr>
			<td>
				<b style="color:#E99067; font-size:12px; font-family:Eurostile,sans-serif;">Date :</b>
			</td>
			<td>
				<span style="color:#60332D">{{ date('d-m-Y') }}</span>
			</td>
		</tr>
		     
	 
	</table>
	</div>
	</td>
	</tr>

	{{-- <tr >	
	<td>
	
	</tr> --}}

	<tr>
	<td width="25%" style="color:#60332D; font-family:Eurostile,sans-serif; font-size: 12px;">
	<div style="border:outset 4px #E99067; padding: 10px; margin-top: -25px; ">
	<b>TIN No:129-691-611</b>
	<br>
	<b>ZRB No:025432517 </b><br/>
	</div>
	</td>

	<td colspan="2"  style="color:#60332D; font-family:Eurostile,sans-serif; font-size: 12px; padding-left:355px;">
	<b style="background-color:#E99067; font-size: 20px; font-family:Eurostile,sans-serif; ">BILL To:</b><br />
	<b style="text-align:center;";><strong>NAME :</strong> &nbsp;{{ $invoice->companyName }}</b><br /> 
	<b><strong>ADDRESS :</strong> &nbsp;{{ $invoice->address }}</b><br />
	<b><strong>P.O.BOX :</strong>&nbsp;{{ $invoice->pobox }}</b><br />
	<b><strong>CITY  :</strong>&nbsp;{{ $invoice->city }}</b><br />
	</td>
	</tr>
	</table>

	  
	<p colspan="2" width="60%" align="center" style="color:#60332D;s font-size:12px;  font-family:Eurostile, sans-serif;"><b><u>{{ $invoice->lot }}</u></b></p>
	
	<table width="100%" border="2"  cellpadding="4" cellspacing="0" style="border-color: #60332D; font-family:Eurostile,sans-serif; color: #60332D;" >
	<tr style="background-color:#E99067;   ">{{-- #FF5252; --}}
	<th align="left" ><center>No</center></th>
	<th align="left"><center>PARTICULARS</center></th>
	<th align="left"><center>UNIT</center></th>
	<th align="left"><center>QUANTITY</center></th>
	<th align="left"><center>PRICE</center></th>
<!--	<th align="left"><center>VAT</center></th>-->
	<th align="left"><center>TOTAL</center></th> 
	</tr>
	<?php $count=1; 
		$total=0;
	?>
	@foreach($invoice_items as $invoice_item)
	<tr>
	<td align="left">{{ $count++ }}</td>
	<td align="left">{{ $invoice_item->item_name }}</td>
	<td align="left"><center>{{ $invoice_item->unit }}</center></td>
	<td align="left"><center>{{ $invoice_item->invoice_quantity }}</center></td>
	<td align="left"><center>{{ number_format($invoice_item->invoice_item_price, 2 , '.' , ',') }}</center></td>
	<?php $vat=$invoice_item->invoice_item_price*0.15 ?>
	<!--<td align="left"><center>{{ number_format($vat, 2 , '.' , ',') }}</center></td>-->
	<?php $Tvat=$invoice_item->invoice_item_final_amount*0.15 ?>
	<td align="center">{{  number_format(($invoice_item->invoice_item_final_amount), 2 , '.' , ',') }}</td>
		  
	</tr>
	<?php $total+=($invoice_item->invoice_item_final_amount); ?>
	@endforeach
	<tr>
	<td align="right" colspan="5">TOTAL</td>
	<td align="center">{{ number_format($total, 2 , '.' , ',') }}</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
<div style="font-size:13px; float:left; font-family: Eurostile, sans-serif; background-color:#E99067; border-radius:solid #E99067 4px;" ><b>Amount in words: </b></div>
<br>
<div style="font-size:13px; float:left; font-family: Eurostile,">{{ucfirst(Terbilang::make(($total), ' shillings'))  }}</div>
<br><br>
<p style="font-size:16px; font-family:Eurostile, sans-serif;"><b>Signature:</b></p>
</div>
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
       <!-- jQuery -->
    {{-- <script src="{{asset('../vendor/jquery/jquery.min.js')}}"></script> --}}
 <script type="text/javascript">
    Array.from(document.querySelectorAll('.card')).forEach(function(el)
    {
    el.dataset.watermark=(el.dataset.watermark + ' ').repeat(3000);

	});

 </script>
</body>
</html>