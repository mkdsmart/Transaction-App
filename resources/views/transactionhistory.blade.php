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
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    /* Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
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
      <th>More</th>
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
                    <td><button id="{{ 'Btn'. (string) $transaction->id}} "><p>&#128065;</p></button>
                        {{-- <p>{{'Btn'. (string) $transaction->id}}</p> --}}

                    <!-- The Modal -->
                    <div id="{{ $transaction->id }}" class="modal"> me
                    <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h1>Transaction Details</h1>
                            <div class="transaction-details">
                                <p><strong>Destination country:</strong> {{ $transaction->country }}</p>
                                <p><strong>Withdrawal method:</strong> {{ $transaction->withdrawal_method }}</p>
                                <p><strong>Recipient:</strong> {{ $transaction->recipient }}</p>
                                <p><strong>City:</strong> {{ $transaction->city }}</p>
                                <p><strong>Address:</strong> {{ $transaction->address }}</p>
                                <p><strong>Phone Number:</strong> {{ $transaction->phone }}</p>

                                <p><strong>Amount send:</strong> {{ $transaction->amount }} CAD</p>
                                <p><strong>Amount received:</strong> {{ $transaction->amount*441 }} FCFA</p>
                            </div>
                        </div>
                    </div>
                    </td>
                </tr>
                <script>
                    // Get the modal


                    // Get the button that opens the modal
                    var btn = document.getElementById("{{ 'Btn'. (string) $transaction->id}} ");
                    // alert(btn);

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    var modal;

                    // When the user clicks the button, open the modal
                    btn.onclick = function() {
                        modal = document.getElementById("{{ $transaction->id }}");

                        modal.style.display = "block";
                    }
                    // var modal = document.getElementById("{{ $transaction->id }}");

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                    modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                    }

                </script>
            @endif
        @endforeach
    @endif
  </tbody>
</table>

@endsection
