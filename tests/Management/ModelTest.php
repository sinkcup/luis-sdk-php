<?php

namespace Microsoft\Luis\Tests\Management;

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Microsoft\Luis\Management\Model;

class ModelTest extends TestCase
{
    private $model;

    protected function setUp()
    {
        $this->model = new Model([
            'appId' => getenv('LUIS_APP_ID'),
            'versionId' => getenv('LUIS_APP_VERSION_ID'),
            'programmaticApiKey' => getenv('LUIS_PROGRAMMATIC_API_KEY'),
            'timeout' => 10,
        ]);
    }

    public function testGetIntents()
    {
        $r = $this->model->getIntents();
        var_dump($r);
        $this->assertNotEmpty($r);
        $this->assertArrayHasKey('id', $r[0]);
        $this->assertArrayHasKey('name', $r[0]);
        $this->assertArrayHasKey('typeId', $r[0]);
        $this->assertArrayHasKey('readableType', $r[0]);
    }
}
