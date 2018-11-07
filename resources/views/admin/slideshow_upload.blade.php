@extends('layouts.admin')

@section('content')

    @if(!is_null(Session::get('message')))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            @foreach($slide as $g)
                <div class="col-md-2" style="margin-bottom: 10px"><img src="{{URL::to('/')}}/application/public/uploads/{{$g->image}}" width="100" height="100">
                    <a href="/root/delete_slideshow/{{$g->id}}"> <i class="icon icon-remove"></i> حذف</a></div>
            @endforeach
        </div>
    </div>

    <div class="col-sm-6">
        <section class="panel">
            <header class="panel-heading">
                مدیریت اسلاید شو
            </header>
            <form action="/root/slideshow_upload" method="post" enctype="multipart/form-data" style="padding: 10px;line-height: 35px;">
                <input type="file" name="image">
                @csrf
                <input type="submit" value="ارسال" class="btn btn-success">
            </form>
        </section>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection