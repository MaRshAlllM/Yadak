@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{auth()->user()->name}} به پنل کاربری خوش آمدید.</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-info" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/mypurchase" class="btn btn-secondary"><i class="fas fa-shopping-cart"></i>خرید های انجام شده</a>
                        <a href="/profile" class="btn btn-secondary"><i class="fas fa-user"></i>

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

                        <table class="table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام کالا</th>
                                <th scope="col">تعداد</th>
                                <th scope="col">قیمت واحد</th>
                                <th scope="col">مجموع</th>
                                <th scope="col">مشخصه</th>
                                <th scope="col">شناسه فاکتور</th>
                                <th scope="col">تاریخ</th>
                                <th scope="col">وضعیت</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach($pd as $row){
                            ?>


                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $row->content; ?></td>
                                <td><?php echo $row->qty; ?></td>
                                <td><?php echo $row->price; ?></td>
                                <td><?php echo $row->subtotal; ?></td>
                                <td><?php if(empty($row->feature)){echo "ندارد";}else{echo $row->feature;} ?></td>
                                <td><?php echo $row->identifier; ?></td>
                                <td>{{jDate::forge($row->updated_at)->format('%d %B %Y - H:i')}}</td>
                                <td><?php if($row->status == "پرداخت حضوری"){
                                        echo"<span style=\"color:red;\">";
                                        echo $row->status;
                                        echo"</span>";
                                    }else{
                                        echo $row->status;
                                    } ?></td>
                            </tr>
                            <?php
                            $i++;
                            }
                            ?>

                            </tbody>
                        </table>
                         مجموع کل پرداختی: <?php echo $row->total; ?> تومان




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
