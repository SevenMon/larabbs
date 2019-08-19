@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="card ">
                <img class="card-img-top" src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1566228627614&di=ee8a15a12cf296ff1c28fae502b484d1&imgtype=0&src=http%3A%2F%2Fimg3.duitang.com%2Fuploads%2Fitem%2F201504%2F21%2F20150421H4819_J4XQr.png" alt="{{ $user->name }}">
                <div class="card-body">
                    <h5><strong>个人简介</strong></h5>
                    <p>{{ $user->introduction }}</p>
                    <hr>
                    <h5><strong>注册于</strong></h5>
                    <p>{{ $user->create_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card ">
                <div class="card-body">
                    <h1 class="mb-0" style="font-size:22px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
                </div>
            </div>
            <hr>

            {{-- 用户发布的内容 --}}
            <div class="card ">
                <div class="card-body">
                    暂无数据 ~_~
                </div>
            </div>

        </div>
    </div>
@stop