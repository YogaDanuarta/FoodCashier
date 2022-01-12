<?php

namespace App\Http\Controllers;

use App\Models\Masterstock;
use App\Models\Transaction;
use App\Models\MasterTransaction;
use App\Models\PostStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // $name = Transaction
        // $AllTransaction = Transaction::join('masterstocks a','a.id','=','b.IdItem')->get(['',]);
        // dd($AllTransaction);



        $AllTransaction = Transaction::join('masterstocks', 'transactions.Iditem', '=', 'masterstocks.id')->where('transactions.status', '0')
            ->get(['transactions.*', 'masterstocks.nameitem', 'masterstocks.qty as stock_barang']);
        // dd($AllTransaction);

        return view('layouts.transaction', compact('AllTransaction'));
    }


    // public function ListItem()
    // {
    //     // dd($ListItem);

    //     return view('component.transaction.addpagetransaction');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $ListItem = Masterstock::all();
        return view('component.transaction.addpagetransaction', compact('ListItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $datas = $request->id_name;

        $total = count($datas);
        // dd($total);
        $records_data = [];

        $uniqid = Str::random(4);


        $master_data = [
            'master_nota' => $uniqid,
            'namecashier' => Auth::user()->name,
            'subtotal' => 0
        ];


        MasterTransaction::create($master_data);
        for ($i = 0; $i < $total; $i++) {

            $now = Carbon::now();

            $records_data[] =
                [
                    'id_nota' => $uniqid,
                    'iditem' => $datas[$i],
                    'status' => 0,
                    'qty' => $request->cost[$i],
                    'created_at' => $now,
                    'updated_at' => $now

                ];
        }

        // dd($records_data);

        $PostArray =    Transaction::insert($records_data);

        ($PostArray == true) ? $result = back()->with('success', 'Item created successfully!') : $result =   back()->with('error', 'Error Item!');
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {


        $id = $request->id_transaction;
        $id_nota = $request->id_nota;

        $TotalTransaction = DB::select("SELECT a.id as id_transactions ,a.id_nota,a.qty as jumlah_beli,a.IdItem,b.nameitem,b.price,b.qty as stock_barang,c.* FROM `transactions` a inner join masterstocks b inner join master_transactions c on a.IdItem = b.id WHERE a.id = '$id' and c.master_nota ='$id_nota';");
        $id_item = $TotalTransaction[0]->IdItem;
        $newStock = $TotalTransaction[0]->stock_barang - $TotalTransaction[0]->jumlah_beli;
        $subTotal =  $TotalTransaction[0]->jumlah_beli *  $TotalTransaction[0]->price;




        $updateStock = DB::update("update masterstocks set qty = $newStock   where id ='$id_item'");

        $old_subtotal = DB::select("select * from master_transactions where master_nota = '$id_nota'");

        $id_master_transaction = $old_subtotal[0]->id;
        $validatesubTotal = $old_subtotal[0]->subtotal;
        if ($validatesubTotal == 0) {
            $validate = $subTotal;
        } else {
            (int)    $validate =  (int) $validatesubTotal +  (int) $subTotal;
        }
        $updateSubtotal = DB::update("update master_transactions set subtotal=$validate where master_nota='$id_nota' and id = '$id_master_transaction' ");

        if ($updateSubtotal) {

            $UpdateTransaction  = [
                'status' => 1
            ];
            // $notaid = $Tamp[0]['id_nota'];
            $dataTransaction = DB::select("UPDATE transactions SET status = 1 WHERE `id`= '$id' and id_nota = '$id_nota' and  IdItem ='$id_item' ");
            // return view('layouts.transaction', compact('AllTransaction'));
            return redirect()->route('transaction.index');
        } else {
            echo "something went wrong";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Deleteitem         =     Transaction::find($id)->forceDelete();
        ($Deleteitem == true) ? $result = back()->with('success', 'Transaction records has been deleted successfully!') : $result =   back()->with('error', 'Delete Item !');

        return $result;
    }
}
