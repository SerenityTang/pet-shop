<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/11/7
 * Time: 下午3:24
 */

namespace App\Models\Traits;

use App\Services\Uuid\UUID;

trait UuidModelTrait
{
    public function getIncrementing()
    {
        return false;
    }

    public static function bootUuidModelTrait()
    {
        static::creating(function ($model) {
            if (!is_null($model->getKeyName()) && !isset($model->attributes[$model->getKeyName()])) {
                $model->incrementing = false;
                $id = UUID::id();
                $model->attributes[$model->getKeyName()] = $id;
            }
        }, 0);
    }
}