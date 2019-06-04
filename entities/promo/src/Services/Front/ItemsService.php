<?php

namespace InetStudio\PromoPackage\Promo\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\AdminPanel\Base\Services\Traits\SlugsServiceTrait;
use InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract;
use InetStudio\PromoPackage\Promo\Contracts\Services\Front\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    use SlugsServiceTrait;

    /**
     * ItemsService constructor.
     *
     * @param  PromoModelContract  $model
     */
    public function __construct(PromoModelContract $model)
    {
        parent::__construct($model);
    }
}
