<b>module-manager</b>


module for laravel nwidart connect voyager admin panel 
<hr/>

step 01 : clone this project in your project <br/>
step 02 : composer require zanysoft/laravel-zip <br/>


After updating composer, add the ServiceProvider to the providers array in config/app.php<br/>

ZanySoft\Zip\ZipServiceProvider::class, <br/>

You can optionally use the facade for shorter code. Add this to your facades: <br/>

'Zip' => ZanySoft\Zip\ZipFacade::class,<br/>

step 04 : php artisan module:seed ModuleManager  <br/>

step 03 : composer update 



