<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionType;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Account;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('account_number')){
            $accountNumber = $request->input('account_number');
            $transactions = Transaction::getTransactionByAccountNumber($accountNumber);
        }
        else {
            $transactions = [];
        }
        

        return view('transactions.index',['transactions' => $transactions]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transactions = TransactionType::all();

        return view('transactions.create',['transactions' => $transactions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $account = Account::where('account_number', '=' , $request->input('account_number'))->first();
        $transactionType = TransactionType::find($request->input('transaction_type_id'));

        if($transactionType){
            if($transactionType->name == 'Deposit'){
                $accountBalance = $account->account_balance + $request->input('transaction_amount');
            }
            elseif($transactionType->name = 'Withdrawal'){
                $accountBalance = $account->account_balance - $request->input('transaction_amount');
            }
        }
        else{
            $response = [
                'success' => false,
                'message' => 'Transaction Type Incorrect'
            ];
            Log::error('Incorrect transaction type provided: '. $request->input('transaction_type_id'));
            return response()->json($response);
        }

        $transaction = Transaction::create([
            'account_number' => $request->input('account_number'),
            'transaction_amount' => $request->input('transaction_amount'),
            'transaction_type_id' => $request->input('transaction_type_id'),
            'account_balance' => $accountBalance,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        if($transaction){

            $accountRecord = Account::find($account->id);
            $accountRecord->account_balance = $accountBalance;
            $saved = $accountRecord->save();
            if($saved === false){
                Log::error('Unable to update account balance');
            }
            $response = [
                    'success' => true,
                    'message' => 'Transaction Successful'
                ];

        }else{

            $response = [
                'success' => false,
                'message' => 'Transaction fail'
            ];
        }

        return response()->json($response);
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
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
