<?php

namespace InetStudio\PromoPackage\Promo\Contracts\Services\Back;

use InetStudio\AdminPanel\Base\Contracts\Services\BaseServiceContract;
use InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract;

/**
 * Interface ItemsServiceContract.
 */
interface ItemsServiceContract extends BaseServiceContract
{
    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return PromoModelContract
     */
    public function save(array $data, int $id): PromoModelContract;
}
