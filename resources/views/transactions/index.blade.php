@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Transaction List</h2>

    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Add Transaction</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Receipt</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ ucfirst($transaction->type) }}</td>
                    <td>{{ $transaction->category }}</td>
                    <td>Rp {{ number_format($transaction->amount, 2) }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>
                        @if($transaction->receipt)
                            <a href="{{ asset('storage/' . $transaction->receipt) }}" target="_blank">View</a>
                        @else
                            No receipt
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
