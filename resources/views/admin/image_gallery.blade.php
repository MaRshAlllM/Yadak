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
                    ایجاد گالری عکس برای: {{$product->title}}
                </header>
                <form action="/root/image_gallery_upload" method="post" enctype="multipart/form-data" style="padding: 10px;line-height: 35px;">
                    <input type="file" name="image[]">
                    <input type="file" name="image[]">
                    <input type="file" name="image[]">
                    <input type="file" name="image[]">
                    <input type="hidden" name="prod_id" value="{{$product->id}}">
                    @csrf
                    <input type="submit" value="ارسال" class="btn btn-success">
                </form>
            </section>
        </div>
@endsection