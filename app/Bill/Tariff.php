<?php

namespace App\Bill;

use App\Models\Tariff as TariffModel;

class Tariff
{
    static $billBindField = 'id';

    static $localBindField = 'bill_tariff_id';

    static $syncFields = [
        'title' => 'title',
        'price_month' => 'price',
        'id' => 'bill_tariff_id',
        'bl_s1_connection' => 'bill_tariff_group_id',
    ];

    private $state = [];

    protected function getLocalFields(): array
    {
        return array_values(self::$syncFields);
    }

    protected function onlyWithConnection(): self
    {
        $this->state = array_filter($this->state, function($item) {
            return $item['bl_s1_connection'];
        });
        return $this;
    }

    protected function filterBySyncFields(): self
    {
        $this->state = array_map(function($item) {
            return array_intersect_key($item, self::$syncFields);
        }, $this->state);

        return $this;
    }

    public function getLocalTariffs(): array
    {
        return TariffModel::select(array_merge($this->getLocalFields(), ['id']))
            ->whereNotNull(self::$localBindField)
            ->get()
            ->keyBy(self::$localBindField)
            ->toArray();
    }

    protected function syncWithLocal(array $data): array
    {
        $localTariffs = $this->getLocalTariffs();
        $result = array_map(function($item) use($localTariffs) {
            foreach (self::$syncFields as $billField => $localField) {
                $result[] = [
                    'id' => $localTariffs[$item[self::$billBindField]]['id'] ?? null,
                    'billField' => $billField,
                    'localField' => $localField,
                    'billValue' => $item[$billField],
                    'localValue' => $localTariffs[$item[self::$billBindField]][$localField] ?? null,
                ];
            }
            return $result;
        }, $data);
        return array_values($result);
    }

    public function requestData(): self
    {
        $this->state = json_decode(file_get_contents(public_path('/tariffs.json')), true)['tarifs'] ?? [];
        foreach ($this->state as $key => $value) {
            $this->state[$key]['id'] = $key;
        }
        $this->state = array_values($this->state);
        return $this;
    }

    public function get(): array
    {
        return $this->state;
    }

    public function getData(): array
    {
        $result = $this->requestData()
            ->onlyWithConnection()
            ->filterBySyncFields()
            ->get();
        dd($result);

        $billTariffs = $this->syncWithLocal($billTariffs);
        return $billTariffs;
    }
}
