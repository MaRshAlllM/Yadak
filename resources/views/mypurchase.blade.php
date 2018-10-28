@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{auth()->user()->name}} به پنل کاربری خوش آمدید.</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-info" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/mypurchase" class="btn btn-secondary"><i class="fas fa-shopping-cart"></i>خرید های انجام شده</a>
                        <a href="#" class="btn btn-secondary"><i class="fas fa-user"></i>

                            ویرایش پروفایل</a>

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
                            <br>

                            @if(!is_null(Session::get('message')))
                                <div class="alert alert-success" style="margin-top: 10px;">
                                    {{Session::get('message')}}
                                </div>
                            @endif

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">شناسه فاکتور</th>
                                    <th scope="col">تاریخ</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">جزئیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($factor as $row){
                                ?>


                                <tr>
                                    <th scope="row">1</th>
                                    <td><?php echo $row->identifier; ?></td>
                                    <td><?php echo $row->updated_at ?></td>
                                    <td><?php echo $row->status; ?></td>
                                    <td><a href="pdetail/<?php echo $row->identifier; ?>">مشاهده</a></td>
                                </tr>
                                <?php
                                }
                                ?>

                                </tbody>
                            </table>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
