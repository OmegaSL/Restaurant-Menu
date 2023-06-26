<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;

class SettingComponent extends Component
{
    use WithFileUploads;

    public $site_name;
    public $site_description;
    public $site_logo;
    public $site_favicon;
    public $site_address;
    public $site_email;
    public $site_phone;
    public $products_discount_percent;
    public $products_tax_percent;
    public $site_facebook_link;
    public $site_twitter_link;
    public $site_instagram_link;
    public $site_linkedin_link;
    public $site_youtube_link;
    public $site_whatsapp_number;

    public function render()
    {
        return view('livewire.admin.pages.setting-component')->extends('livewire.admin.layouts.master');
    }

    public function mount()
    {
        $setting = \App\Models\Setting::first();
        $this->site_name = $setting->site_name;
        $this->site_description = $setting->site_description;
        $this->site_logo = $setting->site_logo;
        $this->site_favicon = $setting->site_favicon;
        $this->site_address = $setting->site_address;
        $this->site_email = $setting->site_email;
        $this->site_phone = $setting->site_phone;
        $this->products_discount_percent = $setting->products_discount_percent;
        $this->products_tax_percent = $setting->products_tax_percent;
        $this->site_facebook_link = $setting->site_facebook_link;
        $this->site_twitter_link = $setting->site_twitter_link;
        $this->site_instagram_link = $setting->site_instagram_link;
        $this->site_linkedin_link = $setting->site_linkedin_link;
        $this->site_youtube_link = $setting->site_youtube_link;
        $this->site_whatsapp_number = $setting->site_whatsapp_number;
    }

    public function updateSetting()
    {
        // validate the form
        $this->validate([
            'site_name' => 'required',
            'site_description' => 'nullable|max:500',
            'site_logo' => 'nullable|image|mimes:png,jpg,jpeg',
            'site_favicon' => 'nullable|image|mimes:png,jpg,jpeg',
            'site_address' => 'nullable',
            'site_email' => 'nullable|email',
            'site_phone' => 'nullable',
            'products_discount_percent' => 'required|numeric|between:0,100',
            'products_tax_percent' => 'required|numeric|between:0,100',
            'site_facebook_link' => 'nullable|url',
            'site_twitter_link' => 'nullable|url',
            'site_instagram_link' => 'nullable|url',
            'site_linkedin_link' => 'nullable|url',
            'site_youtube_link' => 'nullable|url',
            'site_whatsapp_number' => 'nullable|numeric|digits_between:10,15',
        ]);

        // check if image is updated
        if ($this->site_logo != null) {
            $this->validate([
                'site_logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ]);

            $this->site_logo = $this->site_logo->store('setting', 'public');
        }

        if ($this->site_favicon != null) {
            $this->validate([
                'site_favicon' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ]);

            $this->site_favicon = $this->site_favicon->store('setting', 'public');
        }

        $setting = \App\Models\Setting::first();
        $setting->site_name = $this->site_name;
        $setting->site_description = $this->site_description;
        $setting->site_logo = $this->site_logo;
        $setting->site_favicon = $this->site_favicon;
        $setting->site_address = $this->site_address;
        $setting->site_email = $this->site_email;
        $setting->site_phone = $this->site_phone;
        $setting->products_discount_percent = $this->products_discount_percent;
        $setting->products_tax_percent = $this->products_tax_percent;
        $setting->site_facebook_link = $this->site_facebook_link;
        $setting->site_twitter_link = $this->site_twitter_link;
        $setting->site_instagram_link = $this->site_instagram_link;
        $setting->site_linkedin_link = $this->site_linkedin_link;
        $setting->site_youtube_link = $this->site_youtube_link;
        $setting->site_whatsapp_number = $this->site_whatsapp_number;
        $setting->save();

        toastr()->success('Setting has been updated successfully!');
    }
}
