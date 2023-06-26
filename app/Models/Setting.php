<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = "settings";

    protected $fillable = [
        "site_name",
        "site_description",
        "site_logo",
        "site_favicon",
        "site_address",
        "site_email",
        "site_phone",
        "products_discount_percent",
        "products_tax_percent",
        "site_facebook_link",
        "site_twitter_link",
        "site_instagram_link",
        "site_linkedin_link",
        "site_youtube_link",
        "site_whatsapp_number",
    ];
}
