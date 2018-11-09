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
                            <h1>حمل و نقل محصولات به صورت رایگان</h1>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>

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
