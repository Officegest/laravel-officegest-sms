<?php
namespace OfficegestSms;
use Illuminate\Support\ServiceProvider;
class OfficegestSmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //nothing to include
    }
    public function register()
    {
        // Register the config publish path
        $configPath = __DIR__ . '/config/officegest-sms.php';
        $this->mergeConfigFrom($configPath, 'officegest-sms');
        $this->publishes([$configPath => config_path('officegest-sms.php')], 'config');
    }
}
