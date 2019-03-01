<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2019/2/20
 * Time: 下午5:04
 */

namespace App\Repositories\Mall\User;


use App\Models\Mall\UserAddress;
use App\Repositories\Core\CoreRepository;
use Illuminate\Support\Facades\Auth;

class UserAddressRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(new UserAddress());
    }

    /**
     * 用户收货地址列表处理
     *
     * @return array
     */
    public function userAddressList()
    {
        $userAddress = Auth::user()->userAddress;
        $userAddressCount = count($userAddress);
        $ableUserAddressCount = config('global.mall_address') - $userAddressCount;

        return ['userAddress' => $userAddress, 'userAddressCount' => $userAddressCount,
            'ableUserAddressCount' => $ableUserAddressCount];
    }

    public function saveAddress($contactName, $province, $city, $district, $town, $address, $contactPhone, $zip,
                                $addressTag, $userId)
    {
        $model = $this->model->create([
            'user_id' => $userId,
            'contact_name' => $contactName,
            'contact_phone' => $contactPhone,
            'province' => $province,
            'city' => $city,
            'district' => $district,
            'town' => $town,
            'address' => $address,
            'zip' => $zip,
            'address_tag' => $addressTag
        ]);

        if (!$model) $this->jsonErrorBadRequest('添加收货地址失败');
        return $model;
    }

    public function editAddress($contactName, $province, $city, $district, $town, $address,
                                $contactPhone, $zip, $addressTag, $addressId)
    {
        $model = $this->model->find($addressId);
        $model->contact_name = $contactName;
        $model->province = $province;
        $model->city = $city;
        $model->district = $district;
        $model->town = $town;
        $model->address = $address;
        $model->contact_phone = $contactPhone;
        $model->zip = $zip;
        $model->address_tag = $addressTag;

        if (!$model->save()) $this->jsonErrorBadRequest('编辑收货地址失败');
        return true;
    }

    public function editDefaultAddress($addressId)
    {
        $defaultAddressModel = $this->model->where('default_address', true)->first();
        if ($defaultAddressModel) {
            $defaultAddressModel->default_address = false;
            $defaultAddressModel->save();
        }

        $model = $this->model->find($addressId);
        $model->default_address = true;

        if (!$model->save()) $this->jsonErrorBadRequest('设置默认收货地址失败');
        return true;
    }

    public function delAddress($addressId)
    {
        $model = $this->model->find($addressId)->delete();

        if (!$model) $this->jsonErrorBadRequest('删除收货地址失败');
        return $model;
    }
}