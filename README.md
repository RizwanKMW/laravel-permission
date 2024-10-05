# laravel-permission
Spatie CRUD, On roles, users, permissions
1.

    composer create-project laravel/laravel example-app

2.  setup mysql in .env file

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=dbNAMEhere
    DB_USERNAME=root
    DB_PASSWORD=

3\. install laravel breeze, or any other module that used for user authentication

**4\.  Install the Spatie Package with the following command:**

    composer require spatie/laravel-permission

5\. The service provider will automatically get registered. Or you may manually add the service provider in your **config/app.php** file:

    'providers' => [
        // ...
        Spatie\Permission\PermissionServiceProvider::class,
    ];

6\. publish the migration

    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    
    php artisan migrate

7\. This package comes with **RoleMiddleware, PermissionMiddleware and RoleOrPermissionMiddleware** middleware. You can add them inside your **app/Http/Kernel.php** file to be able to use them through aliases.

    // Note: Laravel 10+ uses $middlewareAliases = [
    protected $middlewareAliases = [
        // ...
        'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
        'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
    ];

8\. Add the necessary trait to your User model ( **app/Models/User.php** ) :

    class User extends Authenticatable
    {
        use HasRoles;

9\. CREATE ROUTES

    Route::group(['middleware' => ['role:super-admin|admin']], function() {
    
        Route::resource('permissions', App\Http\Controllers\PermissionController::class);
        Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);
    
        Route::resource('roles', App\Http\Controllers\RoleController::class);
        Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
        Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
        Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);
    
        Route::resource('users', App\Http\Controllers\UserController::class);
        Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
    
    });

10. Replace controllers and views and access the route abc.com/roles
