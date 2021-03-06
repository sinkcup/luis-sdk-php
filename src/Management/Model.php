<?php

namespace Microsoft\Luis\Management;

class Model extends Base
{
    protected $basePath = '{appId}/versions/{versionId}/';

    /**
     * models - Get application version intent infos
     *
     * @example shell curl -v -X GET "https://westus.api.cognitive.microsoft.com/luis/api/v2.0/apps/{appId}/versions/{versionId}/intents?skip=0&take=100" -H "Ocp-Apim-Subscription-Key: {subscription key}"
     * @link https://westus.dev.cognitive.microsoft.com/docs/services/5890b47c39e2bb17b84a55ff/operations/5890b47c39e2bb052c5b9c0d
     * @return array
     */
    public function getIntents($skip = null, $take = null)
    {
        $data = [
            'skip' => $skip,
            'take' => $take,
        ];
        try {
            $response = $this->client->request('GET', 'intents', ['query' => $data]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return json_decode($response->getBody(), true);
    }
}
