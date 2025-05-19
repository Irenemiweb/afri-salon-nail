<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

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
       VerifyEmail::toMailUsing(function ($notifiable, $url){
        return (new MailMessage)
        ->greeting('Saludos desde ' . config('app.name') . ' Nail art studio !!')
        ->subject(Lang::get('Verify Email Address'))
        ->line(Lang::get('Please click the button below to verify your email address.'))
        ->action(Lang::get('Verify Email Address'), $url)
        ->line(Lang::get('If you did not create an account, no further action is required.'))
        ->salutation('¡Nos vemos pronto!');
    });
    }
}
