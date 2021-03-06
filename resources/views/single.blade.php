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

                <div style="text-align: center; border-top: 1px solid #ddd;margin-top: 10px;padding-top: 5px;font-size: 12px;">
                    پرفروش ترین محصولات
                    <?php
                    foreach($most as $row){
                    ?>
                    <div class="img-thumbnail" style="text-align: center; font-size: 12px;margin-bottom: 5px;margin-top: 5px">

                        <a href="/single/{{$row->id}}"><img src="/application/public/uploads/<?php echo $row->image; ?>" class="img-fluid"></a>
                        <div style="padding: 5px;"><a href="/single/{{$row->id}}">{{$row->title}}</a></div>
                    </div>
                    <?php
                    }
                    ?>
                </div>


            </div>

            <div class="col-9 left-col">

                <div class="row">

                    <div class="col-12">
                        
                        <div id="single-box">
                            
                            <div class="row">
                                
                            <div class="col-5">
                                <a href="/application/public/uploads/{{$product->image}}" data-lightbox="roadtrip"><img src="/application/public/uploads/{{$product->image}}" class="img-fluid"></a>
                                <div class="row  py-1">
                                    @foreach($gallery as $g)
                                    <div class="col-3 my-1">
                                        <a href="/application/public/uploads/{{$g->image_name}}"  data-lightbox="roadtrip"><img src="/application/public/uploads/{{$g->image_name}}"></a>
                                    </div>
                                    @endforeach
                                </div>
                                <a href="/addcompare/{{$product->id}}" class="btn btn-danger btn-sm" style="margin-bottom: 10px;"><i class="fas fa-plus"></i> افرودن به مقایسه محصول</a>
                            </div>
                            <div class="col-7">
                               <form action="/addcart/{{$product->id}}" method="post">
                                <h1>{{$product->title}}</h1>
                                <input type="hidden" name="title" value="{{$product->title}}">
                                <div class="asimplerow add-comment py-1">
                                    <!--<span>یک نظر</span>
                                    <a href="#" class="mx-3">نظر خود را اضافه کنید</a>-->
                                </div>
                                <div class="asimplerow py-2 mojodi">
                                    <!-- <b>ناموجود</b> -->
                                        <!--<div class="price">قیمت : 200 هزار تومان
                                            <span class="discount mx-3">5555تومان</span>
                                        </div>-->

                                    <div class="variable py-2" style="color: #ff0012;"><?php if(!empty($product->discount)){echo "<i class=\"fas fa-plus\"></i> " . "قیمت با احتساب ". $product->discount . " درصد تخفیف"; ?> </div>

                                    <div style="margin-bottom: 10px">
                                    <strike>
                                    <?php $first = true; ?>
                                    @foreach(unserialize($product->price) as $key=>$var)

                                            <?php
                                            if($first = true){
                                                if($product->discount == null){
                                                    echo "";
                                                }else{

                                                    echo "$key"." "."$var";
                                                }
                                            $first = false;
                                            }
                                            ?> تومان
                                    @endforeach
                                    </strike>
                                    </div>
                                    <?php } ?>







                                        <select class="form-control" name="price">

                                            @foreach(unserialize($product->price) as $key=>$var)
                                                    <option value="<?php
                                                    if($product->discount == null){
                                                        if(empty($key)){$key="";}
                                                        echo "$key"."-"."$var";
                                                    }else{
                                                        if(empty($key)){$key="";}
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
                                    <?php $n = $product->number; ?>
                                    <div class="input-group">
                                          <input type="number" name="number" class="form-control col-4" value="1" min="1" max="10">
                                          <div class="input-group-prepend">
                                              @csrf
                                            <button type="submit" class="btn btn-custom-green" <?php if(!$n > 0 ){echo"disabled";} ?>>افزودن به سبد خرید</button>
                                        </div>
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <i class="fas fa-shopping-cart"></i> وضعیت:
                                     <?php
                                       if($n > 0){
                                           echo"<span style=\"color:green\">";
                                           echo"موجود";
                                           echo"</span>";
                                       }else{
                                           echo"<span style=\"color:red\">";
                                           echo"اتمام موجودی";
                                           echo"</span>";
                                       }
                                     ?>
                                    </div>
                                            
                                </div>  

                                </form>
                            </div>  

                            </div>
                            {!!$product->full_body!!}
                        </div>                   

                     </div>

                </div>
                <div class="row py-3">
                    <div class="col-12">

                        <div id="single-box">

                            <table class="table table-bordered">
                              <thead>
                                <tr>
                             
                                  <th scope="col">ویژگی</th>
                                  <th scope="col">توضیحات</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($product->features as $feature)
                                <tr>
                                  <td>{{$feature->title}}</td>
                                  <td>{{$feature->pivot->value}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="row">
                <div class="col-12">
                    <div id="single-box">
                        @foreach($product->comments as $comment)
                            <div class="card w-100 my-2">
                              <div class="card-body">
                                <strong class="card-title">{{$comment->user()->get()->first()->name}}</strong>
                                <p class="card-text">{{$comment->content}}</p>
                              </div>
                              <div class="card-footer text-muted">
                                {{jDate::forge($comment->created_at)->format(' %d %B %Y')}}
                              </div>
                            </div>
                        @endforeach

                        @if($errors->first('content'))
                            <div class="alert alert-danger py-3">
                                    {{$errors->first('content')}}
                            </div>
                        @endif


                        @if(Session::get('message'))
                            <div class="alert alert-success py-3">
                                    {{Session::get('message')}}
                            </div>
                        @endif

                        @if(auth()->check())
                        <form action="{{route('insertcomment',$product->id)}}" method="post" class="py-3">
                            @csrf
                                <div style="margin-bottom: 5px;">متن نظر: </div>
                              <textarea name="content" class="form-control" rows="2"></textarea>
                              <button class="btn btn-primary" style="margin-top: 5px;">ارسال</button>
                        </form>
                        @else

                            <div class="alert alert-info">
                                    برای درج نظر <a href="/login">وارد</a> شوید یا <a href="/register">ثبت نام</a> کنید.
                            </div>

                        @endif

                    </div>                   

                </div>

            </div>

                {{--<div class="row py-3" id="main-content">--}}

                    {{--<div class="col-4 box">--}}
                        {{--<div class="inner-box">--}}
                            {{--<img src="img/a.jpg" class="img-fluid">--}}
                            {{--<div class="hidden-details"></div>--}}
                            {{--<div class="body">--}}
                                {{--<h4>عنوان محصول</h4>--}}
                                {{--<span class="price">قیمت : 20,000 تومان</span>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-4 box">--}}
                        {{--<div class="inner-box">--}}
                            {{--<img src="img/b.jpg" class="img-fluid">--}}
                            {{--<div class="body">--}}
                                {{--<h4>عنوان محصول</h4>--}}
                                {{--<span class="price">قیمت : 20,000 تومان</span>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-4 box">--}}
                        {{--<div class="inner-box">--}}
                            {{--<img src="img/c.jpg" class="img-fluid">--}}
                            {{--<div class="body">--}}
                                {{--<h4>عنوان محصول</h4>--}}
                                {{--<span class="price">قیمت : 20,000 تومان</span>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
                
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
