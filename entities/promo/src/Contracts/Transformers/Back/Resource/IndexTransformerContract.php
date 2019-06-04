<?php

namespace InetStudio\PromoPackage\Promo\Contracts\Transformers\Back\Resource;

use InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract;

/**
 * Interface IndexTransformerContract.
 */
interface IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  PromoModelContract  $item
     *
     * @return array
     */
    public function transform(PromoModelContract $item): array;
}
