<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class Account extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'account_number',
        'account_balance',
        'account_type_id',
        'currency_id',
        'branch_id',
        'created_by',
        'updated_by',
        'created_at'
    ];

    public static function getAccountByCustomerId($customerId){
        try{
            $transactions = DB::table('accounts')
                            ->join('customers', 'accounts.customer_id', '=', 'customers.id')
                            ->join('currencies', 'accounts.currency_id', '=', 'currencies.id')
                            ->join('account_types', 'accounts.account_type_id', 'account_types.id')
                            ->where('accounts.customer_id', '=', $customerId)
                            ->select(['currencies.name as currency_name', 
                                        'accounts.account_balance',
                                        'accounts.account_number', 
                                        'accounts.id',
                                        'account_types.name as account_type_name',
                                        DB::raw('CONCAT(customers.firstname ," ", customers.lastname) as account_holder')
                                        ])
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

    public static function getAccountDetails($accountNumber){
        try{
            $account = DB::table('accounts')
                            ->join('customers', 'accounts.customer_id', '=', 'customers.id')
                            ->join('currencies', 'accounts.currency_id', '=', 'currencies.id')
                            ->join('account_types', 'accounts.account_type_id', 'account_types.id')
                            ->join('branches', 'accounts.branch_id', 'branches.id')
                            ->where('accounts.account_number', '=', $accountNumber)
                            ->select(['currencies.name as currency_name', 
                                        'accounts.account_balance',
                                        'accounts.account_number', 
                                        'accounts.id',
                                        'account_types.name as account_type_name',
                                        'branches.name as branch',
                                        DB::raw('CONCAT(customers.firstname ," ", customers.lastname) as account_holder')
                                        ])
                            ->first();

            if($account){
                return $account;
            }
        }
        catch(Exception $error){
            Log::error("Error trying to get transaction by account number: " . $error->getMessage());
        }

        return [];
    }
}
