<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use PDF;
use App\Invoice;
use App\Letter;
use App\Invoice_item;
use DB;
use App\Rate;
use App\alamin_invoice;
use App\meridian_invoice;
use App\masuo_invoice;
use App\bakari_invoice;
class PDFInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function generateInvoicePDF($id)
    {
        $invoice=Invoice::find($id);
        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM invoice_items where invoice_id='$id'");
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.invoice', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('invoice.pdf');
    }
      public function generateInvoiceDollarPDF($id)
    {
        $rate=Rate::find(1);
        $invoice=Invoice::find($id);
        $invoice_items=DB::select("SELECT * FROM invoice_items where invoice_id='$id'");
        $pdf = PDF::loadView('pdf.invoicedollar', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('invoice.pdf');
    }

    public function generateRecipientPDF($id)
    {
        $rate=Rate::find(1);
        $invoice=Invoice::find($id);
        $invoice_items=DB::select("SELECT * FROM invoice_items where invoice_id='$id'");
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.recipient', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('invoice.pdf');
    }
     public function generateSchedulePDF($id)
    {
        $rate=Rate::find(1);
        $invoice=Invoice::find($id);
        $invoice_items=DB::select("SELECT * FROM invoice_items where invoice_id='$id'");
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.schedule', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('invoice.pdf');
    }
     public function generateLetterPDF($id)
    {
        $letter=Letter::find($id);
        
        $pdf = PDF::loadView('pdf.letter', compact(['letter']));
  
        return $pdf->download('letter.pdf');
    }

     public function generateAlminInvoicePDF($id)
    {
        $invoice=alamin_invoice::find($id);
        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM    alamin_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.alamin.proforma', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('alamin_invoice.pdf');
    }

    public function generateAlaminTaxPDF($id)
    {
        $invoice=alamin_invoice::find($id);
        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM    alamin_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.alamin.tax', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('alamin_invoice.pdf');
    }

 public function generateAlaminScheduleInvoicePDF($id)
    {
        $invoice=alamin_invoice::find($id);
        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM    alamin_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.alamin.schedule', compact(['invoice','invoice_items','rate']));
        $pdf->setPaper('A4', 'landscape');
  
        return $pdf->download('alamin_invoice.pdf');
    }


    /*===========================Meridian function==============================*/

     public function generateMeridianInvoicePDF($id)
    {
        $invoice=meridian_invoice::find($id);

        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM meridian_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.meridian.proforma', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('meridian_invoice.pdf');
    }

    public function generateMeridianTaxPDF($id)
    {
        $invoice=meridian_invoice::find($id);
        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM    meridian_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.meridian.tax', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('meridian_invoice.pdf');
    }

 public function generateMeridianScheduleInvoicePDF($id)
    {
        $invoice=meridian_invoice::find($id);
        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM    meridian_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.meridian.schedule', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('meridian_invoice.pdf');
    }

    /*===========================Bakari function==============================*/

     public function generateBakariInvoicePDF($id)
    {
        $invoice=bakari_invoice::find($id);

        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM bakari_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.bakari.proforma', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('bakari_invoice.pdf');
    }

    public function generateBakariTaxPDF($id)
    {
        $invoice=bakari_invoice::find($id);
        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM    bakari_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.bakari.tax', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('bakari_invoice.pdf');
    }

 public function generateBakariScheduleInvoicePDF($id)
    {
        $invoice=bakari_invoice::find($id);
        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM    bakari_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.bakari.schedule', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('bakari_invoice.pdf');
    }

    /*===========================Masuo functions==============================*/

     public function generateMasuoInvoicePDF($id)
    {
        $invoice=masuo_invoice::find($id);

        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM masuo_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.masuo.proforma', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('masuo_invoice.pdf');
    }

    public function generateMasuoTaxPDF($id)
    {
        $invoice=masuo_invoice::find($id);
        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM    masuo_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.masuo.tax', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('masuo_invoice.pdf');
    }

 public function generateMasuoScheduleInvoicePDF($id)
    {
        $invoice=masuo_invoice::find($id);
        $rate=Rate::find(1);
        $invoice_items=DB::select("SELECT * FROM    masuo_invoice_items where invoice_id='$id'");

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.masuo.schedule', compact(['invoice','invoice_items','rate']));
  
        return $pdf->download('masuo_invoice.pdf');
    }
}
