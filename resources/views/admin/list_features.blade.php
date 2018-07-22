@extends('layouts.admin')

@section('content')
@if($features->count() == 0)
    فعلا هیج مشخصه ای ثبت نشده است
@else
    <div class="col-sm-6">
        <section class="panel">
            <header class="panel-heading">
                لیست مشخصه های ایجاد شده
            </header>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام مشخصه</th>
                    <th>حذف</th>
                    <th>ویرایش</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($features as $feature)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$feature->title}}</td>
                    <td><a href="#"><i class="icon-remove"></i></a></td>
                    <td><a href="#"><i class="icon-edit"></i></a></td>
                </tr>
                <?php @$i++ ?>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endif
@endsection