@extends('layouts.app')

@section('title','Customer')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Customer Vew</h4>
                        </div>
                        <div class="card-content">
                           <div class="row">
                               <div class="col-md-12">
                                   <strong>Name: {{ $customer->name }}</strong><br>
                                   <b>Email: {{ $customer->email }}</b> <br>
                                   <p>{{ $customer->wallet_balance }}</p><hr>
                               </div>
                           </div>
                            <a href="{{ route('customer.index') }}" class="btn btn-danger">Back</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush