<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

//     public function authenticated(Request $request, $user)
// {
//     if ($user->is_admin) {
//         return redirect('/admin/dashboard/User');  // Redirigir al panel de administración si es administrador
//     }

//     return redirect('/panel/User');  // Redirigir al panel de usuario normal si no es administrador
// }
public function authenticated(Request $request, $user) {
    // dd($executeJavascript2);
    // Comprobar si el email del usuario está verificado
    if (!$user->hasVerifiedEmail()) {
        Auth::logout();
        // $user->sendEmailVerificationNotification();
        // Redirigir al usuario a la página de verificación de email
        return redirect()->route('verification.resend')->with('resent', true);
    }
   // Captura el parámetro desde la query string
   $executeReserv2 = $request->query('executeReserv2', false);

    if ($executeReserv2 !== null) {
        // session()->flash('openOffcanvas', $redirectOffcanvas);
        return redirect()->route('reserServInit');
    }

    return $user->is_admin
        ? redirect('/admin/dashboard/User')
        : redirect('/panel/User');
}
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
