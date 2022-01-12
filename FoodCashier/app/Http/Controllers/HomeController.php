<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    // ;
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $MasterTransaction = DB::select("SELECT * FROM master_transactions");
        // dd($MasterTransaction);

        $AllTransaction = Transaction::join('masterstocks', 'transactions.Iditem', '=', 'masterstocks.id')
            ->get(['transactions.*', 'masterstocks.nameitem', 'masterstocks.qty as stock_barang']);

        // dd($AllTransaction);
        return view('layouts.dashboard', compact('MasterTransaction'));
    }
}
