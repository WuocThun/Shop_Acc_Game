@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>
    @if ($cart && $cart->items->count())
        <ul>
            @foreach ($cart->items as $item)
                <li>
                    {{ $item->product->name }} - Quantity: {{ $item->quantity }}
                    <form action="{{ route('cart.remove', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <form action="{{ route('orders.checkout') }}" method="POST">
            @csrf
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ env('STRIPE_KEY') }}"
                    data-amount="{{ $cart->items->sum(function ($item) { return $item->product->price * $item->quantity; }) * 100 }}"
                    data-name="Your Store"
                    data-description="Order Payment"
                    data-currency="usd"></script>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection
