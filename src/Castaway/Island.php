<?php

/**
 * @package Castaway
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Castaway;

use DecodeLabs\Greenleaf\Action;
use Generator;
use Psr\Http\Message\ResponseInterface as Response;
use Stringable;

interface Island extends Action
{
    /**
     * @return string|Stringable|Generator<string|Stringable>
     */
    public function render(): string|Stringable|Generator;
}
