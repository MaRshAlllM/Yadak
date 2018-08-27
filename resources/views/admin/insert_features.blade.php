@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    ایجاد مشخصه جدید
                </header>
                <div class="panel-body">
                      @if(!is_null(Session::get('message')))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                    @endif
                        @if (count($errors) > 0)
                            <div class = "alert alert-danger">
                                     {{ $errors->first('title') }}
                            </div>
                        @endif
                    <form action="{{Route('feature.store')}}" method="post" role="form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">مشخصه جدید</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="مشخصه کالا">
                            @csrf
                        </div>
                        <button type="submit" class="btn btn-info">ارسال</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection()