@extends('layouts.admin')

@section('content')

    @if($most->count() == 0)
        هیج موردی یافت نشد.
    @else
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    لیست بیشترین خریدهای انجام شده
                </header>
                <div class="table-responsive">
                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام خریدار</th>
                            <th scope="col">نام کاربری</th>
                            <th scope="col">شماره عضویت</th>
                            <th scope="col">تعداد خرید</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        <?php
                        foreach($most as $row){
                        ?>


                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->sub; ?></td>
                            <td><?php echo $row->count; ?></td>
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