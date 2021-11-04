<!DOCTYPE html>
<html>
<head>
	<title>Schedule Invoice</title>
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
	  <p colspan="2" width="60%" align="center" style="color:#293642; font-size:16px;  font-family:Copperplate, sans-serif;"><b>SCHEDULE OF REQUIREMENT AND PRICE</b></p>
	    <p colspan="2" width="60%" align="left" style="color:#293642; font-size:16px;  font-family:Copperplate, sans-serif;"><b>{{ $invoice->lot }}</b></p>

<!--	<p colspan="2" width="60%" align="center" style="color:#33648D; font-size:12px;  font-family:Eurostile, sans-serif;"><b></b></p>-->
	
	<table width="100%" border="2"  cellpadding="4" cellspacing="0" style=" border-radius: 25px; border-color: black; margin-top:-25px; font-family:Eurostile,sans-serif; " >
	    <table width="100%" border="2"  cellpadding="4" cellspacing="0" style=" border-radius: 25px; border-color: black; font-family:Eurostile,sans-serif; " >
<!--	<tr style="background-color:#FFD700;">{{-- #FF5252; --}}
	<th align="left"></th>
	<th align="left"></th>
	<th align="left"></th>
	<th align="left"></th>
	<th align="left"></th>
	<th align="left"></th>
	<th align="left"></th> 
	</tr>-->
	<tr >{{-- #FF5252; style="background-color:#FFD700;" --}}
	<th></th>
	<th align="left" ><center>Item</center></th>
	<th align="left"><center>Description</center></th>
	<th align="left"><center>Country of Origin</center></th>
	<th align="left"><center>Quantity</center></th>
	<th align="left"><center>Unit price EXW per item</center></th>
	<th align="left"><center>Total price EXW per iterm</center></th>
	<th align="left"><center>Total price TZS</center></th> 
	</tr>
	<?php $count=1; 
		$total=0;
	?>
	<?php $countRows=0;
	$countspan=0;
	foreach($invoice_items as $invoice_item){
	    $countRows++;
	}
	//$countRows=$countRows/2
	?>
	@foreach($invoice_items as $invoice_item)
	<tr>
	 @if(++$countspan==1)
	<td style="border:none;">A</td>
	@else
	<td style="border:none;"></td>
	@endif
	
	<td align="left">{{ $count++ }}</td>
	<td align="left">{{ $invoice_item->item_name }}</td>
	<td align="left"><center>{{ $invoice_item->unit }}</center></td>
	<td align="left"><center>{{ $invoice_item->invoice_quantity }}</center></td>
	<td align="left"><center>{{ number_format($invoice_item->invoice_item_price, 2 , '.' , ',') }}</center></td>
	<?php $vat=$invoice_item->invoice_item_price*0.15; ?>
	<td align="left"><center>{{  number_format($invoice_item->invoice_item_final_amount, 2 , '.' , ',') }}</center></td>
	<?php $Tvat=$invoice_item->invoice_item_final_amount*0.15; ?>
	<td align="left"><center>{{  number_format($invoice_item->invoice_item_final_amount, 2 , '.' , ',') }}</center></td>
		  
	</tr>
	<?php $total+=($invoice_item->invoice_item_final_amount); ?>
	@endforeach
	<tr >
	 <td align="center"> B </td>
	<td align="left" colspan="6">cost of local transport of all good to the final destination</td>
	<td align="center">{{ number_format($invoice->transport, 2 , '.' , ',') }}</td>
	</tr>
	<tr>
	 <td align="center"> C </td>
	<td align="left" colspan="6">Insurence (if required)</td>
	<td align="center">{{ number_format($invoice->insurence, 2 , '.' , ',') }}</td>
	</tr>
	<tr>
	 <td align="center"> D </td>
	<td align="left" colspan="6">Total cost (A + B+ C)</td>
	<td align="center">{{ number_format($total+($invoice->transport)+($invoice->insurence), 2 , '.' , ',') }}</td>
	</tr>
	<tr>
	 <td align="center"> E </td>
	<td align="left" colspan="6">VAT of Total Cost</td>
	<td align="center">{{ number_format(($total+($invoice->transport)+($invoice->insurence))*0.15, 2 , '.' , ',') }}</td>
	</tr>
	<tr>
	 <td align="center"></td>
	<td align="left" colspan="6">Grand Total (D + E) </td>
	<?php $grandTotal=($total+($invoice->transport)+($invoice->insurence))+(($total+($invoice->transport)+($invoice->insurence))*0.15); ?>
	<td align="center">{{ number_format($grandTotal, 2 , '.' , ',') }}</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
<p style="font-size:13px; float:left; font-family: Eurostile, sans-serif;" ><b>Amount in words: </b><span>{{ucfirst(Terbilang::make($grandTotal, ' shillings'))  }}</span><p><br><br> 

<p style="font-size:16px; font-family:Eurostile, sans-serif;"><b>Name.......................................................................................................<span>in the capacity of...............................................................................</span></b></p>
<p style="font-size:16px; font-family:Eurostile, sans-serif;"><b>Signature of Bidder</span></b></p>
<p style="font-size:16px; font-family:Eurostile, sans-serif;"><b>Duly authorized to sign the bid for and on behalf of.......................................................................................................................................</span></b></p>
<p style="font-size:16px; font-family:Eurostile, sans-serif;"><b>date on ..............................................<span>day of............................................................</span><span>20..................</span></b></p>
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