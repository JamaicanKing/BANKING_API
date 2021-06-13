<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Customer;
use App\Models\Branches;
use App\Models\Currency;
use App\Models\AccountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = DB::select("SELECT 
        CONCAT(customers.firstname,' ',customers.lastname) as account_holder,
        branches.name as branch_name,
        currencies.name as currency_name,
        account_types.name as account_type_name,
        accounts.account_balance,
        accounts.account_number,
        accounts.id
        FROM `accounts`
        INNER JOIN customers ON accounts.customer_id = customers.id
        INNER JOIN branches ON accounts.branch_id = branches.id
        INNER JOIN currencies ON accounts.currency_id = currencies.id
        INNER JOIN account_types ON accounts.account_type_id = account_types.id");

        return view('accounts.index',['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        $accountType = AccountType::all(['id','name']);
        $branches = Branches::all(['id','name']);
        $currency = Currency::all(['id','name']);
        $customers = DB::select("Select 
            customers.id,
            CONCAT(customers.firstname,' ',customers.lastname) as name FROM customers");

        return view('accounts.create',
        [
            '$account' => $accounts, 
            'customers' => $customers,
            'accountType' => $accountType,
            'branches' => $branches,
            'currency' => $currency,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subjects = Account::create([
            'customer_id' => $request->input('customer_id'),
            'account_number' => $request->input('account_number'),
            'account_balance' => $request->input('account_balance'),
            'account_type_id' => $request->input('account_type_id'),
            'currency_id' => $request->input('currency_id'),
            'branch_id' => $request->input('branch_id'),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        return redirect()->route("accounts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = DB::select("SELECT customers.id, CONCAT(customers.firstname,' ',customers.lastname) as name FROM `customers`");
        $account = Account::find($id);
        $accountType = AccountType::all(['id','name']);
        $currency = Currency::all(['id','name']);
        $branches = Branches::all(['id','name']);
        

        return view('accounts.edit',
        [
            'account' => $account,
            'customer' => $customer,
            'accountType' => $accountType,
            'currency' => $currency,
            'branches' => $branches,

        ]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $account = Account::find($id);
        $account->customer_id = $request->input('customer_id');
        $account->account_number = $request->input('account_number');
        $account->account_balance = $request->input('account_balance');
        $account->account_type_id = $request->input('account_type_id');
        $account->currency_id = $request->input('currency_id');
        $account->branch_id = $request->input('branch_id');

        $account->save();

        return redirect()->route('accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
