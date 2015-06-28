<?php

namespace Acme\Support\Translator;

use Acme\Support\Container\ServiceProvider;
use Symfony\Component\Translation\Loader\ArrayLoader;
use Symfony\Component\Translation\Translator as STranslator;

class TranslatorServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(Translator::class, [$this, 'make']);

        $this->container->alias('translator', Translator::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            Translator::class,
            'translator',
        ];
    }

    /**
     * Make a Translator.
     *
     * @return Translator
     */
    public function make()
    {
        $config = $this->container->get('config');

        $app = $this->container->get('app');

        $translator = new STranslator($config->get('locales.default'));

        $translator->addLoader('array', new ArrayLoader());

        $locales = array_diff(scandir($app->localePath()), ['.', '..']);

        foreach ($locales as $locale) {
            $localePath = $app->localePath() . '/' . $locale;

            if (! is_dir($localePath)) {
                continue;
            }

            foreach (glob($localePath . '/*.php') as $file) {
                $resource = require $file;

                $translator->addResource('array', $resource, $locale, null);
            }
        }

        $translator->setFallbackLocales([$config->get('locales.fallback')]);

        return new SymfonyTranslator($translator);
    }
}
