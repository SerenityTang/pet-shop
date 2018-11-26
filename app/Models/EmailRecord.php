<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailRecord extends CoreModel
{
    protected $table = 'email_records';

    protected $fillable = ['user_id', 'code', 'status', 'url', 'remarks', 'activated_at', 'expired_at'];

    protected $date = ['activated_at', 'expired_at'];
}
