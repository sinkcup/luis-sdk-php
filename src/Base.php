<?php

namespace Microsoft\Luis;

use GuzzleHttp\Client;

abstract class Base
{
    const API_ROOT_URI = 'https://{location}.api.cognitive.microsoft.com/luis/';
    protected $apiUri;
    protected $basePath;
    protected $client;

    private $conf = [
        'location' => '',
        'subscriptionKey' => '',
        'timeout'  => 3,
    ];

    public function __construct($conf)
    {
        if (empty($conf) || !isset($conf['subscriptionKey']) || empty($conf['subscriptionKey'])) {
            throw new \Exception('need: subscriptionKey');
        }
        $this->conf = array_merge($this->conf, $conf);
        $baseUri = $this->apiUri . $this->basePath;
        foreach ($this->conf as $k => $v) {
            $baseUri = str_replace('{' . $k . '}', $v, $baseUri);
        }
        $this->client = new Client([
            'base_uri' => $baseUri,
            'timeout' => $this->conf['timeout'],
            'headers' => [
                'Ocp-Apim-Subscription-Key' => $this->conf['subscriptionKey'],
            ],
        ]);
    }
}
