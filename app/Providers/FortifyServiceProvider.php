<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;
use Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;

class FortifyServiceProvider extends ServiceProvider
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
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        // Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });

        /**
         * --- IGNORE ---
         * Author : Ye Htun
         * Date : 2024-08-23
         * This section is used to authenticate users.
         * It checks the user's credentials and ensures they are not already logged in from another device.
         * If the user is already logged in, it throws a validation exception.
         * If the credentials are valid, it logs the user in and regenerates the session.
         */

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where(Fortify::username(), $request->{Fortify::username()})->first();
            if (! $user || ! Hash::check($request->password, $user->password)) {
                return null;
            }

            //Check if session already exists and still active
            $hasActiveSession = DB::table('sessions')
                ->where('user_id', $user->id)
                ->where('last_activity', '>', now()->subMinutes(config('session.lifetime'))->timestamp)
                ->exists();

            if ($hasActiveSession) {
                throw ValidationException::withMessages([
                    Fortify::username() => ['This user is already logged in on another device.'],
                ]);
            }
            if (!$user->is_active) {
                throw ValidationException::withMessages([
                    Fortify::username() => ['This account is inactive. Please contact support.'],
                ]);
            }
            if ($user->roles->isEmpty()) {
                throw ValidationException::withMessages([
                    Fortify::username() => ['No roles assigned. Please contact admin.'],
                ]);
            }
            if (!$user->roles->contains(fn($role) => $role->is_active)) {
                throw ValidationException::withMessages([
                    Fortify::username() => ['Inactive role. Please contact admin.'],
                ]);
            }
            if (Gate::forUser($user)->denies('dashboard-login')) {
                throw ValidationException::withMessages([
                    Fortify::username() => ['No access Dashboard Login. Please contact admin.'],
                ]);
            }

            return $user;
        });



        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        /**
         * --- IGNORE ---
         * Author : Ye Htun
         * This section is used to prepend the admin views directory to the view finder.
         * This allows the application to look for views in the admin directory first.
         */

        View::getFinder()->prependLocation(resource_path('views/admin'));
    }
}
