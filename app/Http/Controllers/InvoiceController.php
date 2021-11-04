<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Invoice_item;
use Terbilang;
use PDF;
use DB;
class InvoiceController extends Controller
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
    public function index()
    { 
        $invoices= Invoice::all();
        return view('invoice.index')->with('invoices',$invoices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $this->validate($request, [
             'companyName' => 'required',
            'address' => 'required',
            'city' => 'required',
            

            /*'productCode' => 'required',
            'productName' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'total' => 'required',

            'productCode2' => 'required',
            'productName2' => 'required',
            'quantity2' => 'required',
            'price2' => 'required',
            'total2' => 'required',*/
        ]);
        //dd($request->input('productName'));
        $invoice= new Invoice();
        $invoice->user_id=1;
        $invoice->companyName=$request->input('companyName');
        $invoice->address=$request->input('address');
        $invoice->city=$request->input('city');
        if(!empty($request->input('pobox'))){
            $invoice->pobox=$request->input('pobox');
        }
        if(!empty($request->input('lot'))){
            $invoice->lot=$request->input('lot');
        }
        $invoice->save();

        $invoice_id=$invoice->invoice_id;
        
        if(!empty($request->input('productName')[0])){
            
            for ($i = 0; $i < count($request->input('productName')); $i++) {
            $invoice_item= new Invoice_item(); 
            $invoice_item->invoice_id =$invoice_id;
            $invoice_item->item_name= $request->input('productName')[$i];
            $invoice_item->unit=$request->input('unit')[$i];
            $invoice_item->invoice_quantity=$request->input('quantity')[$i];
            $invoice_item->invoice_item_price=$request->input('price')[$i];
            $invoice_item->invoice_item_final_amount=$request->input('total')[$i];
            $invoice_item->currency_type="tsh";
            $invoice_item->save();
        }
    }
        if(!empty($request->input('productName2')[0])){
            for ($i = 0; $i < count($request->input('productName2')); $i++) {
            $invoice_item= new Invoice_item(); 
            $invoice_item->invoice_id =$invoice_id;
            $invoice_item->item_name= $request->input('productName2')[$i];
            $invoice_item->unit=$request->input('unit2')[$i];
            $invoice_item->invoice_quantity=$request->input('quantity2')[$i];
            $invoice_item->invoice_item_price=$request->input('price2')[$i];
            $invoice_item->invoice_item_final_amount=$request->input('total2')[$i];
            $invoice_item->currency_type="dollar";
            $invoice_item->save();
        }
       }
            return redirect('/invoice')->with('success','new invoice are recorded !!!');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoices=DB::select("SELECT * FROM invoices INNER JOIN invoice_items ON invoices.invoice_id=invoice_items.invoice_id WHERE invoices.invoice_id='$id'");
        if(empty($invoices)){
            $status=false;
        $invoices=DB::select("SELECT * FROM invoices WHERE invoice_id='$id'");
        return view('invoice.edit')->with(['invoices'=>$invoices, 'status'=>$status]);
        }
        else{
            $status=true;
         return view('invoice.edit')->with(['invoices'=>$invoices, 'status'=>$status]);
        
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->input('quantity')[163]);
        $this->validate($request, [
             'companyName' => 'required',
            'address' => 'required',
            'city' => 'required',
            

            /*'productCode' => 'required',
            'productName' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'total' => 'required',

            'productCode2' => 'required',
            'productName2' => 'required',
            'quantity2' => 'required',
            'price2' => 'required',
            'total2' => 'required',*/
        ]);
        //dd($request->input('productName'));
        //dd($id);
        $invoice=Invoice::find($id);
        $invoice->user_id=1;
        $invoice->companyName=$request->input('companyName');
        $invoice->address=$request->input('address');
        $invoice->city=$request->input('city');
        if(!empty($request->input('pobox'))){
            $invoice->pobox=$request->input('pobox');
        }
        if(!empty($request->input('lot'))){
            $invoice->lot=$request->input('lot');
        }
        
        $invoice->update();
    
        $invoice_id=$invoice->invoice_id;
        $invoice_item=DB::select("DELETE FROM invoice_items WHERE invoice_id='$id'");
        if(!empty($request->input('productName')[0])){
            
            for ($i = 0; $i < count($request->input('productName')); $i++) {
            $invoice_item=new Invoice_item(); 
            $invoice_item->invoice_id=$id;
            $invoice_item->item_name= $request->input('productName')[$i];
            $invoice_item->unit=$request->input('unit')[$i];
            $invoice_item->invoice_quantity=$request->input('quantity')[$i];
            $invoice_item->invoice_item_price=$request->input('price')[$i];
            $invoice_item->invoice_item_final_amount=$request->input('total')[$i];
            $invoice_item->currency_type="tsh";
            $invoice_item->save();
        }
    }

            return redirect('/invoice')->with('success','new invoice are updated !!!');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice=Invoice::find($id);
        $invoice->delete();
        return redirect()->back()->with('message', ' You have been successfully deleted one invoice !!!');
    }
}
