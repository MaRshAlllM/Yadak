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
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($products as $prod)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$prod->title}}</td>
                                <td><img src="{{URL::to('/')}}/uploads/{{$prod->image}}" width="150"></td>
                                <td><a class="btn btn-success" href="/root/image_gallery/{{$prod->id}}"><i class="icon-picture"></i></a></td>
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