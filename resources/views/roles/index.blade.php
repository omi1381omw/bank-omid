

@extends('master')

@section('content')


@if(isset($error))
<div class="alert alert-danger">
    <ul>
        <li>{{ $error }}</li>
    </ul>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div style="margin-top: 20px;">
        <div class="col-lg-12">
            <p>
                <a href="/roles/create" class="btn btn-info">ایجاد نقش</a>
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
                    <th>نام</th>
                    <th>عملیات</th>
                </tr>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->slug }}</td>
                    <td>{{ $role->name }}</td>

                    <td>
                    <div style="float: right; width: 88px; margin-right: 10px;">  

                     <a href="/roles/{{ $role->id }}" class="btn btn-info">ویرایش</a>

                    </div>

                    <div style="float: right; width: 70px; margin-right: 10px;">  

                      <form action="/roles/{{ $role->id }}" method="post">
                            @method('DELETE') {{ csrf_field() }}
                            <input type="hidden" value="{{ $role->id }}">
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection

