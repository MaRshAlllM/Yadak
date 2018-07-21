@extends('layouts.admin')

@section('content')

    <form action="" method="post">

        <input type="text" name="title" placeholder="مشخصه کالا">
        @csrf
        <input type="submit" value="ارسال">

    </form>

@endsection()