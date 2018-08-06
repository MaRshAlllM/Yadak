@extends('layouts.admin')

@section('content')

    @if(!is_null(Session::get('message')))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif


        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    محصول
                </header>
                <form action="" method="post" enctype="multipart/form-data" style="padding: 10px;line-height: 35px;">
                    <input type="file" name="image-1">
                    <input type="file" name="image-1">
                    <input type="file" name="image-1">
                    <input type="file" name="image-1">
                </form>
            </section>
        </div>
@endsection