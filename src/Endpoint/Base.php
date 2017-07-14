<?php

namespace Microsoft\Luis\Endpoint;

use Microsoft\Luis\Base as LuisBase;

abstract class Base extends LuisBase
{
    protected $apiUri = parent::API_ROOT_URI . 'v2.0/apps/';

    private $conf = [
        'location' => '',
        'appId' => '',
        'endpointKey' => '',
    ];

    public function __construct($conf)
    {
        if (empty($conf) || !isset($conf['endpointKey']) || empty($conf['endpointKey'])) {
            throw new \Exception('need: endpointKey');
        }
        $this->conf = array_merge($this->conf, $conf);
        $this->conf['subscriptionKey'] = $conf['endpointKey'];
        parent::__construct($this->conf);
    }
}
