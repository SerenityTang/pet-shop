<?php

namespace App\Models\Mall;

use App\Models\Core\CoreModel;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends CoreModel
{
    protected $table = 'product_categories';

    protected $fillable = ['name', 'parent_id', 'order'];
}
