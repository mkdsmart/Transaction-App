@extends('layouts.design')
@section('content')
<style>
   body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .transaction-details {
        margin-bottom: 20px;
    }

    .transaction-details p {
        margin: 5px 0;
    }

    .buttons {
        text-align: center;
    }

    .edit-btn, .confirm-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .edit-btn:hover, .confirm-btn:hover {
        background-color: #0056b3;
    }

    .confirm-btn {
        margin-left: 10px;
    }

</style>

<div class="detail">
    <h1>Transaction Details</h1>
    <div class="transaction-details">
        <p><strong>Destination country:</strong> {{ Session::get('country') }}</p>
        <p><strong>Withdrawal method:</strong> {{ Session::get('withdraw') }}</p>
        <p><strong>Recipient:</strong> {{ Session::get('recipient') }}</p>
        <p><strong>Reason:</strong> {{ Session::get('reason') }}</p>
        <p><strong>City:</strong> {{ Session::get('city') }}</p>
        <p><strong>Address:</strong> {{ Session::get('address') }}</p>
        <p><strong>Phone Number:</strong> {{ Session::get('phone') }}</p>

        <p><strong>Amount send:</strong> {{ Session::get('moneysend') }} CAD</p>
        <p><strong>Amount received:</strong> {{ Session::get('moneysend')*441 }} FCFA</p>
    </div>
    <div class="buttons">
        <button class="edit-btn">Edit</button>
        <a href="{{ route('saving') }}"><button class="confirm-btn">Confirm Transaction</button></a>
    </div>
</div>
@endsection
