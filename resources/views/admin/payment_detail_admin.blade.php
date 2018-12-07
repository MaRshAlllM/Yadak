@extends('layouts.admin')

@section('content')

    @if(!is_null(Session::get('message')))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif

    @if($p->count() == 0)
        جزئیاتی یافت نشد.
    @else
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    جزئیات فاکتور
                </header>
                <div class="table-responsive">
                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام کالا</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">قیمت واحد</th>
                            <th scope="col">مجموع</th>
                            <th scope="col">مشخصه</th>
                            <th scope="col">شناسه فاکتور</th>
                            <th scope="col">تاریخ</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">auth</th>
                            <th scope="col">شماره پرداخت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        <?php
                        foreach($p as $row){
                        ?>


                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row->content; ?></td>
                            <td><?php echo $row->qty; ?></td>
                            <td><?php echo $row->price; ?></td>
                            <td><?php echo $row->subtotal; ?></td>
                            <td><?php echo $row->feature; ?></td>
                            <td><?php echo $row->identifier; ?></td>
                            <td>{{jDate::forge($row->updated_at)->format('%d %B %Y - H:i')}}</td>
                            <td><?php echo $row->status; ?></td>
                            <td><?php echo $row->auth; ?></td>
                            <td><?php echo $row->refid; ?></td>
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