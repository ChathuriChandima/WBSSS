<?php

namespace App\Http\Controllers;
use App\stock;
use DB;
use Alert;
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
        //link to stock page
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
        $l= DB::table('stocks')->latest()->first();
        // Here a error comes when the db is empty so adding a condition
        if ($l != null){
            $n=substr($l->code,1);
        }else{
            $n = '0'; //This will prevent a error if the db is empty
        }
        $i=(int)$n;
        $j=++$i;
        $h=(string)$j;
        $d=strlen($h);
        if($d==1){
            $id='S00'.$h;
        }elseif($d==2){
            $id='S0'.$h;
        }else{
            $id='S'.$h;
        }


        return view('pages.stock.create')
        ->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'type' =>'required',
            'availableStock'=>'required',
            'purchasedStock' => 'required',
            'soldStock'=>'required',
            'price' => 'required'
        ]);
        //create new stock object
        $stock=new stock;
        $stock->code=$request->input('code');
        $stock->name=$request->input('name');
        $stock->type=$request->input('type');
        $stock->availableStock=$request->input('availableStock');
        $stock->purchasedStock=$request->input('purchasedStock');
        $stock->soldStock=$request->input('soldStock');
        $stock->price=$request->input('price');
        $stock->save();
        Alert::success('Your changes are saved.','Done!');
            return redirect('stocks');
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
        //validation
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'type' =>'required',
            'purchasedStock'=>'required',
            'availableStock'=>'required',
            'soldStock' => 'required',
            'price' => 'required'
        ]);
            $stock=stock::find($id);
            $stock->name=$request->input('name');
            $stock->type=$request->input('type');
            $stock->purchasedStock=$request->input('purchasedStock');
            $stock->soldStock=$request->input('soldStock');
            $stock->availableStock=$request->input('availableStock');
            $stock->price=$request->input('price');
            $stock->save();
            Alert::success('Your changes are saved.','Done!');
            return redirect('stocks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s=stock::find($id);
        $s->delete();
        Alert::success('Deleted successfully.','Done!');
        return redirect('/stocks');
    }

    public function search(){
        $q=Input::get('q');
        //using code or stock name or type
        $stock=stock::where('code','LIKE','%'.$q.'%')->orWhere('name','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
        if(count($stock)>0){
            return view('pages.stock.searchstock')->withDetails($stock);
        }else{
            Alert::info('Try to search Again.....','Not Found!');
            return redirect('/stocks');
        }
    }

    public function find($id){
        $s=stock::find($id);
        return view('pages.stock.editstock')
        ->with('stock',$s);
    }
}
