<?php

namespace App\Models\Mall;

use App\Models\Core\CoreModel;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends CoreModel
{
    protected $table = 'product_skus';

    protected $fillable = ['title', 'description', 'price', 'stock', 'stock_warning', 'product_id'];

    /**
     * 商品sku所属商品
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
