<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

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
        Blueprint::macro('uuidPrimary', function () {
            $this->uuid('id')->primary();
        });

        Blueprint::macro('foreignUuid', function ($column) {
            $this->uuid($column);
            $this->index([$column]);
        });

        Blueprint::macro('uuidMorphs', function ($name) {
            $this->uuid("{$name}_id");
            $this->string("{$name}_type");
            $this->index(["{$name}_id", "{$name}_type"]);
        });
    }
}
