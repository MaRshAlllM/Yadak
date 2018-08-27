@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{auth()->user()->name}} به پنل کاربری خوش آمدید.</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

  <button type="button" class="btn btn-secondary"><i class="fas fa-shopping-cart"></i>خرید های انجام شده</button>
  <button type="button" class="btn btn-secondary"><i class="fas fa-user"></i>

ویرایش پروفایل</button>

    @if(auth()->user()->roles()->get()->isNotEmpty())
        <a href="{{URL('root')}}" class="btn btn-secondary"><i class="fas fa-star"></i>صفحه مدیریت</a>
    @endif


                            <a class="btn btn-info" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> خروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
