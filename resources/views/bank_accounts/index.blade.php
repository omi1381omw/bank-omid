<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bank Omid</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="antialiased">
    <div style="margin-top: 20px;">
        <div class="col-lg-12">
            <p>
                <a href="/bank_accounts/create" class="btn btn-info">Create Bank Account</a>
            </p>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>User Owner</th>
                    <th>Account Number</th>
                    <th>Sehba Number</th>
                    <th>Cart Number</th>
                    <th>Balance</th>
                    <th>Register Data</th>
                    <th>Action</th>
                </tr>
                @foreach($bankAccounts as $bankAccount)
                <tr>
                    <td>{{ $bankAccount->id }}</td>
                    <td>{{ $bankAccount->user?->name }}</td>
                    <td>{{ $bankAccount->account_number }}</td>
                    <td>{{ $bankAccount->sheba }}</td>
                    <td>{{ $bankAccount->cart }}</td>
                    <td>{{ $bankAccount->balance }}</td>
                    <td>{{ $bankAccount->created_at }}</td>
                    <td>
                        <a href="/bank_accounts/{{ $bankAccount->id }}" class="btn btn-info">Edit</a>
                        <form action="/bank_accounts/{{ $bankAccount->id }}" method="post">
                            @method('DELETE') {{ csrf_field() }}
                            <input type="hidden" value="{{ $bankAccount->id }}">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>