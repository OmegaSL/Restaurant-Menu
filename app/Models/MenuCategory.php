<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuCategory extends Model
{
    use HasFactory;

    protected $table = 'menu_categories';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    /**
     * Get all of the menu_items for the MenuCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menu_items(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
