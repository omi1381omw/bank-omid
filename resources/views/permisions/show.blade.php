@extends('master')

@section('content')

<div class="col-lg-6">

<div class="row">
    <h3>{{ $user->name }}</h3>
</div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card card-info">
        <form method="post" action="" class="form-horizontal">
            {{ csrf_field() }}
            <input name="user_id" type="hidden" value="{{ $user->id }}">
            <div class="card-body">
                <div class="form-group row">
                    <label for="roles" class="col-sm-3 control-label">انتخاب نقش</label>
                    <div class="col-sm-9">
                        <select class="custom-select" name="role_id">
                            <option value="0">بدون نقش</option>
                            @foreach($rolesList as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success">ارسال</button>
                <a href="/users" class="btn btn-info">لیست کاربر ها</a>
            </div>
        </form>
    </div>
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>نام</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <form action="/permisions/{{ $user->id }}" method="post">
                                @method('DELETE') {{ csrf_field() }}
                                <input name="role_id" type="hidden" value="{{ $role->id }}">
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

@endsection