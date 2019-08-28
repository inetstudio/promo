<?php

namespace InetStudio\PromoPackage\Promo\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract;
use InetStudio\PromoPackage\Promo\Contracts\Services\Front\FeedsServiceContract;

/**
 * Class FeedsService.
 */
class FeedsService extends BaseService implements FeedsServiceContract
{
    /**
     * FeedsService constructor.
     *
     * @param  PromoModelContract  $model
     */
    public function __construct(PromoModelContract $model)
    {
        parent::__construct($model);
    }
}
