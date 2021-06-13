<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_number',
        'transaction_amount',
        'transaction_type_id',
        'account_balance',
        'created_by',
        'updated_by',
        'created_at'
    ];

    public static function getTransactionByAccountNumber($accountNumber){
        try{
            $transactions = DB::table('transactions')
                            ->join('transaction_types', 'transactions.transaction_type_id', '=', 'transaction_types.id')
                            ->join('accounts', 'transactions.account_number', '=', 'accounts.account_number')
                            ->join('currencies', 'accounts.currency_id', '=', 'currencies.id')
                            ->where('transactions.account_number', '=', $accountNumber)
                            ->select(['transactions.*','transaction_types.name as transaction_type','currencies.name as currency_name',])
                            ->get();

            if($transactions){
                return $transactions;
            }
        }
        catch(Exception $error){
            Log::error("Error trying to get transaction by account number: " . $error->getMessage());
        }

        return [];
    }

    public static function getTransactionByCustomerId($customerId){
        try{
            $transactions = DB::table('transactions')
                            ->join('transaction_types', 'transactions.transaction_type_id', '=', 'transaction_types.id')
                            ->join('accounts', 'transactions.account_number', '=', 'accounts.account_number')
                            ->join('currencies', 'accounts.currency_id', '=', 'currencies.id')
                            ->where('accounts.customer_id', '=', $customerId)
                            ->select(['transactions.*','transaction_types.name as transaction_type','currencies.name as currency_name',])
                            ->get();

            if($transactions){
                return $transactions;
            }
        }
        catch(Exception $error){
            Log::error("Error trying to get transaction by Customer Id: " . $error->getMessage());
        }

        return [];
    }
}
