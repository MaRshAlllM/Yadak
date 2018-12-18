@extends('layouts.admin')

@section('content')

    @if(!is_null(Session::get('message')))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif

    @if($user->count() == 0)
        هیج کاربری یافت نشد.
    @else
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    مشخصات کاربر
                </header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام و نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>شماره عضویت</th>
                            <th>آدرس</th>
                            <th>شغل</th>
                            <th>تلفن</th>
                            <th>موبایل</th>
                            <th>تاریخ عضویت</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($user as $user)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->subscription}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->job}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->cellphone}}</td>
                                <td>{{jDate::forge($user->created_at)->format('%d %B %Y')}}</td>

                            </tr>
                            <?php @$i++ ?>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </section>
        </div>
    @endif
@endsection