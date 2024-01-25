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
                <a href="/roles/create" class="btn btn-info">Create role</a>
            </p>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>slug</th>
                    <th>name</th>
                    <th>Action</th>
                </tr>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->slug }}</td>
                    <td>{{ $role->name }}</td>

                    <td>
                        <a href="/roles/{{ $role->id }}" class="btn btn-info">Edit</a>
                        <form action="/roles/{{ $role->id }}" method="post">
                            @method('DELETE') {{ csrf_field() }}
                            <input type="hidden" value="{{ $role->id }}">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>