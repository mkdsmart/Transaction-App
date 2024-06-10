@extends('layouts.design')
@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

</style>
<h1>Transaction Details</h1>

<table id="transaction-table">
  <thead>
    <tr>
      <th>Dates</th>
      <th>Receiver</th>
      <th>Status</th>
      <th>Amount</th>
      <th>Stock</th>
    </tr>
  </thead>
  <tbody>
    <!-- Table rows will be inserted here dynamically using JavaScript -->
    @if($transactions != null)
        @foreach ($transactions as $transaction)
            @if($transaction->delete != 1)
                <tr>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $transaction->recipient }}</td>
                    {{-- @dd($transaction->status== ("waiting payement ")) --}}
                    @if ($transaction->status == "waiting payement ")
                        <td><button><a href="{{ route('payment', ['id'=> $transaction->id]) }}">pay</a></button></td>
                    @else
                        <td><button disabled><a href="#" disabled>paid</a></button></td>
                    @endif

                    <td>{{ $transaction->amount }}</td>
                    <td><button><a href="{{ route('deleteview', ['id'=> $transaction->id]) }}">delete</a></button></td>
                </tr>
            @endif
        @endforeach
    @endif
  </tbody>
</table>

@endsection
