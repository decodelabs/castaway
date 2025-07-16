<?php

/**
 * @package Castaway
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Castaway;

use DecodeLabs\Castaway;
use DecodeLabs\Veneer;

class Context
{
}

// Register the Veneer facade
Veneer\Manager::getGlobalManager()->register(
    Context::class,
    Castaway::class
);
