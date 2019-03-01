<?php

namespace App\Models\Mall;

use App\Models\Core\CoreModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends CoreModel
{
    protected $table = 'user_addresses';

    protected $fillable = ['user_id', 'contact_name', 'contact_phone', 'province', 'city', 'district', 'town',
        'address', 'zip', 'address_tag', 'last_used_at', 'default_address'];

    protected $date = ['last_used_at'];

    protected $casts = [
        'default_address' => 'boolean',
    ];

    /**
     * 收货地址所属用户
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * 收货地址所属地区
     *
     * @return string
     */
    public function getAreaAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->town}";
    }

    /**
     * 收货完整地址
     *
     * @return string
     */
    public function getFullAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->town}{$this->address}";
    }
}
