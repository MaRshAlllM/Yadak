@extends('layouts.admin')

@section('content')

    @if(!is_null(Session::get('message')))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif

    @if($comments->count() == 0)
        هیج نظری یافت نشد.
    @else
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    لیست نظرات ثبت شده
                </header>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>کاربر</th>
                        <th>محصول</th>
                        <th>متن </th>
                        <th>حذف</th>
                        <th>تایید/رد</th>
                        <th>ویرایش</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$comment->user->name}}</td>
                            <td>{{$comment->product->title}}</td>
                            <td>{{$comment->content}}</td>
                            <td>

                                <form action="{{URL("root/comments/{$comment->id}/delete")}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟');"><i class="icon-remove"></i></button>
                                </form>
                            </td>
                            <td>
                                <form action="{{URL("root/comments/{$comment->id}/aord")}}" method="post">
                                    @csrf
                                    @method('patch')
                                    @if($comment->status == 0)
                                        <button class="btn btn-info"><i class="icon-edit"></i></button>
                                    @else
                                        <button class="btn btn-danger"><i class="icon-edit"></i></button>
                                    @endif
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-info"href="comments/{{$comment->id}}/edit"><i class="icon-edit"></i></a>
                            </td>
                        </tr>
                        <?php @$i++ ?>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    @endif
@endsection