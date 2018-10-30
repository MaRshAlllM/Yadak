


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="SaLaZaR">
<!-- 	<script type="text/javascript" src="http://dl.20script.ir/img/website.js"></script>
 -->
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.html')}}">

    <title>مدیریت</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{asset('admin/css/owl.carousel.css')}}" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="{{asset('admin/js/html5shiv.js')}}"></script>
      <script src="{{asset('admin/js/respond.min.js')}}"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="باز کردن/بستن منو" data-placement="left" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="#" class="logo">یدک <span>بازار</span></a>
            <!--logo end-->
           <!--  <div class="nav notify-row" id="top_menu">
                <ul class="nav top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-tasks"></i>
                            <span class="badge bg-success">6</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">شما 6 برنامه در دست کار دارید</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">پنل مدیریت</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">بروزرسانی دیتابیس</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">برنامه نویسی  IPhone</div>
                                        <div class="percent">87%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                            <span class="sr-only">87% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">برنامه موبایل</div>
                                        <div class="percent">33%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                            <span class="sr-only">33% Complete (danger)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">پروفایل v1.3</div>
                                        <div class="percent">45%</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            <span class="sr-only">45% Complete</span>
                                        </div>
                                    </div>

                                </a>
                            </li>
                            <li class="external">
                                <a href="#">برنامه های بیشتر</a>
                            </li>
                        </ul>
                    </li>
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-alt"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">شما 5 پیام جدید دارید</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{asset('admin/img/avatar-mini.jpg')}}"></span>
                                    <span class="subject">
                                    <span class="from">سجاد باقرزاده</span>
                                    <span class="time">همین حالا</span>
                                    </span>
                                    <span class="message">
                                        سلام،متن پیام نمایشی جهت تست
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{asset('admin/img/avatar-mini2.jpg')}}"></span>
                                    <span class="subject">
                                    <span class="from">ایمان مدائنی</span>
                                    <span class="time">10 دقیقه قبل</span>
                                    </span>
                                    <span class="message">
                                     سلام، چطوری شما؟
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{asset('admin/img/avatar-mini3.jpg')}}"></span>
                                    <span class="subject">
                                    <span class="from">صبا ذاکر</span>
                                    <span class="time">3 ساعت قبل</span>
                                    </span>
                                    <span class="message">
                                        چه پنل مدیریتی فوق العاده ایی
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{asset('admin/img/avatar-mini4.jpg')}}"></span>
                                    <span class="subject">
                                    <span class="from">مسعود شریفی</span>
                                    <span class="time">همین حالا</span>
                                    </span>
                                    <span class="message">
                                        سلام،متن پیام نمایشی جهت تست
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">نمایش تمامی پیام ها</a>
                            </li>
                        </ul>
                    </li>
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-alt"></i>
                            <span class="badge bg-warning">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">شما 7 اعلام جدید دارید</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon-bolt"></i></span>
                                    سرور شماره 3 توقف کرده
                                    <span class="small italic">34 دقیقه قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-warning"><i class="icon-bell"></i></span>
                                    سرور شماره 4 بارگزاری نمی شود
                                    <span class="small italic">1 ساعت قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon-bolt"></i></span>
                                    پنل مدیریت 24% پیشرفت داشته است
                                    <span class="small italic">4 ساعت قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success"><i class="icon-plus"></i></span>
                                    ثبت نام کاربر جدید
                                    <span class="small italic">همین حالا</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                    برنامه پیام خطا دارد
                                    <span class="small italic">10 دقیقه قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">نمایش تمامی اعلام ها</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div> -->
        <!--     <div class="top-nav ">
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{asset('admin/img/avatar1_small.jpg')}}">
                            <span class="username">سجاد باقرزاده</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" icon-suitcase"></i>پروفایل</a></li>
                            <li><a href="#"><i class="icon-cog"></i> تنظیمات</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i> اعلام ها</a></li>
                            <li><a href="login.html"><i class="icon-key"></i> خروج</a></li>
                        </ul>
                    </li>
                   
                </ul>
                
            </div> -->
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="">
                      <a class="" href="/root">
                          <i class="icon-dashboard"></i>
                          <span>داشبورد</span>
                      </a>
                  </li>
            <li class="sub-menu <?php if(strpos(\URL::current(),'products')){ echo "actvie"; } ?>">
                      <a href="javascript:;" class="">
                          <i class="icon-shopping-cart"></i>
                          <span>محصولات</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{route('products.index')}}">مدیریت محصولات</a></li>
                          <li><a class="" href="{{route('products.create')}}">درج محصول</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-paste"></i>
                          <span>مشخصات کالا</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                        <li><a class="" href="{{route('feature.index')}}">مدیریت مشخصه ها</a></li>
                        <li><a class="" href="{{route('feature.create')}}">درج مشخصه</a></li>  
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-list-ol"></i>
                          <span>دسته بندی ها</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                         <li><a class="" href="{{route('categories.index')}}">مشاهده دسته بندی ها</a></li>
                          <li><a class="" href="{{route('categories.create')}}">ساخت دسته بندی</a></li>
               
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-group"></i>
                          <span>کاربران</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/root/userlist">مدیریت کاربران</a></li>
                          <li><a class="" href="{{route('roles.index')}}">مدیریت گروه های کاربری</a></li>
                          <li><a class="" href="{{route('roles.create')}}">ایجاد گروه کاربری</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-usd"></i>
                          <span>بخش مالی</span>
                          <span class="arrow"></span>
                      </a>
                    <ul class="sub">
                          <li><a class="" href="/root/paylist">پرداخت های انجام شده</a></li>
                          <!--<li><a class="" href="{{route('roles.index')}}">مدیریت گروه های کاربری</a></li>
                          <li><a class="" href="{{route('roles.create')}}">ایجاد گروه کاربری</a></li>-->
                      </ul>
                  </li>
                  <li>
                      <a class="" href="/root/comments">
                          <i class="icon-comment"></i>
                          <span>نظرات</span>
                          <!--<span class="label label-danger pull-left mail-info">2</span>-->
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-cogs"></i>
                          <span>تنظیمات</span>
                          <!-- <span class="arrow"></span> -->
                      </a>
                    <!--   <ul class="sub">
                          <li><a class="" href="/root/userlist">مشاهده و مدیریت کاربران</a></li>
                          <li><a class="" href="{{route('roles.index')}}">مدیریت گروه های کاربری</a></li>
                          <li><a class="" href="{{route('roles.create')}}">ایجاد گروه کاربری</a></li>
                      </ul> -->
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
        <section id="main-content">
          <section class="wrapper">

                @yield('content')

           </section>
        </section> 

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('admin/js/jquery.js')}}"></script>
    <script src="{{asset('admin/js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{asset('admin/js/owl.carousel.js')}}" ></script>
    <script src="{{asset('admin/js/jquery.customSelect.min.js')}}" ></script>

    <!--common script for all pages-->
    <script src="{{asset('admin/js/common-scripts.js')}}"></script>

    <!--script for this page-->
    <script src="{{asset('admin/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('admin/js/easy-pie-chart.js')}}"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
