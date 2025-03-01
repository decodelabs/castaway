<?php

/**
 * @package Castaway
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Castaway\Island;

use DecodeLabs\Castaway\Island;
use DecodeLabs\Greenleaf\ActionTrait;
use DecodeLabs\Harvest;
use DecodeLabs\Singularity\Url\Leaf as LeafUrl;
use DecodeLabs\Tagged\ContentCollection;
use DecodeLabs\Tagged\Element;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

abstract class Html implements Island
{
    use ActionTrait;

    public function renderIsland(): Element
    {
        return new Element('content-island', $this->render(), [
            'type' => 'html'
        ]);
    }

    /**
     * Handle HTTP request
     */
    public function execute(
        Request $request,
        LeafUrl $url,
        array $parameters
    ): Response {
        return Harvest::html(
            html: (string)ContentCollection::normalize($this->render()),
            headers: [
                'Cache-Control' => 'public, max-age=3600'
            ]
        );
    }
}
