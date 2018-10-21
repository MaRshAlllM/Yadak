@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">



                <header class="panel-heading">
                     ویرایش نظر
                </header>
                <div class="panel-body">
                    @if(!is_null(Session::get('message')))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form action="{{Route('edit_comment',$id->id)}}" method="post" role="form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ویرایش</label>
                            <textarea class="form-control" name="content">{{$id->content}}</textarea>
                            {{ $errors->first('content') }}
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