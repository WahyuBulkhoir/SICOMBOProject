<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\PikrMember;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Testimonial;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->composer('superadmin.navbar', function ($view) {

            $totalMembers = PikrMember::count();
            $view->with('totalMembers', $totalMembers);

            $totalSellers = User::whereIn('usertype', ['admin', 'seller'])->count();
            $view->with('totalSellers', $totalSellers);

            $totalProducts = Product::count(); 
            $view->with('totalProducts', $totalProducts);

            $totalOrders = Order::count();

            $codOrders = Order::where('payment_status', 'cash on delivery')->count();
            $view->with('codOrders', $codOrders);

            $stripeOrders = Order::where('payment_status', 'paid')->count();
            $view->with('stripeOrders', $stripeOrders);

            $totalCustomers = Order::distinct('user_id')->count('user_id');
            $view->with('totalCustomers', $totalCustomers);

            $codPercentage = $totalOrders > 0 ? round(($codOrders / $totalOrders) * 100, 2) : 0;
            $view->with('codPercentage', $codPercentage);

            $stripePercentage = $totalOrders > 0 ? round(($stripeOrders / $totalOrders) * 100, 2) : 0;
            $view->with('stripePercentage', $stripePercentage);
            
        });
    }
}
