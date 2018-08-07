@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    ساخت گروه کاربری جدید
                </header>
                <div class="panel-body">
                    @if(!is_null(Session::get('message')))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                             @foreach($errors->all() as $error)

                                <li>{{$error}}</li>

                             @endforeach
                        </div>
                    @endif
                    <form action="{{Route('roles.store')}}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="input" placeholder="نام گروه کاربری">
                        </div>
                        <div class="form-group">
                            <input type="text" name="label" class="form-control" id="input" placeholder="برچسب گروه کاربری">
                        </div>
                        <div class="form-group">
                            <label>دسترسی ها</label>
                            <select multiple class="form-control" name="permission[]">
                                   
                                   @foreach($permissions as $permission)

                                        <option value="{{$permission->id}}">{{$permission->label}}</option>

                                   @endforeach 

                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">ارسال</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection()