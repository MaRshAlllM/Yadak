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

            <div class="col-3 right-col">

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




            </div>

            <div class="col-9 left-col">
                <div class="row py-3" id="main-content">
                    @foreach($categories->slice($categories->toArray()["from"] - 1,$categories->toArray()["per_page"] ) as $category)
                    <div class="col-lg-4 col-md-8 col-sm-12  box my-1">
                        <div class="inner-box py-3">
                            <img src="{{route('index')}}/application/public/uploads/{{$category->image}}" class="img-fluid">
                            <div class="hidden-details"></div>
                            <div class="body">
                                <h4><a href="/single/{{$category->id}}">{{$category->title}}</a></h4>
                                <span class="price">

                                            <?php $first = true; ?>
                                            @foreach(unserialize($category->price) as $key=>$var)
                                                <?php
                                                if($first == true){
                                                    if($category->discount == null){

                                                        echo "$key"." "."$var";

                                                    }else{

                                                        $d = $category->discount;

                                                        $dis = $var - ($var*$d/100);

                                                        echo "<span style=\"color:red\">"."<strike>"."$key"." "."$var". "تومان"."</strike> " . "</span>" . "    $dis " ;

                                                    }
                                                    $first = false;
                                                }
                                                ?> تومان
                                            @endforeach
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
                {{$categories->links()}}

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
