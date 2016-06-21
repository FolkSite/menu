<?php

namespace Spatie\Menu\Helpers;

use ReflectionFunction;
use ReflectionParameter;
use Spatie\Menu\Item;

class Reflection
{
    public static function firstParameterType(callable $callable): string
    {
        $reflection = new ReflectionFunction($callable);

        $parameterTypes = array_map(function (ReflectionParameter $parameter) {
            return $parameter->getClass() ? $parameter->getClass()->name : null;
        }, $reflection->getParameters());

        return $parameterTypes[0] ?? '';
    }

    public static function itemMatchesType(Item $item, string $type): bool
    {
        if ($type === '') {
            return true;
        }

        return $item instanceof $type;
    }
}
