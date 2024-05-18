<?php

declare(strict_types=1);

namespace month3\hw12\service;

use Predis\Client;

class RedisService
{
    const KEY = 'data';
    const KEY_PARAMS = 'params';
    const PARAMS_COUNT = 1;

    private Client $redis;

    public function __construct()
    {
        $this->redis = new Client([
            'host' => getenv('REDIS_HOST'),
            'port' => getenv('REDIS_PORT'),
        ]);
    }

    public function setData(array $data): bool
    {
        $existingData = json_decode($this->redis->get(self::KEY) ?? '', true) ?? [];
        if (!$this->checkIsOriginal($existingData, $data)) {
            return false;
        }
        $existingData[] = $data;
        $this->redis->set(self::KEY, json_encode($existingData));

        return true;
    }

    public function getData(): ?array
    {
        return json_decode($this->redis->get(self::KEY), true);
    }

    public function showData(array $paramArray): array
    {
        $redisData = $this->getData();

        $result = [];
        foreach ($redisData as $data) {
            $check = false;
            foreach ($data[self::KEY_PARAMS] as $redisKey => $redisParamValue) {
                foreach ($paramArray[self::KEY_PARAMS] as $paramKey => $paramValue) {
                    if (
                        $redisKey === $paramKey
                        && $redisParamValue === $paramValue
                    ) {
                        if (count($data[self::KEY_PARAMS]) === self::PARAMS_COUNT) {
                            $result[] = $data;
                        }
                        $check = true;
                    }
                }
                if (!$check) {
                    break;
                }
            }
            if ($check) {
                $result[] = $data;
            }
        }

        return $result;
    }

    private function checkIsOriginal(array $existingData, array $data): bool
    {
        foreach ($existingData as $redisData) {
            if ($redisData['priority'] === $data['priority']) {
                return false;
            }
        }

        return true;
    }
}
