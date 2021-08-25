module-manager


module for laravel nwidart connect voyager admin panel

step 01 : clone this project in your project
step 02 : composer require zanysoft/laravel-zip


After updating composer, add the ServiceProvider to the providers array in config/app.php

ZanySoft\Zip\ZipServiceProvider::class,
You can optionally use the facade for shorter code. Add this to your facades:

'Zip' => ZanySoft\Zip\ZipFacade::class,


step 03 : composer update

step 04 : php artisan module:seed ModuleManager

