<?php

namespace Acme\Support\Http\View;

use League\Plates\Engine;

class LeagueView implements View
{
    /**
     * @var Engine
     */
    private $engine;

    /**
     * @param Engine $engine
     */
    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * Render template with data.
     *
     * @param string $template
     * @param array $data
     * @return string
     */
    public function render($template, $data = [])
    {
        return $this->engine->render($template, $data);
    }
}
