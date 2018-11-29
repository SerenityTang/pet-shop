<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends CoreModel
{
    protected $table = 'user_addresses';

    protected $fillable = ['user_id', 'contact_name', 'contact_phone', 'province', 'city', 'district', 'address', 'zip', 'address_tag', 'last_used_at'];

    protected $date = ['last_used_at'];

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
     * 收货详细地址
     *
     * @return string
     */
    public function getFullAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }
}
