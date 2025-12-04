<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('edit-post', fn(User $user, Post $post) => $post->user_id==$user->id || $user->role_id == Role::IS_SUPERADMIN);
        Gate::define('delete-post', fn(User $user, Post $post) => $post->user_id==$user->id || $user->role_id == Role::IS_SUPERADMIN
        || $user->role_id == Role::IS_ADMIN);

        Gate::define('edit-comment', fn(User $user, Comment $post) => $post->user_id==$user->id || $user->role_id == Role::IS_SUPERADMIN);
        Gate::define('delete-comment', fn(User $user, Comment $post) => $post->user_id==$user->id || $user->role_id == Role::IS_SUPERADMIN
        || $user->role_id == Role::IS_ADMIN);        

        Gate::define('like-model', fn(User $user, Model $likeableModel) => $likeableModel->user_id != $user->id);

        Gate::define('edit-profile', fn(User $user, Profile $profile) => $profile->user_id == $user->id);

    }
}
