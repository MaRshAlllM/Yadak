@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
               ویرایش کاربر
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
                <form action="{{Route('userlist.update',$userdata->id)}}" method="post" role="form">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label>نام</label>
                        <input type="text" name="name" class="form-control" value="{{$userdata->name}}">
                    </div>
                    <div class="form-group">
                        <label>ایمیل</label>
                        <input type="email" class="form-control" value="{{$userdata->email}}" disabled>
                    </div>
                    <div class="form-group">
                        <label>پسورد</label>
                        <input type="password" name="password" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>تایید پسورد</label>
                        <input type="password" name="password_confirmation" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>کدکاربری</label>
                        <input type="text" class="form-control" value="{{$userdata->subscription}}" disabled="">
                    </div>
                    <div class="form-group">
                        <label>آدرس</label>
                        <input type="text" name="address" class="form-control" value="{{$userdata->address}}">
                    </div>
                    <div class="form-group">
                        <label>شغل</label>
                        <input type="text" name="job" class="form-control" value="{{$userdata->job}}">
                    </div>
                    <div class="form-group">
                        <label>تلفن</label>
                        <input type="text" name="phone" class="form-control" value="{{$userdata->phone}}">
                    </div>
                    <div class="form-group">
                        <label>تلفن همراه</label>
                        <input type="text" name="cellphone" class="form-control" value="{{$userdata->cellphone}}">
                    </div>
                    <div class="form-group">
                        <label>زمان عضویت کاربر</label>
                        <input type="text" class="form-control" value="{{jDate::forge($userdata->created_at)->format('datetime')}}" disabled="">
                    </div>
                    <div class="form-group">
                        <label>آخرین ویرایش این کاربر</label>
                        <input type="text" class="form-control" value="{{jDate::forge($userdata->updated_at)->format('datetime')}}" disabled="">
                    </div>
                    <div class="form-group">
                        <label>سمت کاربری: </label>
                        <select multiple class="form-control" name="roles[]">

                            @foreach($roles as $role)

                                    @if(in_array($role->id, array_column($userdata->roles->toArray(), 'id')))
                                        <option value="{{$role->id}}" selected="">{{$role->label}}</option>
                                    @else
                                        <option value="{{$role->id}}">{{$role->label}}</option>
                                    @endif

                            @endforeach

                        </select>
                      
                    </div>
                        
                  
                    <button type="submit" class="btn btn-info">ویرایش</button>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection()