<?php

/**
 * This file is part of the Tarantool Client package.
 *
 * (c) Eugene Leonovich <gen.work@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tarantool\Client;

final class SqlUpdateResult implements \Countable
{
    private $info;

    public function __construct(array $info)
    {
        $this->info = $info;
    }

    public function count() : int
    {
        return $this->info[0];
    }

    public function getAutoincrementIds() : ?array
    {
        return $this->info[1] ?? null;
    }
}
