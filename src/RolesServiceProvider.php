<?php

namespace GeniusTS\Roles;


use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../resources/config/roles.php' => config_path('roles.php'),
            ],
            'config'
        );

        $this->loadMigrationsFrom(__DIR__ . '/../resources/migrations/');

        $this->registerBladeExtensions();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../resources/config/roles.php', 'roles');
    }

    /**
     * Register Blade extensions.
     *
     * @return void
     */
    protected function registerBladeExtensions()
    {
        $blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();

        $blade->directive('role',
            function ($expression)
            {
                return "<?php if (Auth::check() && Auth::user()->isRole({$expression})): ?>";
            });

        $blade->directive('endrole',
            function ()
            {
                return "<?php endif; ?>";
            });

        $blade->directive('permission',
            function ($expression)
            {
                return "<?php if (Auth::check() && Auth::user()->can({$expression})): ?>";
            });

        $blade->directive('endpermission',
            function ()
            {
                return "<?php endif; ?>";
            });

        $blade->directive('level',
            function ($expression)
            {
                $level = trim($expression, '()');

                return "<?php if (Auth::check() && Auth::user()->level() >= {$level}): ?>";
            });

        $blade->directive('endlevel',
            function ()
            {
                return "<?php endif; ?>";
            });

        $blade->directive('allowed',
            function ($expression)
            {
                return "<?php if (Auth::check() && Auth::user()->allowed({$expression})): ?>";
            });

        $blade->directive('endallowed',
            function ()
            {
                return "<?php endif; ?>";
            });
    }
}
