@extends('layouts.app')

@section('content')
    <h1>Your Orders</h1>
    <ul>
        @foreach ($orders as $order)
            <li>
                Order #{{ $order->id }} - Total: {{ $order->total }} - Status: {{ $order->status }}
            </li>
        @endforeach
    </ul>
@endsection
