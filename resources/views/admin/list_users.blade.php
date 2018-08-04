@extends('layouts.admin')

@section('content')

    @if(!is_null(Session::get('message')))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif

    @if($users->count() == 0)
        هیج کاربری یافت نشد.
    @else
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    لیست کاربران
                </header>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>نام و نام خانوادگی</th>
                        <th>حذف</th>
                        <th>ویرایش</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                #
                            </td>
                            <td>
                                #
                            </td>
                        </tr>
                        <?php @$i++ ?>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    @endif
@endsection