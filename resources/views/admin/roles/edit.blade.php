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
        <form action="/admin/roles/{{ $role->id }}" method="post">
            {{ csrf_field() }} @method('PUT')
            <div class="mb-3 mt-3">
                <label for="slug" class="form-label">slug:</label>
                <input type="text" class="form-control" id="slug" placeholder="Enter slug" name="slug" value="{{ $role->slug }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $role->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/admin/roles" class="btn btn-info">Role List</a>
        </form>

    </div>

</body>

</html>