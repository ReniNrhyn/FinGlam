@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Add Transaction</h2>

    <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" placeholder="e.g. Salary, Shopping" required>
        </div>

        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" placeholder="Enter amount" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" placeholder="Optional"></textarea>
        </div>

        <div class="mb-3">
            <label>Upload Receipt (Optional)</label>
            <input type="file" name="receipt" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
