@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Account') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('accounts.store') }}">
                        @csrf

                        @include('components.common.dropDown',
                        [
                            'defaultDropDownOption' => 'Please select Customer',
                            'options' => $customers,
                            'fieldLabel' => 'Customer Name',
                            'fieldName' => 'customer_id',
  
                        ])

                        <div class="form-group row">
                            <label for="account_number" class="col-md-4 col-form-label text-md-right">{{ __('Account Number') }}</label>

                            <div class="col-md-6">
                                <input id="account_number" type="account_number" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}" required autocomplete="account_number">

                                @error('account_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_balance" class="col-md-4 col-form-label text-md-right">{{ __('Account Balance') }}</label>

                            <div class="col-md-6">
                                <input id="account_balance" type="text" class="form-control @error('account_balance') is-invalid @enderror" name="account_balance" value="{{ old('account_balance') }}" required autocomplete="account_balance" autofocus>

                                @error('account_balance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        @include('components.common.dropDown',
                        [
                            'defaultDropDownOption' => 'Please select Account Type',
                            'options' => $accountType,
                            'fieldLabel' => 'AccountType',
                            'fieldName' => 'account_type_id',
  
                        ])

                        @include('components.common.dropDown',
                        [
                            'defaultDropDownOption' => 'Please select Branch',
                            'options' => $branches,
                            'fieldLabel' => 'Branch',
                            'fieldName' => 'branch_id',

                        ])

                       
                        @include('components.common.dropDown',
                        [
                            'defaultDropDownOption' => 'Please select Currency',
                            'options' => $currency,
                            'fieldLabel' => 'Currency',
                            'fieldName' => 'currency_id',

                        ])



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Account') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection