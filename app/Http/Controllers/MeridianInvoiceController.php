<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\meridian_invoice;
use App\meridian_invoice_item;
use Terbilang;
use PDF;
use DB;

class MeridianInvoiceController extends Controller
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
       $invoices= meridian_invoice::all();
        return view('meridian.index')->with('invoices',$invoices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('meridian.create');
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
        $invoice= new meridian_invoice();
        $user_id=auth()->user()->id;
        $invoice->user_id=$user_id;
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
            $invoice_item= new meridian_invoice_item(); 
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
            $invoice_item= new meridian_invoice_item(); 
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
            return redirect('/meridian-invoices')->with('success','new invoice are recorded !!!');
         
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
       $invoices=DB::select("SELECT * FROM meridian_invoices INNER JOIN meridian_invoice_items ON meridian_invoices.invoice_id=meridian_invoice_items.invoice_id WHERE meridian_invoices.invoice_id='$id'");
       if(empty($invoices)){
         $status=false;
       $invoices=DB::select("SELECT * FROM meridian_invoices WHERE invoice_id='$id'");
       return view('meridian.edit')->with(['invoices'=>$invoices,'status'=>$status]);
       }
       else{
         $status=true;  
        return view('meridian.edit')->with(['invoices'=>$invoices,'status'=>$status]);
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
        $invoice=meridian_invoice::find($id);
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
        $invoice_item=DB::select("DELETE FROM meridian_invoice_items WHERE invoice_id='$id'");
        if(!empty($request->input('productName')[0])){
            
            for ($i = 0; $i < count($request->input('productName')); $i++) {
            $invoice_item=new meridian_invoice_item(); 
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

            return redirect('/meridian-invoice')->with('success','new invoice are updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
