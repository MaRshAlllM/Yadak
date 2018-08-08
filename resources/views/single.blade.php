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
                                <a href="#"><img src="img/a.jpg" class="img-fluid"></a>
                                <div class="row  py-1">

                                    <div class="col-3 my-1">
                                        <a href="#"><img src="img/b.jpg" class="img-fluid"></a>
                                    </div>
                                    <div class="col-3 my-1">
                                        <a href="#"><img src="img/c.jpg" class="img-fluid"></a>
                                    </div>
                                    <div class="col-3 my-1">
                                        <a href="#"><img src="img/d.jpg" class="img-fluid"></a>
                                    </div>
                                    <div class="col-3 my-1">
                                        <a href="#"><img src="img/a.jpg" class="img-fluid"></a>
                                    </div>


                                </div>
                            </div>
                            <div class="col-7">
                                
                                <h1>عنوان محصول</h1>

                                <div class="asimplerow add-comment py-1">
                                    <span>یک نظر</span> 
                                    <a href="#" class="mx-3">نظر خود را اضافه کنید</a>
                                </div>
                                <div class="asimplerow py-2 mojodi">
                                    <!-- <b>ناموجود</b> -->
                                        <div class="price">قیمت : 200 هزار تومان
                                            <span class="discount mx-3">300 هزار تومان</span>
                                        </div>

                                    <!--    <div class="variable py-2">محصول متغییر است</div>
                                        <select class="form-control">
                                            <option>رنگ قرمز - 1000 تومان</option>
                                            <option>رنگ سیاه - 1000 تومان</option>
                                            <option>رنگ سفید - 1000 تومان</option>
                                            <option>رنگ صورتی - 1000 تومان</option>
                                        </select> -->
                                        
                                </div>
                                <div class="asimplerow description py-2">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                </div>

                                <div class="asimplerow py-2">
                                    
                                    <div class="input-group">
                                          <input type="number" class="form-control col-4" value="1" min="1" max="10">
                                          <div class="input-group-prepend">
                                            <button class="btn btn-custom-red">افزودن به سبد خرید</button>
                                        </div>
                                    </div>  
                                            
                                </div>  
                                            

                            </div>  

                            </div>

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
