<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
        // Model::preventSilentlyDiscardingAttributes();

        Str::macro('translate', function (string $string, ?string $locale = null) {
            $locale ??= app()->getLocale();
            return Str::isJson($string) ? json_decode($string)[$locale] ?? $string : $string;
        });
    }
}
