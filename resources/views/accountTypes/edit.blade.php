@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Account Type') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('accountTypes.update',['accountType' => $accountType->id],) }}" >
                        @csrf
                        @method('PUT')
                        
                        
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Account Type') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $accountType->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="interest" class="col-md-4 col-form-label text-md-right">{{ __('Interest') }}</label>

                                <div class="col-md-6">
                                    <input id="interest" type="text" class="form-control @error('interest') is-invalid @enderror" name="interest" value="{{ $accountType->interest }}" required autocomplete="interest" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                            <div class="col-md-10 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  @endsection