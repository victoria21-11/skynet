<?php

namespace App\Traits;

use Spatie\MediaLibrary\Models\Media;

trait MediaTrait
{
    public function syncMedia(array $collections) {
        foreach ($collections as $collection) {
            foreach (request()->input($collection . '.added', []) as $value) {
                $this->addMedia(storage_path('app/' . $value))->toMediaCollection($collection);
            }
            foreach (request()->input($collection . '.removed', []) as $value) {
                Media::findOrFail($value)->delete();
            }
        }
    }

    public function prepareMedia(array $collections)
    {
        $result = [];
        foreach ($collections as $collection) {
            $result[$collection] = $this->getMedia($collection)
                ->map(function ($item) {
                    $item->full_url = $item->getFullUrl();
                    return $item;
                });
        }
        return $result;
    }
}
