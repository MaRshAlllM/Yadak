<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Product;
use Illuminate\Support\Facades\Auth; 
use Validator;
class UserController extends Controller 
{
public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('YadakApp')->accessToken; 
            return response()->json(['success' => $success], $this->successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function index() 
    { 


    // $products = Product::all();
	return response()->json('[
[
{
"id": 4,
"user_id": 2,
"title": "سیبک فرمان (چپقی) چپ سمند SE امیرنیا اصل ساخت ايران [700 گرم]",
"body": "<p><strong>سیبک فرمان</strong>&nbsp;از اجزاء جعبه فرمان می باشد و وظیفه آن به عنوان محور چرخشی این است که&nbsp;<strong>هنگام چرخاندن فرمان، حرکات سیستم فرمان را به چرخهای جلو منتقل کند.</strong>&nbsp;در صورت خراب شدن سیبک فرمان مشکلاتی مانند انحراف خودرو از مسیر مستقیم، سایش غیر معقول تایرها، ... بروز خواهد کرد. این قطعه می بایست گریس کاری مناسبی داشته باشد و جهت جلوگیری از اتلاف روانکارهای داخل قطعه از گردگیر مناسب استفاده شود.</p>",
"number": 5,
"price": "a:1:{s:0:\"\";s:5:\"50000\";}",
"image": "yuNjOS6TzZQhu4y4dIMjirZ2Ftt3wazrGowEZ1bj.jpeg",
"slug": "سیبک-فرمان",
"created_at": "2018-08-30 20:59:56",
"updated_at": "2018-08-30 20:59:56",
"discount": "5",
"full_body": "<p><strong>چه علائمی می تواند ناشی از مشکل در سیبک فرمان باشد؟</strong><br />اگر&nbsp;<strong>هنگام افتادن خودرو در دست اندازها صدای بسیار بدی به گوشتان می رسد</strong>، می تواند ناشی از بروز مشکل در سیبک فرمان باشد که باید نسبت به تعویض آن اقدام کنید.<br /><strong>لرزش فرمان</strong>،&nbsp;<strong>سفت شدن فرمان</strong>،&nbsp;<strong>لقی بیش از حد فرمان</strong>&nbsp;و&nbsp;<strong>انحراف خودرو</strong>&nbsp;نیز می تواند ناشی از خرابی سیبک فرمان باشد.<br /><br /><strong>شرکت تولیدی صنعتی امیرنیا</strong>&nbsp;در زمینه طراحی، تولید و صادرات انواع قطعات سیستم تعلیق و فرمان خودروهای سواری فعال می باشد. محصولات امیرنیا مطابق با استانداردهای روز جهانی همچون استاندارد خودروسازی ژاپن JASO، استاندارد انجمن خودروی آمریکا SAE، استاندارد ملی ایران ISIRI و استاندارد شرکتهایی همچون Peugeot/Citroen فرانسه ،KIA Motors کره، ایران خودرو و سایپا ارائه می گردد.</p>",
"aprice": "47500 با تخفیف 5 %"
},
{
"id": 5,
"user_id": 2,
"title": "سر سیلندر کامل (بنزینی) سمند SE مدل شرکتی ایران خودرو اصل ساخت",
"body": "<p>شرکتی</p>",
"number": 6,
"price": "a:1:{s:0:\"\";s:6:\"300000\";}",
"image": "l1fNtWnyNwqqVNAznfasDuPQoLjmzCVQxGTncXR7.jpeg",
"slug": "سرسیلند",
"created_at": "2018-08-30 21:32:26",
"updated_at": "2018-09-19 10:03:12",
"discount": "5",
"full_body": "<p>شرکتی</p>",
"aprice": "285000 با تخفیف 5 %"
},
{
"id": 6,
"user_id": 2,
"title": "طبق بوش فلزی پراید",
"body": "<p><strong>طبق خودرو</strong> از اصلی ترین اجزای جلوبندی و قطعه ای فلزی است که در دو سر آن بوش های محوری قرار دارد و از یک سمت به قطعات متحرک سیستم تعلیق (از طریق سیبک ها به چرخ ها) و از سمت دیگر و از طریق بوش ها به شاسی خودرو وصل می شود و <strong>اتصال شاسی به قطعات سیستم تعلیق را به عهده دارد.</strong> برحسب نوع سیستم تعلیق ممکن است خودرویی بدون طبق، با یک طبق در هر چرخ، و یا با دو طبق در هر چرخ طراحی شود. <strong>طبق ها در هرخودرو شکل متفاوتی دارند&nbsp;و به تعادل خودرو کمک می کنند.</strong></p>",
"number": 10,
"price": "a:1:{s:0:\"\";s:5:\"70000\";}",
"image": "YlkpyR3bEFo9yTjiYepGSp9yELW6I4c3Jhbv6kDV.jpeg",
"slug": "طبق",
"created_at": "2018-08-31 04:35:52",
"updated_at": "2018-10-01 09:01:44",
"discount": null,
"full_body": "<p><strong>علائم و نشانه های خرابی طبق خودرو چیست؟</strong> خرابی طبق ها باعث اختلال در تعادل خودرو و صدا دادن اتومبیل می شود. خرابی بوش های طبق باعث گیجی فرمان، سر و صدا و لاستیک سایی می شود. در صورت خرابی بوش ها مشکل خودرو با تعویض بوش های معیوب با بوش های نو برطرف می شود.</p>",
"aprice": "70000"
},
{
"id": 7,
"user_id": 2,
"title": "طبق بوش فلزی",
"body": "<p>از اصلی ترین اجزای جلوبندی و قطعه ای فلزی است که در دو سر آن بوش های محوری قرار دارد و از یک سمت به قطعات متحرک سیستم تعلیق (از طریق سیبک ها به چرخ ها) و از سمت دیگر و از طریق بوش ها به شاسی خودرو وصل می شود و <strong>اتصال شاسی به قطعات سیستم تعلیق را به عهده دارد.</strong> برحسب نوع سیستم تعلیق ممکن است خودرویی بدون طبق، با یک طبق در هر چرخ، و یا با دو طبق در هر چرخ طراحی شود. <strong>طبق ها در هرخودرو شکل متفاوتی دارند&nbsp;و به تعادل خودرو کمک می کنند.</strong></p>",
"number": 22,
"price": "a:1:{s:0:\"\";s:6:\"837000\";}",
"image": "NAIZAfISoKcKHg9hA6OYnKBoVM7GlzhwhMPh2UDj.jpeg",
"slug": "طبق-بوش-فلزی-پراید",
"created_at": "2018-10-03 04:22:53",
"updated_at": "2018-10-03 04:22:53",
"discount": "18",
"full_body": "<p>کرابی طبق ها باعث اختلال در تعادل خودرو و صدا دادن اتومبیل می شود. خرابی بوش های طبق باعث گیجی فرمان، سر و صدا و لاستیک سایی می شود. در صورت خرابی بوش ها مشکل خودرو با تعویض بوش های معیوب با بوش های نو برطرف می شود.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>",
"aprice": "686340 با تخفیف 18 %"
},
{
"id": 8,
"user_id": 2,
"title": "توپی سر کمک پراید",
"body": "<p><strong>توپی سر کمک</strong>&nbsp;به کمک فنر ها وصل می شود. در واقع قسمت بالایی مجموعه کمک فنر نصب می شود.&nbsp;<strong>استفاده از توپی سر کمک با کیفیت مانع از ایجاد صدا در خودرو می شود.</strong></p>",
"number": 22,
"price": "a:1:{s:0:\"\";s:6:\"434000\";}",
"image": "594vmTioeq3MKCFaOml2maT3wDRQ3hamUgSNvBVO.jpeg",
"slug": "توپی-سر-کمک-پراید",
"created_at": "2018-10-03 04:28:42",
"updated_at": "2018-10-03 08:09:16",
"discount": "14",
"full_body": "<p>هنگامی که خودرو در دست انداز ها و چاله ها می افتد توپی سر کمک مانع وارد شدن ضربه به کمک فنر ها می شود. در واقع جلوی فشاری که به سمت کمک فنر می آید را می گیرد.<br />&nbsp;<br /><strong>علائم خرابی توپی سر کمک:</strong>&nbsp;شل شدن مهره های کمک فنر و صدا دادن کمک فنر ها (صدای کوبش) می تواند از علائم خرابی این قطعه در خودرو باشد. صدای لق لق هنگام فرمان گیری نیز می تواند دلالت بر این داشته باشد که توپی سر کمک عملکرد صحیحی ندارد.</p>",
"aprice": "373240 با تخفیف 14 %"
},
{
"id": 9,
"user_id": 2,
"title": "بوش طبق فلزی پراید",
"body": "<p>این قطعه روی طبق خودرو سوار می شود و <strong>وظیفه آن انسجام بخشیدن به طبق است.</strong> بوش ها جهت حذف لرزش ها، حذف سر وصدا هنگام حرکت و برای تحمل بخشی از ضربات وارده به دلیل خاصیت الاستیکی آنها استفاده می شوند.<br />&nbsp;</p>",
"number": 22,
"price": "a:1:{s:0:\"\";s:5:\"15500\";}",
"image": "vTBqpVEZ4Rgd2nyy9jWAPDhGD16q0H9S1zw0OWOS.jpeg",
"slug": "بوش-طبق-فلزی-پراید",
"created_at": "2018-10-03 04:47:02",
"updated_at": "2018-10-04 13:06:39",
"discount": "15",
"full_body": "<p><br /><br /><strong>علائم خرابی بوش طبق فلزی چیست؟</strong> لاستیک سایی و گیج زدن خودرو می باشد و نمی توان ماشین را میزان فرمان (تنظیم فرمان) زد.</p>",
"aprice": "13175 با تخفیف 15 %"
},
{
"id": 10,
"user_id": 2,
"title": "سیبک مفصل (قرقری فرمان) پراید",
"body": "<p><strong>سیبک مفصل یا قرقری فرمان&nbsp;</strong>از اجزاء جعبه فرمان می باشد. وظیفه این قطعه این است که نیروی کششی یا فشاری جعبه فرمان را به سیبک فرمان منتقل کند. قرقری فرمان با اتصال جعبه فرمان به سیبک، باعث انسجام جعبه فرمان می شود.</p>",
"number": 22,
"price": "a:1:{s:0:\"\";s:5:\"55800\";}",
"image": "xH8MyJPpNndXAs1e38uW1iD1gXXxvM6QNibLclRy.jpeg",
"slug": "سیبک-مفصل-قرقری-فرمان-پراید",
"created_at": "2018-10-04 13:17:46",
"updated_at": "2018-10-04 13:17:46",
"discount": "17",
"full_body": "<p><strong>دلایل و نشانه های خرابی قرقری فرمان چیست؟</strong>&nbsp;در اکثر موارد خراب شدن گردگیر قرقری فرمان، دلیل خراب شدن این قطعه می باشد. به این صورت که با خراب شدن گردگیر قرقری فرمان، گریس قرقری فرمان خشک شده و قرقری آسیب می بیند.<br /><strong>صدا دادن اتومبیل در دست اندازها، می تواند ناشی از آسیب دیدن این قطعه در خودرو باشد.</strong></p>",
"aprice": "46314 با تخفیف 17 %"
},
{
"id": 11,
"user_id": 2,
"title": "دیسک و صفحه و بلبرینگ کلاچ (کیت کلاچ) خودرو پرايد",
"body": "<p><strong>دیسک و صفحه کلاچ سکو پراید شرکتی سایپا با شماره فنی&nbsp;SKKI-102 - ساخت کشور کره داخل بسته بندی شرکت سایپا</strong><br />&nbsp;</p>",
"number": 25,
"price": "a:1:{s:0:\"\";s:6:\"678900\";}",
"image": "G3Yop9ZVlZnhMKqPFWTheVce2wFO1Io3QWV8Ohww.jpeg",
"slug": "دیسک-و-صفحه",
"created_at": "2018-10-05 00:54:37",
"updated_at": "2018-10-05 00:54:37",
"discount": "12",
"full_body": "<p>در خودرو کلاچ دستگاهی است که نیروی موتور را از گیربکس قطع یا وصل می کند یا به عبارت ساده تر عمل کلاچ برای تعویض دنده های گیربکس است</p>",
"aprice": "597432 با تخفیف 12 %"
},
{
"id": 12,
"user_id": 2,
"title": "واتر پمپ",
"body": "<h1 class=\"heading-title\">واتر پمپ خودرو پراید مدل سوخت آما اصل ساخت ایران</h1>",
"number": 88,
"price": "a:1:{s:0:\"\";s:6:\"155000\";}",
"image": "DzQ8PZbu9pT4Tr9pJwRX9j0PxmpuGOeIsAjIawNl.jpeg",
"slug": "واتر-پمپ-پراید",
"created_at": "2018-10-07 07:46:27",
"updated_at": "2018-10-07 07:46:27",
"discount": "12",
"full_body": "<h1 class=\"heading-title\">واتر پمپ خودرو پراید مدل سوخت آما اصل ساخت ایران</h1>",
"aprice": "136400 با تخفیف 12 %"
},
{
"id": 13,
"user_id": 2,
"title": "کاسه نمد پلوس",
"body": "<h1 class=\"heading-title\">کاسه نمد پلوس پراید POS اصل ساخت کره</h1>",
"number": 20,
"price": "a:1:{s:0:\"\";s:5:\"11780\";}",
"image": "H5Q8LsBbDjWEy5I5H7CRkPGCzOlqDl3RwLD1fZnM.jpeg",
"slug": "کاسه-نمد-پلوس",
"created_at": "2018-10-07 08:05:58",
"updated_at": "2018-10-07 08:05:58",
"discount": "13",
"full_body": "<h1 class=\"heading-title\">کاسه نمد پلوس پراید POS اصل ساخت کره</h1>",
"aprice": "10248.6 با تخفیف 13 %"
},
{
"id": 14,
"user_id": 2,
"title": "دیسک ترمز چرخ جلو پرايد",
"body": "<h1 class=\"heading-title\">دیسک ترمز چرخ جلو پرايد تلدا (TELDA) ساخت ايران (یک دست)</h1>",
"number": 22,
"price": "a:1:{s:0:\"\";s:6:\"233200\";}",
"image": "W0WlDaJ5DaxjBjOamRh2hesrKnT6LMVUw8twkKyq.jpeg",
"slug": "دیسک-ترمز-چرخ-جلو-پرايد",
"created_at": "2018-10-07 08:24:11",
"updated_at": "2018-10-07 08:24:11",
"discount": "15",
"full_body": "<h1 class=\"heading-title\">دیسک ترمز چرخ جلو پرايد تلدا (TELDA) ساخت ايران (یک دست)</h1>",
"aprice": "198220 با تخفیف 15 %"
},
{
"id": 15,
"user_id": 2,
"title": "استپ موتور (استپر)",
"body": "<h1 class=\"heading-title\">استپ موتور (استپر) پراید انژکتوری شرکت کاربراتور ایران (ایرکا) اصل ساخت ايران</h1>",
"number": 15,
"price": "a:1:{s:0:\"\";s:6:\"139000\";}",
"image": "LA0jij1bNcQzCRfZP8Na8bbaX6na6y3z8FVsxQHj.jpeg",
"slug": "استپ-موتور-استپر",
"created_at": "2018-10-07 08:51:54",
"updated_at": "2018-10-07 08:51:54",
"discount": "16",
"full_body": "<h1 class=\"heading-title\">استپ موتور (استپر) پراید انژکتوری شرکت کاربراتور ایران (ایرکا) اصل ساخت ايران</h1>",
"aprice": "116760 با تخفیف 16 %"
},
{
"id": 16,
"user_id": 2,
"title": "فشنگی دمای آب 2 فیش (کله قهوه ای) سمند معمولی",
"body": "<h1 class=\"heading-title\">فشنگی دمای آب 2 فیش (کله قهوه ای) سمند معمولی سامفر اصل ساخت ایران</h1>",
"number": 22,
"price": "a:1:{s:0:\"\";s:5:\"52700\";}",
"image": "SvogOcm7GTmd1JIEmVDV1B4g9YeGQTXH4hgrIR19.jpeg",
"slug": "فشنگی-دمای-آب-2-فیش-کله-قهوه-ای-سمند-معمولی",
"created_at": "2018-10-07 08:54:51",
"updated_at": "2018-10-07 08:54:51",
"discount": "18",
"full_body": "<h1 class=\"heading-title\">فشنگی دمای آب 2 فیش (کله قهوه ای) سمند معمولی سامفر اصل ساخت ایران</h1>",
"aprice": "43214 با تخفیف 18 %"
},
{
"id": 17,
"user_id": 2,
"title": "سنسور کیلومتر مشکی سمند معمولی",
"body": "<h1 class=\"heading-title\">سنسور کیلومتر مشکی سمند معمولی مدل کروز اصل ساخت ايران</h1>",
"number": 15,
"price": "a:1:{s:0:\"\";s:5:\"68200\";}",
"image": "uBXaVZIqvENKtKr5RjpcFUtNxrBj4FzaId7QRvu3.jpeg",
"slug": "سنسور-کیلومتر-مشکی-سمند-معمولی",
"created_at": "2018-10-07 08:58:02",
"updated_at": "2018-10-07 08:58:02",
"discount": "16",
"full_body": "<h1 class=\"heading-title\">سنسور کیلومتر مشکی سمند معمولی مدل کروز اصل ساخت ايران</h1>",
"aprice": "57288 با تخفیف 16 %"
},
{
"id": 18,
"user_id": 2,
"title": "دریچه هوای کامل (دریچه گاز)",
"body": "<h1 class=\"heading-title\">دریچه هوای کامل (دریچه گاز) سمند معمولی ساژم مدل کاربراتور ایران اصل ساخت ايران</h1>",
"number": 11,
"price": "a:1:{s:0:\"\";s:6:\"697500\";}",
"image": "qsiTWgzycGeOQ9AwgevmD5BxnM9xdCfVnNKNTfMr.jpeg",
"slug": "دریچه-هوای-کامل-دریچه-گاز",
"created_at": "2018-10-07 10:41:07",
"updated_at": "2018-10-07 10:41:07",
"discount": "17",
"full_body": "<h1 class=\"heading-title\">دریچه هوای کامل (دریچه گاز) سمند معمولی ساژم مدل کاربراتور ایران اصل ساخت ايران</h1>",
"aprice": "578925 با تخفیف 17 %"
},
{
"id": 19,
"user_id": 2,
"title": "رادیاتور آب پراید",
"body": "<h1 class=\"heading-title\">رادیاتور آب پراید کوشش رادیاتور اصل ساخت ايران</h1>",
"number": 17,
"price": "a:1:{s:0:\"\";s:6:\"248000\";}",
"image": "2Ryf7JZ4l6NaNA1iTeCoBv6ryaZBEwwmiMBIirGx.jpeg",
"slug": "رادیاتور-آب-پراید",
"created_at": "2018-10-07 11:14:26",
"updated_at": "2018-10-07 11:14:26",
"discount": "14",
"full_body": "<h1 class=\"heading-title\">رادیاتور آب پراید کوشش رادیاتور اصل ساخت ايران</h1>",
"aprice": "213280 با تخفیف 14 %"
},
{
"id": 20,
"user_id": 2,
"title": "پروانه فن 6 پر (مدل خاری) جدید پژو 405",
"body": "<h1 class=\"heading-title\">پروانه فن 6 پر (مدل خاری) جدید پژو 405 GLX مدل مهرتابش اصل ساخت ايران</h1>",
"number": 5,
"price": "a:1:{s:0:\"\";s:5:\"23250\";}",
"image": "4DgDCglfOMr8jU7F04ZXuwmhC7bUMoBWwi9XYw2d.jpeg",
"slug": "پروانه-فن-6-پر-مدل-خاری-جدید-پژو-405",
"created_at": "2018-10-07 11:19:48",
"updated_at": "2018-10-07 11:19:48",
"discount": "11",
"full_body": "<h1 class=\"heading-title\">پروانه فن 6 پر (مدل خاری) جدید پژو 405 GLX مدل مهرتابش اصل ساخت ايران</h1>",
"aprice": "20692.5 با تخفیف 11 %"
},
{
"id": 21,
"user_id": 2,
"title": "شمع بوش (BOSCH)",
"body": "<h1 class=\"heading-title\">شمع بوش (BOSCH) اصل آلمان پایه کوتاه دو پلاتین</h1>",
"number": 10,
"price": "a:1:{s:0:\"\";s:6:\"173600\";}",
"image": "UlXsvLjV5pRmRD08N5MyoyUkRNfMAfaWs7uzABpk.jpeg",
"slug": "شمع-بوش-bosch",
"created_at": "2018-10-07 11:37:38",
"updated_at": "2018-10-07 11:37:38",
"discount": "12",
"full_body": "<h1 class=\"heading-title\">شمع بوش (BOSCH) اصل آلمان پایه کوتاه دو پلاتین</h1>",
"aprice": "152768 با تخفیف 12 %"
},
{
"id": 22,
"user_id": 2,
"title": "شمع پایه بلند پراید",
"body": "<h1 class=\"heading-title\">شمع پایه بلند پراید یورو4 (EURO4) بوش (BOSCH) اصل ساخت آلمان</h1>",
"number": 8,
"price": "a:1:{s:0:\"\";s:6:\"198400\";}",
"image": "rbNw1PRKLHL2F5iLJ3BWwQN7hw4UTCApuGsy9xTR.jpeg",
"slug": "شمع-پایه-بلند-پراید",
"created_at": "2018-10-07 11:39:46",
"updated_at": "2018-10-07 11:39:46",
"discount": "14",
"full_body": "<h1 class=\"heading-title\">شمع پایه بلند پراید یورو4 (EURO4) بوش (BOSCH) اصل ساخت آلمان</h1>",
"aprice": "170624 با تخفیف 14 %"
},
{
"id": 23,
"user_id": 2,
"title": "کیت تسمه تایم",
"body": "<h1 class=\"heading-title\">کیت تسمه تایم خودرو پژو 405 GLX مدل اصلی و اورجینال (ORGINAL) اتحادیه اروپا-</h1>",
"number": 11,
"price": "a:1:{s:0:\"\";s:6:\"387500\";}",
"image": "kd3JBKfcUo3Hca6GLqk1rZIhshAMsuWYjnxpA8aC.jpeg",
"slug": "تسمه-تایم",
"created_at": "2018-10-07 11:43:59",
"updated_at": "2018-10-07 11:43:59",
"discount": "16",
"full_body": "<h1 class=\"heading-title\">کیت تسمه تایم خودرو پژو 405 GLX مدل اصلی و اورجینال (ORGINAL) اتحادیه اروپا-</h1>",
"aprice": "325500 با تخفیف 16 %"
},
{
"id": 24,
"user_id": 2,
"title": "محصول تست",
"body": "<p>متن فرضی بلند</p>",
"number": 5,
"price": "a:1:{s:0:\"\";s:3:\"100\";}",
"image": "kWEMmjpR9vEEstQTe7J9u3nogmziXs09Fmc9BxqA.jpeg",
"slug": "werwerwe",
"created_at": "2018-10-28 07:14:47",
"updated_at": "2018-10-28 07:14:47",
"discount": null,
"full_body": "<p>متن فرضی کوتاه</p>",
"aprice": "100"
}
]
]', $this->successStatus); 



        // return response()->json(['success' => $user], $this->successStatus); 
    } 


/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
//     public function register(Request $request) 
//     { 
//         $validator = Validator::make($request->all(), [ 
//             'name' => 'required', 
//             'email' => 'required|email', 
//             'password' => 'required', 
//             'c_password' => 'required|same:password', 
//         ]);
// if ($validator->fails()) { 
//             return response()->json(['error'=>$validator->errors()], 401);            
//         }
// $input = $request->all(); 
//         $input['password'] = bcrypt($input['password']); 
//         $user = User::create($input); 
//         $success['token'] =  $user->createToken('YadakApp')->accessToken; 
//         $success['name'] =  $user->name;
// return response()->json(['success'=>$success], $this->successStatus); 
//     }
/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this->successStatus); 
    } 
}
