<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;//for string length changing
use App\Channel; //for using the channel_name in every page
use View;
use Mail;
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
        Schema::defaultStringLength(191);
        View::share('channels',Channel::all()); //variable channels can be used everywhere in our app now


        //https://stackoverflow.com/questions/35304197/laravel-email-with-queue-550-error-too-many-emails-per-second
        $throttleRate = config('mail.throttleToMessagesPerMin');
                if ($throttleRate) {
                    $throttlerPlugin = new \Swift_Plugins_ThrottlerPlugin($throttleRate, \Swift_Plugins_ThrottlerPlugin::MESSAGES_PER_MINUTE);
                    Mail::getSwiftMailer()->registerPlugin($throttlerPlugin);
                }
              }


}
