@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <section class="panel">

            <header class="panel-heading">
                ویرایش گروه کاربری
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
                <form action="{{Route('roles.update',$role->id)}}" method="post" role="form">
                    @method('put')
                    @csrf
                     <div class="form-group">
                            <input type="text" name="name" class="form-control" id="input" placeholder="نام گروه کاربری" value="{{$role->name}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="label" class="form-control" id="input" placeholder="برچسب گروه کاربری" value="{{$role->label}}">
                        </div>
                        <div class="form-group">
                            <label>دسترسی ها</label>
                            <select multiple class="form-control" name="permission[]">
                                   
                                   @foreach($permissions as $permission)

                                        @if(in_array($permission->id, array_column($role->permissions->toArray(), 'id')))
                                        <option value="{{$permission->id}}" selected="">{{$permission->label}}</option>
                                        @else
                                            <option value="{{$permission->id}}">{{$permission->label}}</option>
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