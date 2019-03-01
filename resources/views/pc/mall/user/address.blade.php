@extends('pc.mall.layouts.app')

@section('title')
    地址管理 | @parent
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/cityPicker/css/city-picker.css') }}">
@stop

@section('top')
    @include('pc.mall.user.partials.user_nav')
@stop

@section('content')
    <div class="row">
        @include('pc.mall.user.partials.user_side_menu')

        <div class="col-md-10">
            <div class="user-address">
                <div class="page-header title">
                    <h3>
                        地址管理
                        <small class="tip">您已创建 <span class="tip-num">{{ $userAddressCount }}</span>
                            个地址，还可创建 <span class="tip-num">{{ $ableUserAddressCount }}</span> 个地址
                        </small>
                    </h3>
                </div>
                @if(count($userAddress) > 0)
                    @foreach($userAddress as $address)
                        @include('pc.mall.user.partials.user_address_show')
                    @endforeach
                @endif
                @if($userAddressCount < 6)
                    <div class="address-item" data-toggle="modal" data-target="#createAddressModal">
                        <span class="iconfont icon-iconfonticon02 ico"></span>
                        <span class="text">添加新地址</span>
                    </div>
                @endif
                @include('pc.mall.user.partials.user_address_create_modal')
                @include('pc.mall.user.partials.user_address_edit_modal')
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script src="{{ asset('libs/cityPicker/js/city-picker.data.js') }}"></script>
    <script src="{{ asset('libs/cityPicker/js/city-picker.js') }}"></script>
    <script>
        //调整地区下拉菜单位置
        $('.city-picker-dropdown').css({'left': '0', 'top': '60px'});

        //保存收货地址
        $('.create-save-btn').click(function () {
            $.ajax({
                type: 'POST',
                url: '{{ url('user/address') }}',
                data: {
                    _token: '{{csrf_token()}}',
                    'contact_name': $('#name').val(),
                    'area': $('#city-picker').val(),
                    'address': $('#address').val(),
                    'phone': $('#phone').val(),
                    'zip': $('#zip').val(),
                    'tag': $('#address-tag').val(),
                },
                cache: false,
                success: function (res) {
                    if (res.code == 200) {
                        $('#createAddressModal').modal('hide');
                        layer.msg(res.message, {
                            icon: 1,
                            time: 3000,
                            end: function () {
                                location.href = '{{ url("/user/addresses") }}';
                            }
                        });
                    } else {
                        if (res.hasOwnProperty('contact_name')) {
                            $('#name + .error-msg').text(res.contact_name[0]);
                        }
                        if (res.hasOwnProperty('phone')) {
                            $('#phone + .error-msg').text(res.phone[0]);
                        }
                        if (res.hasOwnProperty('area')) {
                            $('#city-picker').parents('.form-item').find('.error-msg').text(res.area[0]);
                        }
                        if (res.hasOwnProperty('address')) {
                            $('#address + .error-msg').text(res.address[0]);
                        }
                    }
                },
                error: function (msg) {
                    layer.msg(msg.responseJSON.message, {
                        icon: 2,
                        time: 2000,
                    });
                    $('#createAddressModal').modal('hide');
                }
            });
        });
        $('#city-picker').focus(function () {
            $(this).parents('.form-item').find('.error-msg').text('');
        });
        $('input').focus(function () {
            $(this).parents('.form-item').find('.error-msg').text('');
        });

        //编辑地址
        $('#editAddressModal').on('show.bs.modal', function (e) {
            var target = $(e.relatedTarget);
            var modal = $(this);

            modal.find('#city-picker').citypicker({
                province: target.data('province'),
                city: target.data('city'),
                district: target.data('district'),
                county: target.data('town')
            });
            modal.find('#name').val(target.data('contactname'));
            modal.find('#phone').val(target.data('contactphone'));
            modal.find('#address').val(target.data('address'));
            modal.find('#zip').val(target.data('zip'));
            modal.find('#address-tag').val(target.data('addresstag'));

            $('.edit-save-btn').click(function () {
                $.ajax({
                    type: 'PUT',
                    url: "{{url('/user/address/[id]')}}".replace('[id]', target.data('addressid')),
                    data: {
                        _token: '{{csrf_token()}}',
                        'contact_name': modal.find('#name').val(),
                        'area': modal.find('#city-picker').val(),
                        'address': modal.find('#address').val(),
                        'phone': modal.find('#phone').val(),
                        'zip': modal.find('#zip').val(),
                        'tag': modal.find('#address-tag').val(),
                    },
                    cache: false,
                    success: function (res) {
                        if (res.code == 200) {
                            $('#editAddressModal').modal('hide');
                            layer.msg(res.message, {
                                icon: 1,
                                time: 3000,
                                end: function () {
                                    location.href = '{{ url("/user/addresses") }}';
                                }
                            });
                        } else {
                            if (res.hasOwnProperty('contact_name')) {
                                modal.find('#name + .error-msg').text(res.contact_name[0]);
                            }
                            if (res.hasOwnProperty('phone')) {
                                modal.find('#phone + .error-msg').text(res.phone[0]);
                            }
                            if (res.hasOwnProperty('area')) {
                                modal.find('#city-picker').parents('.form-item').find('.error-msg').text(res.area[0]);
                            }
                            if (res.hasOwnProperty('address')) {
                                modal.find('#address + .error-msg').text(res.address[0]);
                            }
                        }
                    },
                    error: function (msg) {
                        layer.msg(msg.responseJSON.message, {
                            icon: 2,
                            time: 2000,
                        });
                        $('#editAddressModal').modal('hide');
                    }
                });
            });
        });

        //删除地址
        $('.del-btn').on('click', function () {
            var addressId = $(this).data('addressid');
            zeroModal.confirm("确定删除此收货地址吗？", function () {
                $.ajax({
                    url: "{{url('/user/address/[id]')}}".replace('[id]', addressId),
                    data: {
                        _token: '{{csrf_token()}}',
                    },
                    dataType: "json",
                    type: "DELETE",
                    success: function (res) {
                        if (res.code == 200) {
                            zeroModal.success(res.message);
                            setInterval(function () {
                                location.href = '{{ url("/user/addresses") }}';
                            }, 1000);
                        }
                    },
                    error: function (msg) {
                        zeroModal.error(msg.responseJSON.message);
                    }
                });
            });
        });

        //设置默认地址
        $('.default-btn').on('click', function () {
            $.ajax({
                url: "{{url('/user/default_address/[id]')}}".replace('[id]', $(this).data('addressid')),
                data: {
                    _token: '{{csrf_token()}}',
                },
                dataType: "json",
                type: "PUT",
                success: function (res) {
                    if (res.code == 200) {
                        zeroModal.success(res.message);
                        setInterval(function () {
                            location.href = '{{ url("/user/addresses") }}';
                        }, 1000);
                    }
                },
                error: function (msg) {
                    zeroModal.error(msg.responseJSON.message);
                }
            });
        });
    </script>
@stop