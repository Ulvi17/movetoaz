<?php

use App\Models\Aksiyalar;
use App\Models\User;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\ContactUs;
use App\Models\Faqs;
use App\Models\Partners;
use App\Models\Products;
use App\Models\ProductServices;
use App\Models\Services;
use App\Models\Settings;
use App\Models\Sliders;
use App\Models\StandartPages;
use App\Models\SubscriptionPackages;
use App\Models\Teams;
use App\Models\Translates;
use App\Models\WhyChooseUs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

if (!function_exists('getImageUrl')) {
    function getImageUrl($image, $clasore)
    {
        $url = public_path('uploads/' . $clasore . '/' . $image);
        try {
            $tempurl = '/uploads/' . $clasore . '/' . $image;
            return url($tempurl);
        } catch (\Exception $e) {
            Log::info([
                '----------------GET IMAGE ERROR-----------------',
                $e->getMessage(),
                $e->getLine()
            ]);
            return url($tempurl);
        }
    }
}

if (!function_exists('strip_tags_with_whitespace')) {
    function strip_tags_with_whitespace($string, $allowable_tags = null)
    {
        $string = str_replace('<', ' <', $string);
        $string = preg_replace('/\p{Z}/u', ' ', $string);
        $string = str_replace(['&nbsp;', '\u{A0}'], ' ', $string);
        $string = strip_tags($string, $allowable_tags);
        $string = preg_replace('/\s+/', ' ', $string);
        $string = trim($string);

        return $string;
    }
}

