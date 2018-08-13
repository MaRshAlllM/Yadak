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
                            
                            <div class="row">
                                
                            <div class="col-5">
                                <a href="#"><img src="/uploads/{{$product->image}}" class="img-fluid"></a>
                                <div class="row  py-1">
                                    @foreach($gallery as $g)
                                    <div class="col-3 my-1">
                                        <a href="/uploads/{{$g->image_name}}" target="_blank"><img src="/uploads/{{$g->image_name}}" class="img-fluid"></a>
                                    </div>
                                    @endforeach
                                </div>
                                <a href="/addcompare/{{$product->id}}" class="btn btn-danger btn-sm"><i class="fas fa-plus"></i> افرودن به مقایسه محصول</a>
                            </div>
                            <div class="col-7">
                               <form action="/addcart/{{$product->id}}" method="post">
                                <h1>{{$product->title}}</h1>
                                <input type="hidden" name="title" value="{{$product->title}}">
                                <div class="asimplerow add-comment py-1">
                                    <span>یک نظر</span> 
                                    <a href="#" class="mx-3">نظر خود را اضافه کنید</a>
                                </div>
                                <div class="asimplerow py-2 mojodi">
                                    <!-- <b>ناموجود</b> -->
                                        <!--<div class="price">قیمت : 200 هزار تومان
                                            <span class="discount mx-3">5555تومان</span>
                                        </div>-->

                                    <div class="variable py-2">قیمت</div>
                                        <select class="form-control" name="price">

                                            @foreach(unserialize($product->price) as $key=>$var)
                                                    <option value="<?php
                                                    if($product->discount == null){
                                                        if(empty($key)){$key="ندارد";}
                                                        echo "$key"."-"."$var";
                                                    }else{
                                                        if(empty($key)){$key="ندارد";}
                                                        $d = $product->discount;
                                                        $dis = $var - ($var*$d/100);
                                                        echo "$key"."-"."$dis" ;
                                                    }
                                                    ?>">

                                                        <?php
                                                        if($product->discount == null){
                                                        echo "$key"." "."$var";
                                                        }else{
                                                            $d = $product->discount;
                                                            $dis = $var - ($var*$d/100);
                                                            echo "$key"." "."$var". " تومان - " . " قیمت با تخفیف:  $dis" ;
                                                        }
                                                        ?> تومان


                                                    </option>
                                            @endforeach

                                        </select>
                                        
                                </div>
                                <div class="asimplerow description py-2">
                                    {!!$product->body!!}
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
                            {!!$product->full_body!!}
                        </div>                      

                     </div>

                </div>

                <div class="row py-3" id="main-content">

                    <div class="col-4 box">
                        <div class="inner-box">
                            <img src="img/a.jpg" class="img-fluid">
                            <div class="hidden-details"></div>
                            <div class="body">
                                <h4>عنوان محصول</h4>
                                <span class="price">قیمت : 20,000 تومان</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-4 box">
                        <div class="inner-box">
                            <img src="img/b.jpg" class="img-fluid">
                            <div class="body">
                                <h4>عنوان محصول</h4>
                                <span class="price">قیمت : 20,000 تومان</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-4 box">
                        <div class="inner-box">
                            <img src="img/c.jpg" class="img-fluid">
                            <div class="body">
                                <h4>عنوان محصول</h4>
                                <span class="price">قیمت : 20,000 تومان</span>

                            </div>
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
