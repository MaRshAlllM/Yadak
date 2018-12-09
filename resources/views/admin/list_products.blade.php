@extends('layouts.admin')

@section('content')

    @if(!is_null(Session::get('message')))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif

    @if($products->count() == 0)
        هیج محصولی یافت نشد.
    @else
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    لیست محصولات
                </header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>تصویر</th>
                            <th>عملیات</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($products as $prod)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$prod->title}}</td>
                                <td><img src="{{URL::to('/')}}/application/public/uploads/{{$prod->image}}" width="150"></td>
                                <td><a class="btn btn-success" href="/root/image_gallery/{{$prod->id}}"><i class="icon-picture"></i></a></td>
                                  <td>
                                    <a class="btn btn-info"href="{{route('products.edit',$prod->id)}}"><i class="icon-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{route('products.destroy',$prod->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟');"><i class="icon-remove"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php @$i++ ?>
                        @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </section>
        </div>
    @endif
@endsection