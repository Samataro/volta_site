<?php

namespace App\Activity\Repository;

use Datto\JsonRpc\Responses\ErrorResponse;
use Datto\JsonRpc\Responses\ResultResponse;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class ActivityRepositoryJsonRPC implements ActivityRepositoryContract
{
    private Client $httpClient;
    private \Datto\JsonRpc\Client $rpcClient;

    public function __construct(string $base_uri)
    {
        $this->httpClient = new Client([
            'base_uri' => $base_uri,
            'headers' => ['Content-Type' => 'application/json'],
        ]);
        $this->rpcClient = new \Datto\JsonRpc\Client();
    }

    public function touch(string $url): void
    {
        $body = $this->rpcClient
            ->query(
                time(),
                'counter@touch',
                [
                    'url' => $url,
                    'date' => now()->toDateString()
                ]
            )
            ->encode();

        $this->httpClient->post('/v1/endpoint', ['body' => $body]);
    }

    public function get(?int $page, ?int $perpage): array
    {
        $body = $this->rpcClient
            ->query(
                time(),
                'counter@get',
                [
                    "page" => (string) ($page ?? 1),
                    "perpage" => (string) ($perpage ?? 20)
                ]
            )
            ->encode();

        $response = $this->httpClient->post("/v1/endpoint", ["body" => $body]);
        $decoded = Arr::first($this->rpcClient->decode((string) $response->getBody()));

        if ($decoded instanceof ErrorResponse) {
            throw new \Exception("External service error: " .$decoded->getMessage());
        }

        if ($decoded instanceof ResultResponse) {
            return $decoded->getValue();
        }

        throw new \Exception("Unexpected result");
    }
}