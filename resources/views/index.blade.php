@extends('layouts.app')

@section('content')
    <div class="container py-3" id="threecol-offer">

        <div class="row">

            <div class="col-4">
                <i class="fas fa-shuttle-van fa-2x"></i>
                حمل و نقل محصولات بصورت رایگان
            </div>
            <div class="col-4">
                <i class="fas fa-users fa-2x"></i>
                تخفیفات ویژه ی سایت
            </div>
            <div class="col-4">
                <i class="fas fa-clock fa-2x"></i>
                پشتیبانی 24 ساعته در 7 روز هفته
            </div>
            
        </div>


    </div>

    <div class="container" id="main-contents">


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

                    <div class="col-9">
                        
                       <div id="carouselExampleFade" class="carousel slide carousel-slide" data-ride="carousel">

                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="img/car.jpeg" alt="First slide">
                          <div class="carousel-caption d-none d-md-block">
                            <!-- <h5>عنوان</h5> -->
                            <!-- <p>توضیحات اسلاید</p> -->
                            <!-- <a href="" class="btn btn-custom-red-wr">بیشتر</a> -->
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="img/car2.jpg" alt="Second slide">
                          <div class="carousel-caption d-none d-md-block">
                            <!-- <h5>عنوان</h5> -->
                            <!-- <p>توضیحات اسلاید</p> -->
                          </div>
                        </div>
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

                    <div class="col-3" id="special-offers">
                        <img src="img/0.jpg" class="img-fluid">
                        <img src="img/2.jpg" class="img-fluid">
                        <img src="img/3.jpg" class="img-fluid">
                    </div>


                    </div>

                <div class="row py-3" id="main-content">


                    @foreach($products as $product)
                    <div class="col-4 box">
                        <div class="inner-box">
                            <img src="uploads/{{$product->image}}" class="img-fluid">
                            <div class="hidden-details"></div>
                            <div class="body">
                                <h4><a href="{{$product->slug}}">{{$product->title}}</a></h4>
                                <span class="price">قیمت : <?php $price = unserialize($product->price); ?> {{$price[""]}} تومان</span>

                            </div>
                        </div>
                    @endforeach

                    </div>
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