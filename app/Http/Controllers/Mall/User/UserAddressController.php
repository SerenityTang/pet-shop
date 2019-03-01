<?php

namespace App\Http\Controllers\Mall\User;

use App\Http\Controllers\Core\CoreController;
use App\Models\Mall\UserAddress;
use App\Repositories\Mall\User\UserAddressRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends CoreController
{
    protected $userAddressRepository;

    public function __construct(UserAddressRepository $userAddressRepository)
    {
        $this->userAddressRepository = $userAddressRepository;
    }

    /**
     * 用户收货地址列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->userAddressRepository->userAddressList();

        return view('pc.mall.user.address', $list);
    }

    public function store(Request $request)
    {
        $validateResult = $this->commonValidate($request, [
            'contact_name' => 'required',
            'area' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/^1[34578][0-9]{9}$/',
        ]);
        if (!is_null($validateResult)) return $validateResult;

        $contactName = $request->input('contact_name');

        $area = explode('/', $request->input('area'));
        if (count($area) == 3) {
            $this->jsonErrorBadRequest('此地区不支持...');
        } else {
            $province = $area[0];
            $city = $area[1];
            $district = $area[2];
            $town = $area[3];
        }

        $address = $request->input('address');
        $contactPhone = $request->input('phone');
        $zip = $request->input('zip');
        $addressTag = $request->input('tag');
        $userId = Auth::user()->id;

        $this->userAddressRepository->saveAddress($contactName, $province, $city, $district, $town, $address,
            $contactPhone, $zip, $addressTag, $userId);

        return $this->jsonResult(200, '添加收货地址成功');
    }

    public function update(Request $request, $id)
    {
        $userAddress = UserAddress::findOrFail($id);
        $this->authorize('update', $userAddress);

        $validateResult = $this->commonValidate($request, [
            'contact_name' => 'required',
            'area' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/^1[34578][0-9]{9}$/',
        ]);
        if (!is_null($validateResult)) return $validateResult;

        $contactName = $request->input('contact_name');

        $area = explode('/', $request->input('area'));
        if (count($area) == 3) {
            $this->jsonErrorBadRequest('此地区不支持...');
        } else {
            $province = $area[0];
            $city = $area[1];
            $district = $area[2];
            $town = $area[3];
        }

        $address = $request->input('address');
        $contactPhone = $request->input('phone');
        $zip = $request->input('zip');
        $addressTag = $request->input('tag');

        $this->userAddressRepository->editAddress($contactName, $province, $city, $district, $town, $address,
            $contactPhone, $zip, $addressTag, $id);

        return $this->jsonResult(200, '编辑收货地址成功');
    }

    public function updateDefault($id)
    {
        $userAddress = UserAddress::findOrFail($id);
        $this->authorize('update', $userAddress);

        $this->userAddressRepository->editDefaultAddress($id);

        return $this->jsonResult(200, '设置默认收货地址成功');
    }

    public function destroy($id)
    {
        $userAddress = UserAddress::findOrFail($id);
        $this->authorize('delete', $userAddress);

        $this->userAddressRepository->delAddress($id);

        return $this->jsonResult(200, '删除收货地址成功');
    }
}
