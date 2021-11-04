<!DOCTYPE html>
<html>
<head>
	<title>Proforma Invoice</title>
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
<table  width="100%" border="0" cellpadding="5" cellspacing="0"style="margin-top:-50px;">
	<tr >
	<td colspan="2" style="padding-left:10px;">
		<b>
		<center>
		    <!--#FFD700-->
		<div style="color: #FFD700;  ">
			<br/><br/>
		<strong style="font-size: 27px; font-family:Times New Roman,Times,serif; ">AL-AMIN SHOP </strong><br/>
			<b>Mob:(+255) 773 131 313</b><br>
			<b>ZANZIBAR</b><br/>
		</div>
		</center>
		</b>
	</td>
	</tr>
	<tr>
	<td>

	<b style="color:#323639; font-size:13px;">No: <span style="color:red ">{{ str_pad(400+$invoice->invoice_id, 4, '0', STR_PAD_LEFT) }}</span></b><br />      
	<b style="color:#323639; font-size:12px; font-family:Eurostile,sans-serif;">Date : {{ date('d-m-Y', strtotime($invoice->created_at)) }}</b><br />
	</td>

	</tr>
	<tr>
	<td width="17%" style="color:#323639; font-family:Eurostile,sans-serif; font-size: 12px;">
	<div style="border:solid 3px #323639; padding: 10px; border-radius:15px; ">
	<b>VRN No:07001971-U</b>
	<br>
	<b>TIN No:129-691-611</b>
	<br>
	<b>ZRB No:025432517 </b><br/>
	</div>
	</td>
	<td width="60%" style="color:#323639; font-family:Eurostile,sans-serif; font-size: 12px;   padding-left:320px;">
	<b style="font-size: 16px;">To:</b><br />
	<!--#33648D-->
	<b style="text-align:center;";>Name : &nbsp;{{ $invoice->companyName }}</b><br /> 
	<b>Address : &nbsp;{{ $invoice->address }}</b><br />
	<b>P.O.Box :&nbsp;{{ $invoice->pobox }}</b><br />
	<b>City  :&nbsp;{{ $invoice->city }}</b><br />
	</td>
	</tr>
	</table>
    <hr style=" border: 2px solid #323639;"> </hr>
	  <p colspan="2" width="60%" align="center" style="color:#293642; font-size:18px;  font-family:Times New Roman,Times,serif;"><b><u>PROFORMA INVOICE</u></b></p>

	<p colspan="2" width="60%" align="center" style="color:#33648D; font-size:12px;  font-family:Eurostile, sans-serif;"><b><u>{{ $invoice->lot }}</u></b></p>
	<table width="100%" border="2"  cellpadding="4" cellspacing="0" style=" border-radius: 25px; border-color: black; font-family:Times New Roman,Times,serif; font-size=11px;" >
	<tr style="background-color:#FFD700; ">{{-- #FF5252; --}}
	<th align="left" ><center>No:</center></th>
	<th align="left"><center>PARTICULARS</center></th>
	<th align="left"><center>UNIT</center></th>
	<th align="left"><center>QUANTITY</center></th>
	<th align="left"><center>PRICE</center></th>
	<th align="left"><center>VAT</center></th>
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
	<td align="right">{{ $invoice_item->invoice_quantity }}</td>
	<td align="left"><center>{{ number_format($invoice_item->invoice_item_price, 2 , '.' , ',') }}</center></td>
	<?php $vat=$invoice_item->invoice_item_price*0.15 ?>
	<td align="left"><center>{{ number_format($vat, 2 , '.' , ',') }}</center></td>
	<?php $Tvat=$invoice_item->invoice_item_final_amount*0.15 ?>
	<td align="right">{{  number_format(($invoice_item->invoice_item_final_amount)+$Tvat, 2 , '.' , ',') }}</td>
		  
	</tr>
	<?php $total+=($invoice_item->invoice_item_final_amount)+$Tvat; ?>
	@endforeach
	<tr style="background-color:#FFD700;">
	<td align="right" colspan="6">TOTAL(VAT INC)</td>
	<td align="right">{{ number_format($total, 2 , '.' , ',') }}</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
<p style="font-size:13px; float:left; font-family: Eurostile, sans-serif;" ><b>Amount in words: </b><span>{{ucfirst(Terbilang::make(($total), ' shillings'))  }}</span><p><br><br> 

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