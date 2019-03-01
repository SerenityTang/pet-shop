@extends('pc.mall.layouts.app')

@section('title')
    我的慕宠 | @parent
@stop

@section('top')
    @include('pc.mall.user.partials.user_nav')
@stop

@section('content')
    <div class="row">
        @include('pc.mall.user.partials.user_side_menu')


    </div>
@stop