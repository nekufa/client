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

namespace Tarantool\Client\Request;

use Tarantool\Client\IProto;
use Tarantool\Client\RequestTypes;

final class InsertRequest implements Request
{
    private $spaceId;
    private $tuple;

    public function __construct(int $spaceId, array $tuple)
    {
        $this->spaceId = $spaceId;
        $this->tuple = $tuple;
    }

    public function getType() : int
    {
        return RequestTypes::INSERT;
    }

    public function getBody() : array
    {
        return [
            IProto::SPACE_ID => $this->spaceId,
            IProto::TUPLE => $this->tuple,
        ];
    }
}
