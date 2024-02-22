@extends('master')

@section('content')


<div class="col-lg-12">
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
                    <th>Name</th>
                    <th>action</th>
                </tr>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="/permisions/{{ $role->id }}" class="btn btn-info">Edit</a>
                        <form action="/permisions/{{ $role->id }}" method="post">
                            @method('DELETE') {{ csrf_field() }}
                            <input type="hidden" value="{{ $role->id }}">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>



@endsection