@extends('layouts.admin')

@section('content')

@if(!is_null(Session::get('message')))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
@endif

@if($features->count() == 0)
    هیج مشخصه ای یافت نشد.
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
                    <td>
                        <form action="{{route('feature.destroy',$feature->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟');"><i class="icon-remove"></i></button>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-info"href="{{route('feature.edit',$feature->id)}}"><i class="icon-edit"></i></a>
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