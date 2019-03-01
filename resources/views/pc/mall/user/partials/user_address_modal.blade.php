<!-- 模态框主体 -->
<div class="modal-body address-modal-body">
    <form role="form" class="form-horizontal" method="POST" action="{{ url('user/address') }}">
        {{ csrf_field() }}
        <div class="form-group form-item">
            <label for=""><span class="star">*</span>收件人</label>
            <input type="text" id="name" class="form-control" placeholder="收件人">
            <span class="error-msg"></span>
        </div>
        <div class="form-group form-item">
            <label for=""><span class="star">*</span>收货地区</label>
            <input type="text" id="city-picker" name="city-picker" class="form-control city-picker-input"
                   placeholder="省 / 市 / 区(县) / 乡镇" data-toggle="city-picker" style="width: 562px;">
            <span class="error-msg" style="left: 572px;"></span>
        </div>
        <div class="form-group form-item">
            <label for=""><span class="star">*</span>详细地址</label>
            <input type="text" id="address" class="form-control" placeholder="街道名称/小区名称/编号，楼宇名称，单位，房号" style="width: 562px;">
            <span class="error-msg" style="left: 572px;"></span>
        </div>
        <div class="form-group form-item">
            <label for=""><span class="star">*</span>手机号码</label>
            <input type="text" id="phone" class="form-control" placeholder="手机号码">
            <span class="error-msg"></span>
        </div>
        <div class="form-group">
            <label for="">邮政编码</label>
            <input type="text" id="zip" class="form-control" placeholder="邮政编码">
        </div>
        <div class="form-group">
            <label for="">地址标签</label>
            <input type="text" id="address-tag" class="form-control" placeholder="地址标签，如：家、父母家、公司、学校、其他" style="width: 562px;">
        </div>
    </form>
</div>