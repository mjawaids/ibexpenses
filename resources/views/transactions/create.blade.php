@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Transactions</div>

                <div class="panel-body">
                    @include('layouts.errors')

                    <form method="POST" action="/transactions">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="amoount">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="PKR 100" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" aria-describedby="nameHelp" placeholder="Enter description" required>
                            <small id="nameHelp" class="form-text text-muted">Transaction Description</small>
                        </div>
                        <div class="form-group">
                            <label for="type">Transaction Type</label>
                            <select class="custom-select form-control" id="type" name="type" required>
                                <option value="" selected>-- Select Type --</option>
                                <option value="withdrawal">Withdrawal</option>
                                <option value="income">Income</option>
                                <option value="transfer">Transfer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="from_account">From Account</label>
                            <select class="custom-select form-control" id="from_account" name="from_account">
                                <option value="" selected>-- Select Account --</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="to_account">To Account</label>
                            <select class="custom-select form-control" id="to_account" name="to_account">
                                <option value="" selected>-- Select Account --</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <select multiple class="form-control" id="tags" name="tags[]">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection