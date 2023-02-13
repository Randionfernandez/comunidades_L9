<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //    JsonResource::withoutWrapping();

        TestResponse::macro('assertJsonApiValidationErrors',
            function ($attribute) {
                $pointer = Str::of($attribute)->startsWith('data')
                    ? "/" . str_replace('.', '/', $attribute)
                    : "/data/attributes/{$attribute}";

                $this->assertJsonStructure([
                    "errors" => [
                        ['title', 'detail', 'source' => ['pointer']]
                    ]
                ]);

                $this->assertStatus(422);

                $this->assertJsonFragment([
                    'source' => ['pointer' => $pointer]
                ]);

                $this->assertHeader('Content-Type', 'application/vnd.api+json');
            });
    }

}
