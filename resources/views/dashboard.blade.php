@extends('layouts.design')
@section('content')
<style>
    body {
    font-family: Arial, sans-serif;
    }

    .send {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    h1 {
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input[type="text"],
    input[type="tel"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin-top: 5px;
    }

    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

<div class="send">
    <h1>Recipient Info</h1>
    <form action="{{ route('store_transaction2') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="recipient">Recipient:</label>
            <input type="text" id="recipient" name="recipient" required>
        </div>
        <div class="form-group">
            <label for="reason">Reason for Transfer:</label>
            <textarea id="reason" name="reason" required></textarea>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="confirm_phone">Confirm Phone Number:</label>
            <input type="tel" id="confirm_phone" name="confirm_phone" required>
        </div>
        <button type="submit">continue</button>
    </form>
</div>
@endsection
