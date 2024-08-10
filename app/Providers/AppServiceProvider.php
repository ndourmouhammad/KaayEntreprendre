<?php

namespace App\Providers;
use App\Models\Reservation;
use Illuminate\Support\ServiceProvider;
use App\Policies\ReservationPolicy;
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
        //
    }
    protected $policies = [
        Reservation::class => ReservationPolicy::class,
    ];
}