if (!function_exists('createRandomCode')) {
    function createRandomCode($type = "int", $length = 4)
    {
        if ($type == "int") {
            if ($length == 4) {
                return random_int(1000, 9999);
            }
        } elseif ($type == "string") {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    }
}

if (!function_exists('dbdeactive')) {
    function dbdeactive()
    {
        DB::connection()->disconnect();
        Cache::flush();
    }
}

if (!function_exists('image_upload')) {
    function image_upload($image, $clasor, $imagename = null)
    {
        try {
            $img = $imagename ?? time() . createRandomCode("string", 12);
            $filename = $img . '.' . $image->extension();
            $image->storeAs($clasor, $filename, 'uploads');
            return $filename;
        } catch (\Exception $e) {
            Log::info([
                '------------------IMAGE UPLOAD ERROR-----------------',
                $e->getMessage(),
                $e->getLine(),
            ]);
        }
    }
}

if (!function_exists('file_upload')) {
    function file_upload($file, $clasor, $name = null)
    {
        $fl = $name ?? time() . createRandomCode("string", 12);
        $filename = $fl . '.' . $file->getClientOriginalExtension();
        $file->storeAs($clasor, $filename, 'uploads');
        return $filename;
    }
}

if (!function_exists('delete_image')) {

    function delete_image($image, $clasor)
    {
        if (Storage::disk('uploads')->exists($clasor . '/' . $image)) {
            Storage::disk('uploads')->delete($clasor . '/' . $image);
            return true;
        }
        return false;
    }
}

if (!function_exists("translateWithFallback")) {
    function translateWithFallback($text, $targetLanguage)
    {
        try {
            return trim(GoogleTranslate::trans($text, $targetLanguage));
        } catch (\Exception $e) {
            return $text;
        }
    }
}

if (!function_exists('settings')) {
    function settings($key = null, $type = null)
    {
        $model = Settings::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            if ($type == 'domain')
                $model = $model->where('domain', $key);
            else
                $model = $model->where("id", $key);

            $model = $model->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("settings" . $key . $type . Session::getId(), fn() => $model);
    }
}

if (!function_exists('categories')) {
    function categories($key = null, $type = null)
    {
        $model = Categories::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->where('status', true)->get();
            else if ($type == 'slug')
                $model = $model->where('slugs->az_slug', $key)->where('slugs->en_slug', $key)->where('slugs->ru_slug', $key)->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("categories" . $key . $type, fn() => $model);
    }
}

if (!function_exists('standartpages')) {
    function standartpages($key = null, $type = null)
    {
        $model = StandartPages::orderBy('order_number', 'ASC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->where("status", true)->get();
            else if ($type == 'slug')
                $model = $model->where('setting_id', session()->get("setting_id"))->where(function ($q) use ($key) {
                    $q->where('slugs->az_slug', $key)->orWhere('slugs->en_slug', $key)->orWhere('slugs->ru_slug', $key);
                })->first();
            else if ($type == 'type')
                $model = $model->where('slugs->az_slug', $key)->first();
            else if ($type == 'typewithdomain')
                $model = $model->where('slugs->az_slug', $key)->where('setting_id', session()->get("setting_id"))->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("standartpages" . $key . $type, fn() => $model);
    }
}

if (!function_exists('sliders')) {
    function sliders($key = null, $type = null)
    {
        $model = Sliders::orderBy('order_number', 'ASC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->where('status', true)->get();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("sliders" . $key . $type, fn() => $model);
    }
}

if (!function_exists('faqs')) {
    function faqs($key = null, $type = null)
    {
        $model = Faqs::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->get();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("faqs" . $key . $type, fn() => $model);
    }
}

if (!function_exists('blogs')) {
    function blogs($key = null, $type = null)
    {
        $model = Blogs::orderBy('order_number', 'ASC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->where('status', true)->get();
            else if ($type == 'slug')
                $model = $model->where("slugs->az_slug", $key)->orWhere("slugs->ru_slug", $key)->orWhere("slugs->en_slug", $key)->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("blogs" . $key . $type . Session::getId(), fn() => $model);
    }
}

if (!function_exists('teams')) {
    function teams($key = null, $type = null)
    {
        $model = Teams::orderBy('order_number', 'ASC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->where('status', true)->get();
            else if ($type == 'slug')
                $model = $model->where('slugs->az_slug', $key)->orWhere('slugs->en_slug', $key)->orWhere('slugs->ru_slug', $key)->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("teams" . $key . $type, fn() => $model);
    }
}

if (!function_exists('whychooseus')) {
    function whychooseus($key = null, $type = null)
    {
        $model = WhyChooseUs::orderBy('order_number', 'ASC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->where('status', true)->get();
            else if ($type == 'slug')
                $model = $model->where('slugs->az_slug', $key)->where('slugs->en_slug', $key)->where('slugs->ru_slug', $key)->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("whychooseus" . $key . $type, fn() => $model);
    }
}

if (!function_exists('contactus')) {
    function contactus($key = null, $type = null)
    {
        $model = ContactUs::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->get();
            else if ($type == 'slug')
                $model = $model->where('slugs->az_slug', $key)->where('slugs->en_slug', $key)->where('slugs->ru_slug', $key)->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("contactus" . $key . $type, fn() => $model);
    }
}

if (!function_exists('services')) {
    function services($key = null, $type = null)
    {
        $model = Services::orderBy('order_number', 'ASC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->where('status', true)->get();
            else if ($type == 'top_null_setting_id')
                $model = $model->where('setting_id', $key)->where('status', true)->orderBy('order_number', 'ASC')->whereNull('top_service_id')->get();
            else if ($type == 'top_null')
                $model = $model->where('status', true)->orderBy('order_number', 'ASC')->whereNull('top_service_id')->get();
            else if ($type == 'top_service_id')
                $model = $model->where('top_service_id', $key)->where('status', true)->get();
            else if ($type == 'slug')
                $model = $model->where(function ($q) use ($key) {
                    $q->where('slugs->az_slug', $key)->orWhere('slugs->en_slug', $key)->orWhere('slugs->ru_slug', $key);
                })->where('setting_id', session()->get('setting_id'))->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("services" . $key . $type, fn() => $model);
    }
}

if (!function_exists('products')) {
    function products($key = null, $type = null)
    {
        $model = Products::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->get();
            else if ($type == 'category_id')
                $model = $model->where('category_id', $key)->get();
            else if ($type == 'category_slug')
                $model = $model->whereHas("category", function ($query) use ($key) {
                    $query->where("slugs->az_slug", $key)->orWhere("slugs->ru_slug", $key)->orWhere("slugs->en_slug", $key);
                })->get();
            else if ($type == 'slug')
                $model = $model->where('slugs->az_slug', $key)->orWhere('slugs->en_slug', $key)->orWhere('slugs->ru_slug', $key)->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("products" . $key . $type, fn() => $model);
    }
}

if (!function_exists('users')) {
    function users($key = null)
    {
        $model = User::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            $model = $model->where('id', $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("users" . $key, fn() => $model);
    }
}

if (!function_exists("product_has_service")) {
    function product_has_service($service_id = null, $product_id = null)
    {
        $model = ProductServices::orderBy('id', 'DESC');
        if (isset($service_id) && !empty($service_id)) {
            $model = $model->where('service_id', $service_id);
        }

        if (isset($product_id) && !empty($product_id)) {
            $model = $model->where('product_id', $product_id);
        }

        $model = $model->first();
        return Cache::rememberForever("product_has_service" . $service_id . $product_id, fn() => $model);
    }
}

if (!function_exists('partners')) {
    function partners($key = null, $type = null)
    {
        $model = Partners::orderBy('order_number', 'ASC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->where('status', true)->get();
            else if ($type == 'slug')
                $model = $model->where('slugs->az_slug', $key)->where('slugs->en_slug', $key)->where('slugs->ru_slug', $key)->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("partners" . $key . $type, fn() => $model);
    }
}

if (!function_exists('aksiyalar')) {
    function aksiyalar($key = null, $type = null)
    {
        $model = Aksiyalar::orderBy('order_number', 'ASC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->where('status', true)->get();
            else if ($type == 'slug')
                $model = $model->where('slugs->az_slug', $key)->orWhere('slugs->en_slug', $key)->orWhere('slugs->ru_slug', $key)->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("aksiyalar" . $key . $type, fn() => $model);
    }
}

if (!function_exists('subscription_packages')) {
    function subscription_packages($key = null, $type = null)
    {
        $model = SubscriptionPackages::orderBy('order_number', 'ASC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->where('status', true)->get();
            else if ($type == 'category_id')
                $model = $model->where('category_id', $key)->where('status', true)->get();
            else if ($type == 'slug')
                $model = $model->where('slugs->az_slug', $key)->orWhere('slugs->en_slug', $key)->orWhere('slugs->ru_slug', $key)->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("subscription_packages" . $key . $type, fn() => $model);
    }
}

if (!function_exists('translates')) {
    function translates($key = null, $type = null)
    {
        $model = Translates::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            if ($type == 'key')
                $model = $model->where('key', $key)->get();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("translates" . $key . $type, fn() => $model);
    }
}

if (!function_exists('subscription_packages')) {
    function subscription_packages($key = null, $type = null)
    {
        $model = SubscriptionPackages::orderBy('order_number', 'ASC')->where("status", true)->where("setting_id", session()->get("setting_id"));
        if (isset($key) && !empty($key)) {
            if ($type == 'key')
                $model = $model->where('key', $key)->get();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("subscription_packages" . $key . $type, fn() => $model);
    }
}

if (!function_exists('convert_locale')) {
    function convert_locale($data, $type = 'name', $locale = null)
    {
        $model = null;
        if (empty($locale))
            $locale = app()->getLocale();

        $dat = Translates::where("key", $data)->orderBy('id', 'DESC')->first();
        if ($dat) {
            $model = $dat->value[$locale . '_value'];
        }

        return Cache::rememberForever("convert_locale" . $data . $type . $locale, fn() => $model);
    }
}


if (!function_exists('explode_from_data')) {
    function explode_from_data($data, $extract = '/', $get = 0)
    {
        $model = explode($extract, $data);
        if ($model[$get])
            return $model[$get];
        else
            return $model[0];
    }
}
