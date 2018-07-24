@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <section class="panel">

            @if(!is_null(Session::get('message')))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif

            <header class="panel-heading">
                ویرایش مشخصه
            </header>
            <div class="panel-body">
                <form action="{{Route('feature.update',$feature->id)}}" method="post" role="form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ویرایش</label>
                        <input type="text" name="title" class="form-control" value="{{$feature->title}}">
                        {{ $errors->first('title') }}
                        @method('put')
                        @csrf
                    </div>
                    <button type="submit" class="btn btn-info">ویرایش</button>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection()