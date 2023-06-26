<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("site_name");
            $table->string("site_description")->nullable();
            $table->string("site_logo")->nullable();
            $table->string("site_favicon")->nullable();
            $table->string("site_address")->nullable();
            $table->string("site_email")->nullable();
            $table->string("site_phone")->nullable();
            $table->integer("products_discount_percent")->default(0);
            $table->integer("products_tax_percent")->default(0);
            $table->string("site_facebook_link")->nullable();
            $table->string("site_twitter_link")->nullable();
            $table->string("site_instagram_link")->nullable();
            $table->string("site_linkedin_link")->nullable();
            $table->string("site_youtube_link")->nullable();
            $table->string("site_whatsapp_number")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
