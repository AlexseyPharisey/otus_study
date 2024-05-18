<?php

declare(strict_types=1);

namespace month3\hw12\controller;

use month3\hw12\service\RedisService;

class AppController
{
    const FIRST_KEY_VALUE = 1;
    const EVENT_KEY_VALUE = '::event::';
    private RedisService $redisService;

    public function __construct()
    {
        $this->redisService = new RedisService();
    }

    public function store()
    {
        $priority = filter_input(INPUT_POST, 'priority', FILTER_SANITIZE_NUMBER_INT);
        $params = filter_input(INPUT_POST, 'params', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $data = $this->prepareDataForRedis((int)$priority, $params);

        if ($this->redisService->setData($data)) {
            echo 'success';
        } else {
            echo 'Данные уже существуют';
        }

        echo '<button onclick="history.back();">Go Back</button>';
    }

    public function index()
    {
        $data = $this->redisService->getData();

        echo '<pre>';
        print_r ($data);
        echo '</pre>';

        echo '<button onclick="history.back();">Go Back</button>';
    }

    public function show()
    {
        $params = filter_input(INPUT_POST, 'params', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $dataArray = $this->prepareDataForRedis(self::FIRST_KEY_VALUE, $params);

        if ($data = $this->redisService->showData($dataArray)) {
            echo '<pre>';
            print_r ($this->getDataWithMaxPriority($this->clearData($data)));
            echo '</pre>';
        } else {
            echo 'Данные нет';
        }

        echo '<button onclick="history.back();">Go Back</button>';
    }

    private function prepareDataForRedis(int $priority, array $params): array
    {
        $paramArray = [];
        $counter = self::FIRST_KEY_VALUE;
        foreach ($params as $param) {
            $paramArray['param' . $counter] = $param;
            $counter++;
        }

        return [
            'priority' => $priority ?? null,
            'params' => $paramArray,
            'events' => self::EVENT_KEY_VALUE
        ];
    }

    private function clearData(array $data): array
    {
        $uniqueData = [];
        $seenPriorities = [];

        foreach ($data as $field) {
            if (!in_array($field['priority'], $seenPriorities)) {
                $uniqueData[] = $field;
                $seenPriorities[] = $field['priority'];
            }
        }

        return $uniqueData;
    }

    private function getDataWithMaxPriority(array $data): array
    {
        $maxValue = 0;
        $result = [];
        foreach ($data as $field) {
            if ($field['priority'] > $maxValue) {
                $result = $field;
                $maxValue = $field['priority'];
            }
        }

        return $result;
    }
}