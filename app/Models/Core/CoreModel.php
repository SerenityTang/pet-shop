<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/11/7
 * Time: 下午3:19
 */

namespace App\Models\Core;

use App\Models\Traits\UuidModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoreModel extends Model
{
    use UuidModelTrait;
    use SoftDeletes;

    public $incrementing = false;
}