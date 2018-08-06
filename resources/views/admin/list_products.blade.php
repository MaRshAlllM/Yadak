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
                    لیست کاربران
                </header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>عملیات</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($products as $prod)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$prod->title}}</td>
                                <td></td>
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