@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">

                <header class="panel-heading">
                    ایجاد دسته بندی جدید
                </header>
                <div class="panel-body">

                    @if(!is_null(Session::get('message')))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif

                    @if($errors->all())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)

                                <li class="list-group-itemr">{{$error}}</li>

                            @endforeach
                        </ul>
                    @endif

                    <form action="{{Route('categories.update',$toupdate->id)}}" method="post" role="form">
                        <div class="form-group">
                            <label for="categoryname">دسته بندی جدید</label>
                            <input type="text" name="name" class="form-control" id="categoryname" value="{{$toupdate->name}}">
                            @method('put');
                            @csrf
                            <label for="categoryslug">نامک</label>
                            <input type="text" name="slug" class="form-control" id="categoryslug" value="{{$toupdate->slug}}">
                            <label for="inputGroupSelect01">مادر دسته :</label>
                            <select class="form-control" id="inputGroupSelect01" name="p_id">
                                <option class="form-control" value="" selected>انتخاب مادر دسته</option>
                                @foreach($categoryInfact as $cat)

                                    <option class="form-control" value="{{$cat->id}}">{{$cat->name}}</option>

                                @endforeach
                            </select>
                            <label for="categoryname">توضیحاتی در مورد دسته بندی</label>
                            <textarea name="description" class="form-control">{{$toupdate->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info">ارسال</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection()