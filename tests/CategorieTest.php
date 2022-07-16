<?php

namespace App\Tests;

class CategorieTest extends \ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase
{

    public function testGetCollection(): void
    {
        static::createClient()->request('GET', '/books');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
    }

}