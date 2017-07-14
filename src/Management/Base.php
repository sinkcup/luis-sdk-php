<?php

namespace Microsoft\Luis\Management;

use Microsoft\Luis\Base as LuisBase;

abstract class Base extends LuisBase
{
    protected $apiUri = parent::API_ROOT_URI . 'api/v2.0/apps/';

    private $conf = [
        'location' => 'westus',
        'appId' => '',
        'versionId' => '',
        'programmaticApiKey' => '',
    ];

    public function __construct($conf)
    {
        if (empty($conf) || !isset($conf['programmaticApiKey']) || empty($conf['programmaticApiKey'])) {
            throw new \Exception('need: programmaticApiKey');
        }
        $this->conf = array_merge($this->conf, $conf);
        $this->conf['subscriptionKey'] = $conf['programmaticApiKey'];
        parent::__construct($this->conf);
    }
}
