@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Department') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('departments.update',['department' => $department->id],) }}" >
                        @csrf
                        @method('PUT')
                        
                        
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $department->name }}" required autocomplete="name" autofocus>

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