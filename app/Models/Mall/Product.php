<?php

namespace App\Models\Mall;

use App\Models\Core\CoreModel;
use Illuminate\Database\Eloquent\Model;

class Product extends CoreModel
{
    protected $table = 'products';

    protected $fillable = ['title', 'description', 'image', 'on_sale', 'rating', 'sold_count', 'review_count',
        'category_id'];

    protected $casts = [
        'on_sale' => 'boolean',
    ];

    /**
     * 商品拥有的商品sku
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productSkus()
    {
        return $this->hasMany(ProductSku::class, 'product_id', 'id');
    }
}
