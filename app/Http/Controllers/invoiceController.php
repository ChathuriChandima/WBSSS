<?php

namespace App\Http\Controllers;
use App\Supplier;
use App\Invoice;
use App\stock;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class invoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.accountant.invoice')->with('supplier',Supplier::all())
        ->with('stockNames',stock::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'invoiceNo' => 'required|unique:invoices',
            'id' =>'required',
            'date'=>'required',
            'price' => 'required',
        ]);

        $invoice=new Invoice;
        $invoice->invoiceNo=$request->input('invoiceNo');
        $invoice->SupplierId=$request->input('id');
        $invoice->date=date('Y-m-d',strtotime($request->input('date')));
        $invoice->price=$request->input('price');
        $invoice->save();
        // variables
        $partsCost = 0;

        // updateting stocks by iterating on $items
        $noOfStockItems = (int)$request->input('count');
        $stockNames = array();
        $stockQuntity = array();

        for ($i = 0; $i < $noOfStockItems; $i++){
          array_push($stockNames,$request->input('stock')["$i"]['name']);
          array_push($stockQuntity,$request->input('stock')["$i"]['qun']);
        }

        for ($i = 0; $i < count($stockNames); $i++){
          $item = stock::where('name','=',$stockNames[$i])->first();
          $item->availableStock = $item->availableStock + $stockQuntity[$i];
          $item->soldStock = $item->purchasedStock + $stockQuntity[$i];
          $partsCost += $item->price*(int)$stockQuntity[$i];
          $item->save();
        }

        Alert::success('Invoice details are saved.','Done!');
        return redirect('/invoice');
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
        //
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
        //
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
    public function search(){
        $q=Input::get('q');
        $invoice=Invoice::where('invoiceNo','LIKE','%'.$q.'%')->get();
        $user=Supplier::where('supplierName','LIKE','%'.$q.'%')->get();
        if(count($invoice)>0){
            return view('pages.accountant.searchinvoice')->withDetails($invoice)->with('c',1 )
            ->with('supplier',Supplier::all());
        }elseif(count($user)>0){
            $invoice1=Invoice::all();
            $count=0;
            foreach ($user as $u){
                foreach($invoice1 as $v){
                    if($u->supplierId==$v->SupplierId){
                        $count++;
                    }
                }
            }
            if($count>0){
            return view('pages.accountant.searchinvoice')->withDetails($user)->with('c',0 )
            ->with('invoice',Invoice::all());
            }else{
                Alert::info('Try to search Again.....','Not Found!');
                return redirect('/invoice');
            }
        }else{
            Alert::info('Try to search Again.....','Not Found!');
            return redirect('/invoice');
        }
    }
}
