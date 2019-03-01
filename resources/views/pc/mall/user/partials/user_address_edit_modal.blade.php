<!-- 模态框 -->
<div class="modal fade" id="editAddressModal">
    <div class="modal-dialog" style="width: 760px;">
        <div class="modal-content address-modal-content">

            <!-- 模态框头部 -->
            <div class="modal-header address-modal-header">
                <h5 class="modal-title address-modal-title">编辑收货地址</h5>
                <button type="button" class="close address-modal-close" data-dismiss="modal">&times;</button>
            </div>

            @include('pc.mall.user.partials.user_address_modal')

            <!-- 模态框底部 -->
            <div class="modal-footer address-modal-footer">
                <a href="javascript:void(0);" id="edit-save-btn" class="btn save-btn edit-save-btn" data-addressId="">保存</a>
                <a id="cancel-btn" class="btn cancel-btn" data-dismiss="modal">取消</a>
            </div>

        </div>
    </div>
</div>