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
    <form action="/admin/roles" method="post">
        {{ csrf_field() }}
        <div class="mb-3 mt-3">
            <label for="slug" class="form-label">slug:</label>
            <input type="text" class="form-control" id="slug" placeholder="Enter slug" name="slug" value="{{ old('slug') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">نام:</label>
            <input type="text" class="form-control" id="name" placeholder="نام..." name="name" value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-primary">ارسال</button>
        <a href="/admin/roles" class="btn btn-info">لیست نقش ها</a>
    </form>

</div>


@endsection