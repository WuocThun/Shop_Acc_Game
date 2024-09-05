@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>
    <p>Order ID: {{ $order->id }}</p>
    <p>Total: {{ $order->total }}</p>
    <p>Status: {{ $order->status }}</p>
@endsection
