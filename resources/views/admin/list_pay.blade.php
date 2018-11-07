@extends('layouts.admin')

@section('content')

    @if(!is_null(Session::get('message')))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif

    @if($allfactor->count() == 0)
        هیج فاکتوری یافت نشد.
    @else
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    لیست تمامی فاکتورها
                </header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">شناسه فاکتور</th>
                            <th scope="col">تاریخ</th>
                            <th scope="col">مشتری</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">سند دریافت پیامک</th>
                            <th scope="col">جزئیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        <?php
                        foreach($allfactor as $row){
                        ?>


                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row->identifier; ?></td>
                            <td><?php echo $row->instance; ?></td>
                            <td><?php echo $row->updated_at ?></td>
                            <td><?php echo $row->status; ?></td>
                            <td><?php
                                if(empty($row->sms)){
                                    echo "ندارد";
                                }else{
                                echo $row->sms;
                                }
                                ?></td>
                            <td><a href="/root/paymentdetail/<?php echo $row->identifier; ?>">مشاهده</a></td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    @endif
@endsection