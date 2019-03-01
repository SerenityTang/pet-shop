<div class="address-show-item">
    <p class="address-tip">
        <span class="address-tag">@if($address->address_tag == null) {{ $address->province }}
            /{{ $address->city }} @else {{ $address->address_tag }} @endif</span>
        @if($address->default_address)<span class="default-address-tip">默认地址</span> @endif
    </p>

    <p class="address-icon">
        @if(!$address->default_address)
            <span id="default-btn" class="iconfont icon-my-home ico default-btn" title="设置默认地址"
                  data-addressId="{{ $address->id }}"></span>
        @endif
        <span id="edit-btn" class="iconfont icon-edit ico edit-btn" title="编辑" data-toggle="modal"
              data-target="#editAddressModal" data-addressId="{{ $address->id }}"
              data-contactName="{{ $address->contact_name }}" data-contactPhone="{{ $address->contact_phone }}"
              data-province="{{ $address->province }}" data-city="{{ $address->city }}"
              data-district="{{ $address->district }}" data-town="{{ $address->town }}"
              data-address="{{ $address->address }}" data-zip="{{ $address->zip }}"
              data-addressTag="{{ $address->address_tag }}"></span>
        <span id="del-btn" class="iconfont icon-shanchu-m ico del-btn" title="删除"
              data-addressId="{{ $address->id }}"></span>
    </p>
    <div class="address-item-con">
        <div>
            <label class="col-md-2 control-label">收件人</label>
            <div class="col-md-4">
                <p class="form-control-static address-static">{{ $address->contact_name }}</p>
            </div>
        </div>
        <div>
            <label class="col-md-2 control-label">手机号码</label>
            <div class="col-md-4">
                <p class="form-control-static address-static">{{ $address->contact_phone }}</p>
            </div>
        </div>
        <div>
            <label class="col-sm-2 control-label">所在地区</label>
            <div class="col-sm-4">
                <p class="form-control-static address-static">{{ $address->area_address }}</p>
            </div>
        </div>
        <div>
            <label class="col-sm-2 control-label">详细地址</label>
            <div class="col-sm-4">
                <p class="form-control-static address-static">{{ $address->address }}</p>
            </div>
        </div>
    </div>
</div>