<?php

/**
 * @package Castaway
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Castaway\Island;

use DecodeLabs\Castaway\Island;
use DecodeLabs\Greenleaf;
use DecodeLabs\Greenleaf\ActionTrait;
use DecodeLabs\Harvest;
use DecodeLabs\Singularity\Url\Leaf as LeafUrl;
use DecodeLabs\Tagged\ContentCollection;
use DecodeLabs\Tagged\Element;
use Generator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Stringable;


abstract class LazyHtml implements Island
{
    use ActionTrait;

    /**
     * @return string|Stringable|Generator<string|Stringable>
     */
    abstract public function renderPlaceholder(): string|Stringable|Generator;

    public function renderIsland(): Element
    {
        return new Element('content-island', $this->renderPlaceholder(), [
            'type' => 'html',
            'src' => Greenleaf::createUrl('island-child')
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
        if ($request->hasHeader('X-Island')) {
            $html = $this->render();
        } else {
            $html = $this->renderPlaceholder();
        }

        return Harvest::html(
            html: (string)ContentCollection::normalize($html),
            headers: [
                'Cache-Control' => 'no-cache no-store must-revalidate'
            ]
        );
    }
}
