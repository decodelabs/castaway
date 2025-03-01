<?php
/**
 * This is a stub file for IDE compatibility only.
 * It should not be included in your projects.
 */
namespace DecodeLabs;

use DecodeLabs\Veneer\Proxy as Proxy;
use DecodeLabs\Veneer\ProxyTrait as ProxyTrait;
use DecodeLabs\Castaway\Context as Inst;

class Castaway implements Proxy
{
    use ProxyTrait;

    public const Veneer = 'DecodeLabs\\Castaway';
    public const VeneerTarget = Inst::class;

    protected static Inst $_veneerInstance;

};
