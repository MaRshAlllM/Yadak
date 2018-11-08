@extends('layouts.app')

@section('content')

    <div class="container py-3" id="main-contents">


        <div class="row">

            <div class="col-3 right-col">

                <div class="box">
                    <div class="title">
                        دسته بندی های محصولات
                    </div>
                    <div class="body">
                        {{sortMyCatInHtmlMenu()}}
                    </div>

                </div>

            </div>

            <div class="col-9 left-col">

                <div class="row">

                    <div class="col-12">

                        <div id="single-box">
                            @if(!is_null(Session::get('Message')))
                                <div class="alert alert-success">

                                    {{Session::get('Message')}}

                                </div>
                            @endif
                            @if(Cart::count() == 0)
                                <div class="alert alert-info">
                                <?php echo"سبد خرید شما خالی است."; ?>
                                </div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نام محصول</th>
                                    <th scope="col">تعداد</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col">مجموع</th>
                                    <th scope="col">مشخصه</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach(Cart::content() as $row)
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->qty}}</td>
                                        <td>{{$row->price}}</td>
                                        <td>{{$row->subtotal}}</td>
                                        <td><?php echo ($row->options->has('feature') ? $row->options->feature : ''); ?></td>
                                        <td><a href="/remove_shop_row/{{$row->rowId}}"><i class="fas fa-times"></i></a></td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="/pay" class="btn btn-success">پرداخت</a>
                            مجموع: {{Cart::subtotal()}} تومان

                        </div>

                    </div>

                </div>

                <div class="row" id="slide-products">

                    <!--            <div class="slide-products owl-theme">
                                    <div class="item"><img src="img/a.jpg" class="img-fluid"></div>
                                    <div class="item"><img src="img/b.jpg" class="img-fluid"></div>
                                    <div class="item"><img src="img/c.jpg" class="img-fluid"></div>
                                    <div class="item"><img src="img/d.jpg" class="img-fluid"></div>
                                </div>
             -->
                </div>


            </div>

        </div>

    </div>


    </div>

@endsection
