@extends('layouts.admin')

@section('content')

    @if(!is_null(Session::get('message')))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif

    @if($categories->count() == 0)
        هیج دسته بندی یافت نشد.
    @else
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    لیست دسته بندی های ایجاد شده
                </header>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>نام دسته</th>
                        <th>حذف</th>
                        <th>ویرایش</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('آیا مطمئن هستید؟');"><i class="icon-remove"></i></button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('categories.edit',$category->id)}}"><i class="icon-edit"></i></a>
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