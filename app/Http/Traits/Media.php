<?php

namespace App\Http\Traits;

use Spatie\MediaLibrary\Models\Media as MediaModel;

trait Media
{
    protected function syncMedia(object $model, array $collections)
    {
        foreach ($collections as $collection) {
            foreach (request()->input($collection . '.added', []) as $value) {
                $model->addMedia(storage_path('app/' . $value))->toMediaCollection('preview');
            }
            foreach (request()->input($collection . '.removed', []) as $value) {
                MediaModel::findOrFail($value)->delete();
            }
        }
    }

    protected function getMedia(object $model, array $collections)
    {
        $result = [];
        foreach ($collections as $collection) {
            $result[$collection] = $model->getMedia($collection)
                ->map(function ($item) {
                    $item->full_url = $item->getFullUrl();
                    return $item;
                });
        }
        return $result;
    }
}
