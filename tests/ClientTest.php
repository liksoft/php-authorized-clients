<?php

declare(strict_types=1);

/*
 * This file is part of the Drewlabs package.
 *
 * (c) Sidoine Azandrew <azandrewdevelopper@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Drewlabs\AuthorizedClients\Client;
use Drewlabs\AuthorizedClients\Tests\ClientsStub;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function test_client_constructor()
    {
        $attributes = array_values(array_filter(ClientsStub::getClients(), static function ($current) {
            return 'bdcf5a49-341e-4688-8bba-755237ecfaa1' === $current['id'];
        }))[0];
        $client = new Client($attributes);
        $this->assertTrue($client->firstParty());
        $this->assertFalse($client->isRevoked());
    }
}
