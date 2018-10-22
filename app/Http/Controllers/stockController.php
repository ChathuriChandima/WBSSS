<?php

namespace App\Http\Controllers;
use App\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class stockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = stock::orderBy('code','name','type','availableStock','purchasedStock','soldStock','price')->paginate(10);
        return view('pages.stock.stocks')->with('stocks',$stocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.stock.add');
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
            'code' => 'required',
            'name' => 'required',
            'type' =>'required',
            'availableStock'=>'required',
            'purchasedStock' => 'required',
            'soldStock'=>'required',
            'price' => 'required'
        ]);
        $stock=new stock;
        $stock->code=$request->input('code');
        $stock->name=$request->input('name');
        $stock->type=$request->input('type');
        $stock->availableStock=$request->input('availableStock');
        $stock->purchasedStock=$request->input('purchasedStock');
        $stock->soldStock=$request->input('soldStock');
        $stock->price=$request->input('price');
        $stock->save();

        return redirect('stocks')->with('success','Your changes are saved.');
    }

    public function move(){
        return view('pages.stock.stocks')
        ->with('stock',stock::all());
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
}
