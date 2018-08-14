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
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item"><a href="#"><strong>تخفیف خورده</strong></a></li>
                            <li class="list-group-item"><a href="#"><strong>ویژه این هفته</strong></a></li>
                            <li class="list-group-item"><a href="#">قطعه ی تست</a></li>
                            <li class="list-group-item"><a href="#"> قطعه ی دو</a></li>
                            <li class="list-group-item"><a href="#"> ماشین یک</a></li>
                            <li class="list-group-item"><a href="#"> حضرت راکیم</a></li>
                            <li class="list-group-item"><a href="#"> امام جکسون <span class="badge"><i class="fas fa-angle-left"></i></span></a></li>
                            <li class="list-group-item"><a href="#"> خدای رپ <span class="badge"><i class="fas fa-angle-left"></i></span></a></li>
                            <li class="list-group-item"><a href="#"> تیلور سویفت <span class="badge"><i class="fas fa-angle-left"></i></span></a></li>


                        </ul>
                    </div>

                </div>

                <div class="box">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">لینک های تستی</a>
                    </div>

                </div>



            </div>

            <div class="col-9 left-col">

                <div class="row">

                    <div class="col-12">

                        <div id="single-box">
                         @if(isset($product))
                            @foreach($product as $row)



                                    <div class="row">

                                        <div class="col-5">
                                            <a href="#"><img src="/uploads/{{$row->image}}" class="img-fluid"></a>

                                        </div>
                                        <div class="col-7">
                                            <form action="/addcart/{{$row->id}}" method="post">
                                                <h1>{{$row->title}}</h1>
                                                <input type="hidden" name="title" value="{{$row->title}}">

                                                <div class="asimplerow py-2 mojodi">
                                                    <!-- <b>ناموجود</b> -->
                                                    <!--<div class="price">قیمت : 200 هزار تومان
                                                        <span class="discount mx-3">5555تومان</span>
                                                    </div>-->

                                                    <div class="variable py-2">قیمت</div>
                                                    <select class="form-control" name="price">

                                                        @foreach(unserialize($row->price) as $key=>$var)
                                                            <option value="<?php
                                                            if($row->discount == null){
                                                                if(empty($key)){$key="ندارد";}
                                                                echo "$key"."-"."$var";
                                                            }else{
                                                                if(empty($key)){$key="ندارد";}
                                                                $d = $row->discount;
                                                                $dis = $var - ($var*$d/100);
                                                                echo "$key"."-"."$dis" ;
                                                            }
                                                            ?>">

                                                                <?php
                                                                if($row->discount == null){
                                                                    echo "$key"." "."$var";
                                                                }else{
                                                                    $d = $row->discount;
                                                                    $dis = $var - ($var*$d/100);
                                                                    echo "$key"." "."$var". " تومان - " . " قیمت با تخفیف:  $dis" ;
                                                                }
                                                                ?> تومان


                                                            </option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                                <div class="asimplerow description py-2">
                                                    {!!$row->body!!}
                                                </div>

                                                <div class="asimplerow py-2">

                                                    <div class="input-group">
                                                        <input type="number" name="number" class="form-control col-4" value="1" min="1" max="10">
                                                        <div class="input-group-prepend">
                                                            @csrf
                                                            <button type="submit" class="btn btn-custom-green">افزودن به سبد خرید</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                <hr>
                            @endforeach
                                <div><a href="/delcompare" class="btn btn-info btn-sm">حذف تمامی محصولات مقایسه شده</a></div>
                         @else
                                فعلا موردی جهت مقایسه اضافه نشده است. جهت مقایسه به صفحه محصول مراجعه کرده و دکمه افزودن به مقایسه محصولات را کلیک کنید.
                         @endif


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
