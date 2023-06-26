<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'menu_items';

    /**
     * @var string[]
     */
    protected $fillable = [
        'menu_category_id',
        'name',
        'slug',
        'description',
        'image',
        'additional_images',
        'price',
        'size',
        'status',
    ];

    // cast json to array
    protected $casts = [
        'additional_images' => 'array',
    ];

    /**
     * Get the menu_category that owns the MenuItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu_category(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id', 'id');
    }

    /**
     * Get all of the order_lists for the MenuItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_list(): HasMany
    {
        return $this->hasMany(OrderList::class, 'menu_item_id', 'id');
    }
}
