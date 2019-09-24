<?php

namespace InetStudio\PromoPackage\Promo\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract;
use InetStudio\PromoPackage\Promo\Contracts\Services\Front\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  PromoModelContract  $model
     */
    public function __construct(PromoModelContract $model)
    {
        parent::__construct($model);
    }

    /**
     * Получаем объекты по типу.
     *
     * @param  string  $type
     * @param  array  $params
     *
     * @return array
     */
    public function getItemsByType(string $type = '', array $params = []): array
    {
        $items = $this->model->itemsByType($type, $params)->get();

        $data = [];

        $items->each(
            function ($item) use (&$data) {
                foreach ($item->classifiers as $type) {
                    $data[$type->alias][] = $item;
                }
            }
        );

        return $data;
    }
}
