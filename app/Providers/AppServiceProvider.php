<?php

namespace App\Providers;

use App\Services\FootballDataService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // The binding of the football data service.
        app()->singleton('standings', function ($app) {
            return new FootballDataService(env('FOOTBALL_DATA_KEY'), env('FOOTBALL_BASE_URL'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Gates for post permissions.
        Gate::define('edit-post', fn(User $user, Post $post) => $post->user_id==$user->id);
        Gate::define('delete-post', fn(User $user, Post $post) => $post->user_id==$user->id || $user->role_id == Role::IS_SUPERADMIN
        || $user->role_id == Role::IS_ADMIN);

        // Gates for comment permissions.
        Gate::define('edit-comment', fn(User $user, Comment $post) => $post->user_id==$user->id || $user->role_id == Role::IS_SUPERADMIN);
        Gate::define('delete-comment', fn(User $user, Comment $post) => $post->user_id==$user->id || $user->role_id == Role::IS_SUPERADMIN
        || $user->role_id == Role::IS_ADMIN);        

        // Gates for like permissions.
        Gate::define('like-model', fn(User $user, Model $likeableModel) => $likeableModel->user_id != $user->id);

        // Gates for profile edit permissions.
        Gate::define('edit-profile', fn(User $user, Profile $profile) => $profile->user_id == $user->id);

        // Gates for admin permissions

        Gate::define('access-admin', fn(User $user) => $user->role_id == Role::IS_ADMIN ||
        $user->role_id == Role::IS_SUPERADMIN);
        Gate::define('edit-admins', fn(User $user) => $user->role_id == Role::IS_SUPERADMIN);
    }
}
