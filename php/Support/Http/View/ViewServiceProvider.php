<?php

namespace Acme\Support\Http\View;

use Acme\Support\Container\ServiceProvider;
use League\Plates\Engine;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(View::class, [$this, 'make']);

        $this->container->alias('view', View::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            View::class,
            'view',
        ];
    }

    /**
     * Make a new View.
     *
     * @return View
     */
    public function make()
    {
        $app = $this->container->get('app');
        return new LeagueView(new Engine($app->templatePath()));
    }
}
