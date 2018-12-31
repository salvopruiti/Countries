<?php
/**
 * Created by PhpStorm.
 * User: Salvatore Pruiti
 * Date: 31/12/2018
 * Time: 10:42
 */

class ClientTest extends \PHPUnit\Framework\TestCase
{
    /** @var \SalvatorePruiti\Countries */
    private $client;

    private function createClient() {
        $this->client = new \SalvatorePruiti\Countries();
    }

    public function testSearchByCode()
    {
        $this->createClient();
        $data = $this->client->code("IT");
        $this->assertIsArray($data);
    }

    public function testSearchByCurrencyCode()
    {
        $this->createClient();
        $data = $this->client->currency("EUR");
        $this->assertIsArray($data);
    }

    public function testSearchByLanguageCode()
    {
        $this->createClient();
        $data = $this->client->language("it");
        $this->assertIsArray($data);
    }
}
