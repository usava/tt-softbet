<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transaction;
use App\Http\Resources\Transaction as TransactionResource;
use App\Http\Resources\Transactions as TransactionsCollection;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TransactionsCollection(Transaction::all());
    }

    /**
     * Display a listing of the transactions with filtering .
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');

        $query = Transaction::where($request->except(['offset', 'limit']));

        if($offset && $limit){
            $query->offset($offset)->limit($limit);
        }

        return new TransactionsCollection($query->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $new_transaction = new Transaction();

        $new_transaction->customerId = $request->input('customerId');
        $new_transaction->amount = $request->input('amount');
        $new_transaction->date = date('Y-m-d', time());

        $new_transaction->save();
        $new_transaction->transactionId = $new_transaction->id;

        return new TransactionResource(
            $new_transaction
        );
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return new TransactionResource(Transaction::where(
            $request->only(['transactionId', 'customerId']))
            ->first()
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $transaction = Transaction::where('transactionId', $request->transactionId);
        $transaction->update(['amount' => $request->input('amount')]);

        return new TransactionResource($transaction->first());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $transaction = Transaction::where('transactionId', $request->transactionId);

        if($transaction->delete())
            return json_encode('success');

        return json_encode('fail');

    }

    public function getDailySum()
    {
        #Get the sum of daily amount
        $query = DB::table('transactions')
            ->select(DB::raw("SUM(amount) as daily_amount"))
            ->where('date', date('Y-m-d', time()))
            ->first();

        #Store the sum
        DB::table('amounts_sum')->insert(
            [
                'amountsum' => $query->daily_amount,
                'date' => date("Y-m-d", time())
            ]);

        return $query->daily_amount;
    }
}
