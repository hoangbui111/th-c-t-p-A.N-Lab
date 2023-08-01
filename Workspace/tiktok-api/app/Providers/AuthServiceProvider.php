<?php
namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    
        // Gate cho admin
        Gate::define('view-admin-dashboard', function ($user) {
            return $user->isAdmin();
        });
    
        // Gate cho người dùng thông thường
        Gate::define('view-user-dashboard', function ($user) {
            return $user->isUser();
        });
   }
}