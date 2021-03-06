@extends('layouts.app')

@section('content')
    <div class="container py-3" id="threecol-offer">

        <div class="row">

            <div class="col-lg-4 col-md-12">
                <a href="/transport" style="color: rgba(21,13,15,0.86);text-decoration: none;">
                <i class="fas fa-shuttle-van fa-2x"></i>
                حمل و نقل محصولات بصورت رایگان
                </a>
            </div>
            <div class="col-lg-4 col-md-12">
                <a href="/discount" style="color: rgba(21,13,15,0.86);text-decoration: none;">
                <i class="fas fa-users fa-2x"></i>
                تخفیفات ویژه ی سایت
                </a>
            </div>
            <div class="col-lg-4 col-md-12">
                <a href="/support" style="color: rgba(21,13,15,0.86);text-decoration: none;">
                <i class="fas fa-clock fa-2x"></i>
                پشتیبانی 24 ساعته در 7 روز هفته
                </a>
            </div>
            
        </div>


    </div>

    <div class="container" id="main-contents">

                <div class="row">

                    <div class="col-12">
                        
                       <div id="carouselExampleFade" class="carousel slide carousel-slide" data-ride="carousel">

                      <div class="carousel-inner">
                          <?php
                          $i = true;
                          foreach($slideshow as $row){
                          ?>
                        <div class="carousel-item <?php if($i == true){echo"active";} ?>">
                          <img class="d-block w-100" src="application/public/uploads/<?php echo $row->image; ?>" alt="First slide" style="max-height: 300px">
                          <div class="carousel-caption d-none d-md-block">
                            <!-- <h5>عنوان</h5> -->
                            <!-- <p>توضیحات اسلاید</p> -->
                            <!-- <a href="" class="btn btn-custom-red-wr">بیشتر</a> -->
                          </div>
                        </div>
                          <?php
                            $i = false;
                            }
                          ?>

                      </div>
                      </div>
                      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">بعدی</span>
                      </a>
                      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">قبلی</span>
                      </a>
                    </div>

                </div>

        <div class="row">

            <div class="col-lg-3 col-md-12 right-col py-3">

                <div class="box">
                    <div class="title">
                        دسته بندی های محصولات
                    </div>
                    <div class="body">
                        <!-- <ul class="list-group list-group-flush">
                        
                            <li class="list-group-item"><a href="#"><strong>تخفیف خورده</strong></a></li>
                            <li class="list-group-item"><a href="#"><strong>ویژه این هفته</strong></a></li>
                            <li class="list-group-item"><a href="#">قطعه ی تست</a></li>
                            <li class="list-group-item"><a href="#"> قطعه ی دو</a></li>
                            <li class="list-group-item"><a href="#"> ماشین یک</a></li>
                            <li class="list-group-item"><a href="#"> حضرت راکیم</a></li>
                            <li class="list-group-item"><a href="#"> امام جکسون <span class="badge"><i class="fas fa-angle-left"></i></span></a></li>
                            <li class="list-group-item"><a href="#"> خدای رپ <span class="badge"><i class="fas fa-angle-left"></i></span></a></li>
                            <li class="list-group-item"><a href="#"> تیلور سویفت <span class="badge"><i class="fas fa-angle-left"></i></span></a></li>

                    
                        </ul> -->
                        {{sortMyCatInHtmlMenu()}}
                    </div>
                </div>


                <div style="text-align: center; border-top: 1px solid #ddd;margin-top: 10px;padding-top: 5px;font-size: 12px;">
                    پرفروش ترین محصولات
                <?php
                foreach($most as $row){
                ?>
                <div class="img-thumbnail" style="text-align: center; font-size: 12px;margin-bottom: 5px;margin-top: 5px">

                    <a href="/single/{{$row->id}}"><img src="application/public/uploads/<?php echo $row->image; ?>" class="img-fluid"></a>
                    <div style="padding: 5px;"><a href="/single/{{$row->id}}">{{$row->title}}</a></div>
                </div>
                <?php
                }
                ?>
                </div>


        </div>

            <div class="col-lg-9 col-md-12 left-col">



                <div class="row py-3" id="main-content">


                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-8 col-sm-12  box my-1">
                        <div class="inner-box py-3">
                            <img src="application/public/uploads/{{$product->image}}" class="img-fluid">
                            <div class="hidden-details"></div>
                            <div class="body">
                                <h4><a href="/single/{{$product->id}}">{{$product->title}}</a></h4>
                                <span class="price">

                                    <?php $first = true; ?>
                                    @foreach(unserialize($product->price) as $key=>$var)
                                        <?php
                                        if($first == true){

                                            if($product->discount == null){

                                                echo "$key"." "."$var";

                                            }else{

                                                $d = $product->discount;

                                                $dis = $var - ($var*$d/100);

                                                echo "<span style=\"color:red\">"."<strike>"."$key"." "."$var". "تومان"."</strike> " . "</span>" . "    $dis "  ;

                                            }
                                            $first = false;
                                        }

                                        ?> تومان
                                    @endforeach

                                        <?php /* $first = true; ?>
                                        @foreach(unserialize($product->price) as $var)
                                            <?php
                                            if ( $first == true )
                                                {
                                                echo $var;
                                                $first = false;
                                                }

                                        @endforeach */?>


                                </span>

                            </div>
                        </div>

                    </div>
                @endforeach

                <!-- <div class="col-4 box">
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
                    </div> -->

                </div>
                {{$products->links()}}
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
