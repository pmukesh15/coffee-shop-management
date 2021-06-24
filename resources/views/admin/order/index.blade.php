@extends('layouts.app')

@section('title','Order')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Orders</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Date & Time</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key=>$order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->item_name }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->total }}</td>
                                            <th>{{ $order->type }}</th>
                                            <th>
                                                @if($order->status == true)
                                                    <span class="label label-info">Confirmed</span>
                                                @else
                                                    <span class="label label-danger">not Confirmed yet</span>
                                                @endif

                                            </th>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                @if($order->status == false)
                                                    <form id="status-form-{{ $order->id }}" action="{{ route('order.status',$order->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                    </form>
                                                    <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you sure you want to verify this request?')){
                                                            event.preventDefault();
                                                            document.getElementById('status-form-{{ $order->id }}').submit();
                                                            }else {
                                                            event.preventDefault();
                                                            }"><i class="material-icons">done</i></button>
                                                @endif
                                                <form id="delete-form-{{ $order->id }}" action="{{ route('order.destory',$order->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $order->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush