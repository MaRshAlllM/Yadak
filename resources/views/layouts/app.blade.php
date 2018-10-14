
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'یدک بازار') }}</title>


    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">


</head>
<body>

	<!-- <div class="hiddens" style="width: 100%;height: 132px;display: none;"></div> -->
	<header id="main-header" class="sticky-top">
		<div class="container">
			<div class="row align-items-center">

				<div class="col-lg-6 col-md-12 d-none d-lg-block">بهترین محصولات با <span class="yellow">بالاترین تخفیفات</span> در پاساژ آنلاین</div>
				<div class="col-lg-6 col-md-12 top-nav navbar navbar-expand-lg">
					  <button class="navbar-toggler btn btn-light" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="fas fa-align-justify"></span>
					  </button>
					 <div class="collapse navbar-collapse justify-content-end" id="navbarToggler">
						<ul class="navbar-nav">
						  <li class="nav-item">
						    <a class="nav-link active" href="/aboutus">درباره ما</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" href="/contactus">تماس با ما</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" href="/compare">مقایسه محصول</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link disabled" href="#">آموزش</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" href="#">اپ اندروید</a>
						  </li>
						</ul>
					</div>

				</div>

			</div>

			<div class="row align-items-center py-3">
				
				<div class="col-lg-3 col-md-12">
					<a href="{{URL::to('/')}}"><img src="{{asset('img/logo.png')}}" class="img-fluid"></a>
				</div>
				<div class="col-lg-5">

					<form action="{{route('index')}}/search" method="get" id="main-form">
						<div class="input-group">
						  <input type="text" name="keyword" class="form-control" placeholder="کلید واژه مورد نظر را وارد نمایید" aria-label="" aria-describedby="basic-addon1">
						    <select name="category" class="custom-select col-4" id="inputGroupSelect01">
						    	<option selected>همه دسته ها</option>
						    	@foreach(\App\Category::all() as $category)
							    <option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							  </select>
						  <div class="input-group-prepend">
							    <button class="btn btn-custom-red" type="submit"><i class="fas fa-search"></i></button>
						  </div>
						  
						</div>
					</form>

				</div>
				<div class="col-lg-4 middle-nav">
					<ul class="nav justify-content-end">
					  <li class="nav-item">
					    <a class="nav-link active" href="/shoppingcart"><img src="{{asset('img/shopping.svg')}}">سبد خرید</a>
					  </li>
					  <li class="nav-item">
						  <div class="nav-link">
					    <img src="{{asset('img/user.svg')}}">
						  <a href="/login">ورود</a>
						  /
						  <a href="/register">عضویت</a>
						  </div>
					  </li>
		
					</ul>


				</div>
			</div>

		</div>	

	</header>


	@yield('content')




	<footer id="footer">

		<div id="brands">


			<div class="container">
				<div class="row py-3">
					<h4>برند ها</h4>
					<div class="w-100"></div>
 					<div class="owl-carousel owl-theme">
					    <div class="item"><img src="{{asset('img/b1.png')}}" class="img-fluid"></div>
					    <div class="item"><img src="{{asset('img/b2.png')}}" class="img-fluid"></div>
					    <div class="item"><img src="{{asset('img/b3.png')}}" class="img-fluid"></div>
					    <div class="item"><img src="{{asset('img/b4.png')}}" class="img-fluid"></div>
						<div class="item"><img src="{{asset('img/b5.png')}}" class="img-fluid"></div>
						<div class="item"><img src="{{asset('img/b6.png')}}" class="img-fluid"></div>
						<div class="item"><img src="{{asset('img/b7.png')}}" class="img-fluid"></div>
						<div class="item"><img src="{{asset('img/b8.png')}}" class="img-fluid"></div>
						<div class="item"><img src="{{asset('img/b8.png')}}" class="img-fluid"></div>
						<div class="item"><img src="{{asset('img/b9.png')}}" class="img-fluid"></div>
						<div class="item"><img src="{{asset('img/b10.png')}}" class="img-fluid"></div>
						<div class="item"><img src="{{asset('img/b11.png')}}" class="img-fluid"></div>
						<div class="item"><img src="{{asset('img/b12.png')}}" class="img-fluid"></div>



					</div>

				</div>
			</div>
				<div class="py-3" id="main-footer">
					<div class="container">
						<div class="row">
							<div class="box col-3">
								
								<div class="inner-box">
									
									<h4>سایر لینک ها</h4>
									<div class="w-100"></div>
									<ul class="list-group list-group-flush">
									  <li class="list-group-item">سایر لینک ها </li>
						
									</ul>
								</div>		

							</div>
							<div class="box col-3">
								
								<div class="inner-box">
									
									<h4>تامین کنندگان محصولات</h4>
									<div class="w-100"></div>
									<ul class="list-group list-group-flush">
									  <li class="list-group-item">سایر لینک ها </li>
							
									</ul>

								</div>
								
							</div>
							<div class="box col-3">
								
								<div class="inner-box">
									
									<h4>درگاه پرداخت</h4>
									<div class="w-100"></div>
									<ul class="list-group list-group-flush">
									  <li class="list-group-item">سایر لینک ها </li>
							
									</ul>

								</div>
								
							</div>
							<div class="box col-3">
								
								<div class="inner-box">
									
									<h4>درباره ما</h4>
									<div class="w-100"></div>
									<ul class="list-group list-group-flush">
									  <li class="list-group-item">سایر لینک ها </li>
									</ul>

								</div>
							</div>
						</div>
					</div>
				</div>
		</div>

	</footer>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript">
    	$('.owl-carousel').owlCarousel({
		    rtl:true,
		    loop:true,
		    margin:30,
		    nav:true,
		    responsive:{
		        0:{
		            items:2
		        },
		        600:{
		            items:5
		        },
		        1000:{
		            items:10
		        }
		    }
		});
		$('.slide-products').owlCarousel({
		    rtl:true,
		    loop:true,
		    margin:0,
		    nav:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:2
		        },
		        1000:{
		            items:4
		        }
		    }
		});
		// $(window).scroll (function(){

		// 	var $a = $(window).scrollTop();
		// 	var $b = 200;

		// 	if ( $a < $b )
		// 		{
		// 			$(".hiddens").hide();
		// 			$("#main-header").removeClass ("scroll")
		// 			$("#main-header").css({"margin-top":"0px","box-shadow":"0px 0px 0px 0px"})

		// 		}
		// 	else {
		// 		$(".hiddens").show();
		// 		$("#main-header").css({"margin-top":"-200px","width":"100%","box-shadow":"0px 0px 10px 0px #000"})
		// 		$("#main-header").addClass ("scroll")
		// 		$("#main-header").css({"margin-top":"0px","width":"100%","box-shadow":"0px 0px 10px 0px #000","top":"0"})

		// 	}
		// });
    </script>
</body>
</html>