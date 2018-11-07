@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{auth()->user()->name}} به پنل کاربری خوش آمدید.</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/mypurchase" class="btn btn-secondary"><i class="fas fa-shopping-cart"></i>خرید های انجام شده</a>
                        <a href="/profile" class="btn btn-secondary"><i class="fas fa-user"></i>ویرایش پروفایل</a>

                        @if(auth()->user()->roles()->get()->isNotEmpty())
                            <a href="{{URL('root')}}" class="btn btn-secondary"><i class="fas fa-star"></i>صفحه مدیریت</a>
                        @endif


                        <a class="btn btn-info" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> خروج
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <p>

                            @if(!is_null(Session::get('message')))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif

                        <?php
                        foreach($user as $row){
                        ?>
                        <!----- form -------->

                            <form method="POST" action="{{ route('profile_edit') }}" aria-label="ثبت نام">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">نام و نام خانوادگی</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="<?php echo $row->name; ?>" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">آدرس ایمیل (غیر قابل تغییر)</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="<?php echo $row->email; ?>" required disabled>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">آدرس</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="<?php echo $row->address; ?>" required>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="job" class="col-md-4 col-form-label text-md-right">شغل</label>

                                    <div class="col-md-6">
                                        <input id="job" type="text" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" name="job" value="<?php echo $row->job; ?>" required>

                                        @if ($errors->has('job'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('job') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">تلفن</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="<?php echo $row->phone; ?>" required>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cellphone" class="col-md-4 col-form-label text-md-right">تلفن همراه</label>

                                    <div class="col-md-6">
                                        <input id="cellphone" type="text" class="form-control{{ $errors->has('cellphone') ? ' is-invalid' : '' }}" name="cellphone" value="<?php echo $row->cellphone; ?>" required>

                                        @if ($errors->has('cellphone'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="col-12 btn btn-custom-red-wr">
                                            ویرایش
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <!----- form --------->
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
