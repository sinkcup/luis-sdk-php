<?php

namespace Microsoft\Luis\Tests\Endpoint;

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Microsoft\Luis\Endpoint\Prediction;

class PredictionTest extends TestCase
{
    private $prediction;

    protected function setUp()
    {
        $this->prediction = new Prediction([
            'location' => getenv('LUIS_LOCATION'),
            'appId' => getenv('LUIS_APP_ID'),
            'versionId' => getenv('LUIS_APP_VERSION_ID'),
            'endpointKey' => getenv('LUIS_ENDPOINT_KEY'),
            'timeout' => 10,
        ]);
    }

    public function testSearch()
    {
        $query = [
            'q' => 'hello',
        ];
        $r = $this->prediction->search($query);
        var_dump($r);
        $this->assertNotEmpty($r);
        $this->assertArrayHasKey('query', $r);
        $this->assertArrayHasKey('intent', $r['topScoringIntent']);
        $this->assertArrayHasKey('score', $r['topScoringIntent']);
        $this->assertArrayHasKey('entities', $r);
    }
}
