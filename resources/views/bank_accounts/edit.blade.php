<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bank Omid</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="antialiased">

    <div class="col-md-6">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/bank_accounts/{{ $bank_account->id }}" method="post">
            {{ csrf_field() }} @method('PUT')
            <div class="mb-3 mt-3">
                <label for="bank_account" class="form-label">account_number:</label>
                <input type="text" class="form-control" id="bank_account" placeholder="Enter accountNumber" name="accountNumber" value="{{ $bankAccount->account_number }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="sheba" class="form-label">sheba:</label>
                <input type="text" class="form-control" id="sheba" placeholder="Enter sheba" name="sheba" value="{{ $bankAccount->sheba }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="cart" class="form-label">cart:</label>
                <input type="text" class="form-control" id="cart" placeholder="Enter cart" name="cart" value="{{ $bankAccount->cart }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="balance" class="form-label">balance:</label>
                <input type="text" class="form-control" id="balance" placeholder="Enter balance" name="balance" value="{{ $bankAccount->balance }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/users" class="btn btn-info">User List</a>
        </form>

    </div>

</body>

</html>