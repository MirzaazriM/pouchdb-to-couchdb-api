<?php


namespace App\Http;


trait DbConnection
{

    private $client;
    private $dbUrl;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client(['headers' => ['Content-Type' => 'application/json']]);
        $this->dbUrl = $this->getDatabaseLink();
    }

    private function getDatabaseLink() {

        $schema = config('app.url_schema') . '://';
        $authentication = config('app.couchdb-auth');
        $dbIpAddress = '@' . config('database.connections.couchdb.host');
        $dbPort = ':' . config('database.connections.couchdb.port');

        return $schema . $authentication . $dbIpAddress . $dbPort;
    }
}