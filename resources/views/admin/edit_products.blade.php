@extends('layouts.admin')

@section('content')

      <script src="{{asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
      <script>

      tinymce.init({
        selector: ".body textarea",
        language:"fa_IR",
        theme: 'modern',
        height : 300,
        relative_urls: false,
        directionality: 'rtl',
        plugins: ['advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker','searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking','save table contextmenu directionality emoticons template paste textcolor'
                                        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
                        });


    </script>

          <form role="form" action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                    <div class="col-lg-8">
                        <section class="panel">
                            <header class="panel-heading">
                                درج محصول
                         
                            </header>
                            <div class="panel-body">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        @if(!is_null(Session::get('Message')))
                                        <div class="alert alert-success">
                                                
                                                {{Session::get('Message')}}

                                        </div>
                                        @endif 
                                        @if($errors->all())
                                        <ul class="alert alert-danger">   
                                        @foreach($errors->all() as $error)

                                            <li class="list-group-itemr">{{$error}}</li>

                                        @endforeach
                                        </ul>
                                        @endif
                                        


                                 <!--        @if($errors->has('title'))
                                            <div class="alert alert-danger">{{$errors->first('title')}}</div>
                                        @endif -->
                                        <label for="title">عنوان</label>
                                        <input name="title" type="text" class="form-control" id="title" placeholder="عنوان" value="{{$product->title}}">
                                    </div>
                                     <div class="form-group body">
                                        <label for="body">توضیحات مختصر</label>
                                        <textarea name="body" class="form-control" id="body">{{$product->body}}</textarea>
                                    </div>
                                    <div class="form-group body">
                                        <label for="body">توضیحات کامل</label>
                                        <textarea name="full_body" class="form-control" id="body">{{$product->full_body}}</textarea>
                                    </div>
                                    <div class="form-row" id="app">
                                        
                                        <div class="form-group col-md-12" >

                                         <label for="price">قیمت</label>
                                         <input name="price[]" type="text" 
                                         <?php if(isset(unserialize($product->price)[""])){
                                            echo "value=\"";
                                            echo unserialize($product->price)[""]."\""; } ?>
                                             class="form-control" id="price" placeholder="قیمت" v-if="!falseOrtrue">

                                        <input name="feature[]" type="hidden" value="" class="form-control" id="price" placeholder="" v-if="!falseOrtrue">

                                        </div>
                                        <div class="clearfix"></div>

                                        <a @click="hideAndshow()" class="btn btn-default">محصول متغییر <span v-if="!falseOrtrue">است</span><span v-else>نیست</span> ؟</a>

                                        <div v-if="falseOrtrue">

                                            <ul v-for="input in inputs" track-by="$index">

                                            <div class="form-row">
                                                    
                                                <li class="form-group col-md-6"><input type="text" class="form-control" name="feature[]" placeholder="متغییر" value="@{{input['key']}}" required=""></li>
                                                <li class="form-group col-md-4"><input type="text" placeholder="قیمت" class="form-control" name="price[]" value="@{{input['value']}}" required=""></li>
                                                <li class="form-group col-md-2">
                                                    
                                                    <a @click="deleteRow($index)" class="btn btn-danger">حذف</a>

                                                </li>

                                            </div>


                                        </ul>   

                                        <br>
                                        <a class="btn" @click="addRow">اضافه کردن محصول متغییر</a>
                                

                                        </div>


                                    </div>  
                                    <div class="form-group">
                                        <label for="number">تعداد محصول موجود</label>
                                        <input name="number" value="{{$product->number}}" type="text" class="form-control" id="number" placeholder="تعداد محصول موجود">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">پیوند یکتا</label>
                                        <input name="slug" value="{{$product->slug}}" type="text" class="form-control" id="slug" placeholder="پیوند یکتا">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">تخفیف (درصد)</label>
                                        <input name="discount" value="{{$product->discount}}"  type="text" class="form-control" id="slug" placeholder="تخفیف">
                                    </div>
                                    <button type="submit" class="btn btn-info">بروزرسانی</button>
                                                    </div>
                                        </section>
                                    </div>
                                    <div class="col-lg-4">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                انتخاب دسته بندی
                                            </header>
                                            <div class="panel-body">
                                                    <div class="form-group" style="height: 150px;overflow: auto;">
                                                        {{sortMyCatInHtmlFormForEdit(null,$product->categories()->get())}}
                                                    </div>
                                            </div>
                                        </section>
                                        <section class="panel">
                                            <header class="panel-heading">
                                                تصویر شاخص
                                            </header>
                                            <div class="panel-body">
                                                 <div class="form-group">
                                                    <label for="exampleInputFile">آپلود عکس</label>
                                                    <img src="/uploads/{{$product->image}}" class="img-responsive">
                                                    <br>
                                                    <input type="file" id="exampleInputFile" name="image">
                                                    <p class="help-block">پسوند های قابل قبول : .jpg , .png</p>
                                                </div>
                                            </div>        

                                        </section>
                                        <section class="panel">
                                            <header class="panel-heading">
                                                مشخصات محصول
                                            </header>
                                            <div class="panel-body" id="ft">
                                                 <ul v-for="input in inputs" track-by="$index">

                                            <div class="form-row">
                                                    
                                                <li class="form-group col-md-6">  
                                                    <select class="form-control" name="fts[]">     
                                                        <option v-if="input['feature_id']" selected value="@{{input['feature_id']}}">
                                                            @{{input['feature_title']}}
                                                        </option>

                                                        <option v-for="feature in features" value="@{{feature['id']}}" v-if="input['feature_id'] != feature['id']">@{{feature["title"]}}</option>    
                                                        
                                                    </select>

                                                </li>
                                                <li class="form-group col-md-4"><input type="text" placeholder="مقدار" class="form-control" name="values[]" value="@{{input['value']}}" required=""></li>
                                                <li class="form-group col-md-2">
                                                    
                                                    <a @click="deleteRow($index)" class="btn btn-danger">حذف</a>

                                                </li>

                                            </div>


                                        </ul>   
                                        <a class="btn" @click="addRow">اضافه کردن ویژگی</a>
                                            </div>        

                                        </section>

                                    </div>
                                 </div>
                                </form>

                  


<script type="text/javascript" src="{{asset('js/vue.min.js')}}"></script>
<script type="text/javascript">
    
    const app = new Vue({

        el:"#app",
        data:{

             <?php if(isset(unserialize($product->price)[""])){

                 echo "inputs:[],";
                 echo "falseOrtrue:false,";

             }else{
                echo "inputs:[";
                foreach (unserialize($product->price) as $key => $value) {
                        echo "{\"key\":\"{$key}\",\"value\":\"{$value}\"},";
                }
                echo "],";
                echo "falseOrtrue:true,";

             }?>


        },
        methods:{

            addRow:function(){

                this.inputs.push({})


            },
            deleteRow:function(index){

                this.inputs.splice(index,1)

            },
            hideAndshow:function(){

                this.falseOrtrue = !this.falseOrtrue;
                if(this.falseOrtrue == false){
                    this.inputs = []
                }
            }

        },



    });

    const ft = new Vue({

        el:'#ft',
        data:{
            features:[
                <?php

                    foreach (\App\feature::all() as $feature) {
                        
                        echo "{\"id\":\"{$feature->id}\",\"title\":\"$feature->title\"},";                    

                    }

                ?>

            ],
            inputs:[

                <?php

                    foreach ($product->features as $feature) {
                        
                        echo "{\"feature_title\":\"{$feature->title}\",\"feature_id\":\"{$feature->pivot->feature_id}\",\"value\":\"{$feature->pivot->value}\"},";    

                    }


                ?>


            ],

        },
        methods:{

            addRow:function(){

                this.inputs.push({})

            },
            deleteRow:function(index){

                this.inputs.splice(index,1)

            }



        },





    });


</script>
@endsection