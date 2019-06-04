<?php

namespace InetStudio\PromoPackage\Promo\Transformers\Back\Resource;

use Throwable;
use League\Fractal\TransformerAbstract;
use InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract;
use InetStudio\PromoPackage\Promo\Contracts\Transformers\Back\Resource\IndexTransformerContract;

/**
 * Class IndexTransformer.
 */
class IndexTransformer extends TransformerAbstract implements IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  PromoModelContract  $item
     *
     * @return array
     *
     * @throws Throwable
     */
    public function transform(PromoModelContract $item): array
    {
        return [
            'id' => (int) $item['id'],
            'type' => view(
                    'admin.module.promo::back.partials.datatables.classifiers',
                    [
                        'classifiers' => $item['classifiers'],
                    ]
                )->render(),
            'is_main' => view(
                    'admin.module.promo::back.partials.datatables.main',
                    [
                        'main' => $item['is_main'],
                    ]
                )->render(),
            'title' => $item['title'],
            'date_start' => (string) $item['date_start'],
            'date_end' => (string) $item['date_end'],
            'created_at' => (string) $item['created_at'],
            'updated_at' => (string) $item['updated_at'],
            'actions' => view(
                    'admin.module.promo::back.partials.datatables.actions',
                    [
                        'id' => $item['id'],
                    ]
                )->render(),
        ];
    }
}
