<?php

namespace App\Bill;

use App\Models\Tariff as TariffModel;
use App\Bill\BillItem;

class Tariff
{
    static $billBindField = 'bl_s1_connection';

    static $localBindField = 'bill_tariff_id';

    static $syncFields = [
        'title' => 'title',
        'price_month' => 'price',
        'bl_s1_connection' => 'bill_tariff_id',
    ];

    protected function getBillFields(): array
    {
        return array_keys(self::$syncFields);
    }

    protected function getLocalFields(): array
    {
        return array_values(self::$syncFields);
    }

    protected function filterByNotNullBillBindField(array $data): array
    {
        return array_filter($data, function($item) {
            return $item->{self::$billBindField};
        });
    }

    protected function filterBySyncFields(array $data): array
    {
        $result = [];
        foreach ($data as $key => $tariff) {
            foreach ($this->getBillFields() as $field) {
                $result[$key][$field] = $tariff[$field];
            }
        }
        return $result;
    }

    public function getLocalTariffs(): array
    {
        return TariffModel::select(array_merge($this->getLocalFields(), ['id']))
            ->whereNotNull(self::$localBindField)
            ->get()
            ->keyBy(self::$localBindField)
            ->toArray();
    }

    protected function prepareSyncFields(array $data): array
    {
        $result = [];
        foreach ($data as $key => $value) {
            $result[] = [
                'field' => $key,
                'value' => $value,
            ];
        }
        return $result;
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
            // $result = [
            //     'bill' => $this->prepareSyncFields($item),
            //     'local' => $this->prepareSyncFields($localTariffs[$item[self::$billBindField]] ?? []),
            // ];
            return $result;
        }, $data);
        return array_values($result);
    }

    public function getData(): array
    {
        $billTariffs = file_get_contents(public_path('/tariffs.json'));
        $billTariffs = json_decode($billTariffs, true);
        $billTariffs = $billTariffs['tarifs'];
        $result = [];
        foreach ($billTariffs as $value) {
            $result[] = new BillItem($value);
        }
        $billTariffs = $this->filterByNotNullBillBindField($result);
        dd($billTariffs);
        $billTariffs = $this->filterBySyncFields($billTariffs);
        $billTariffs = $this->syncWithLocal($billTariffs);
        return $billTariffs;
    }
}
