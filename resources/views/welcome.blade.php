@extends('layouts.design')
@section('content')
<style>
    .content{
        display: flex;
        height: 80vh;
    }
    .descript{
        flex: 1;
        padding: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .logo{

        width: 300px;
        height: 400px;

        margin-bottom: 20px;
    }
    .logo img{
        position: relative;
        height: 100%;
        width: 100%;
       right: 500px;
       top: 100px;
    }

    .form-info{
        position: relative;
        right: 50px;
        background-color: #fff;
        padding: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
        flex: 1;
        border: 2px solid rgb(10, 10, 10);
        border-radius: 5px;
    }
    .form-info h2 {
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input,
    section {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #096bd5;
    }
</style>
<div class="content">
    <div class="descript">
        We are ready to serve your needs
    </div>
    <div class="logo">
        <img src="{{ asset('images/simple-cash-flow-icon-easy-600nw-1763260874.webp')}}" alt="">
    </div>
    <div class="form-info">
    @if (Auth::user() == null)
        <form action="{{ route('login') }}">
    @endif

        <form action="{{ route('store_transaction') }}" method="POST">
            @csrf

            <h2> Send money</h2>
            <label for="country">Country:</label>
            <select name="country" >
                <option value="{{ old('country') }}">--Choose a country--</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Ivory Coast">Ivory Coast</option>
                <option value="Burkina Fasso">Burkina Fasso</option>
                <option value="Togo">Togo</option>
                <option value="Benin">Benin</option>
                <option value="Ethiopia">Ethiopia</option>
            </select>
            @if($errors->has('country'))
                <span class="text-danger">{{ $errors->first('country') }}</span>
            @endif

            <label for="withdraw">withdrawal method:</label>
            <select name="withdraw" >
                <option value="{{ old('withdraw') }}">--Choose a country--</option>
                <option value="Bank deposit">Bank deposit</option>
                <option value="Orange Money">Orange Money</option>
                <option value="MTN mobile money">MTN mobile money</option>
            </select>
            @if($errors->has('withdraw'))
                <span class="text-danger">{{$errors->first('withdraw')}}</span>
            @endif

            <label for="moneysend"> You send:</label>
            <input type="number" name="moneysend" id="" value="{{ old('moneysend') }}">
            @if($errors->has('moneysend'))
                <span class="text-danger">{{$errors->first('moneysend')}}</span>
            @endif

            <label for="moneyreceived">The recipient receives:</label>
            <input type="number" name="moneyreceived" id="" min="15" disabled>


            <p>Total fee -- 00 CAD</p>
            <p>The current exchange rate: 1CAD = 441.1cfa</p>
            <button type="submit">send for free</button>
        </form>
    </div>
</div>

@endsection
