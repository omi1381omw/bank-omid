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
        <form action="/bank_accounts" method="post">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">User Owner:</label>
                <select class="form-control" id="user_id" name="user_id">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="account_number" class="form-label">Account Number:</label>
                <input type="number" class="form-control" id="account_number" placeholder="Enter Account Number"
                    name="account_number" value="{{ old('account_number') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="sheba" class="form-label">Sheba:</label>
                <input type="number" class="form-control" id="sheba" placeholder="Enter Sheba" name="sheba"
                    value="{{ old('sheba') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="cart" class="form-label">Cart:</label>
                <input type="number" class="form-control" id="cart" placeholder="Enter Cart" name="cart"
                    value="{{ old('cart') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/bank_accounts" class="btn btn-info">Bank Account List</a>
        </form>

    </div>

</body>

</html>