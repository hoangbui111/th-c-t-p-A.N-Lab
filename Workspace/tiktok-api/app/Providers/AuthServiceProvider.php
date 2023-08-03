<?php
namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\AdminPolicy; // Thay thế bằng policy tương ứng cho admin

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Admin' => 'App\Policies\AdminPolicy', // Thay thế bằng policy tương ứng cho admin
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-admin-dashboard', 'App\Policies\AdminPolicy@viewDashboard'); // Thay thế bằng method trong policy tương ứng

        // ...
    }
}
