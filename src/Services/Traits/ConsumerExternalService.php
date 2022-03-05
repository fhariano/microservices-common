<?php

namespace Fhariano\MicroservicesCommon\Services\Traits;

use Illuminate\Support\Facades\Http;

trait ConsumerExternalService
{
    public function headers(array $headers = [])
    {
        array_push($headers, [
            'Accept' => 'application/json',
            'Authorization' => $this->token,
        ]);

        return Http::withHeaders($headers);
    }

    public function request(
        string $method,
        string $endPoint,
        array $formParams = [],
        array $headers = []
    ) {
        return $this->headers($headers)
            ->$method($this->url . $endPoint, $formParams);
    }
}
