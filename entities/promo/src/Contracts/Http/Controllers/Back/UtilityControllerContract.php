<?php

namespace InetStudio\PromoPackage\Promo\Contracts\Http\Controllers\Back;

use Illuminate\Http\Request;
use InetStudio\PromoPackage\Promo\Contracts\Services\Back\UtilityServiceContract;
use InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract;

/**
 * Interface UtilityControllerContract.
 */
interface UtilityControllerContract
{
    /**
     * Возвращаем объекты для поля.
     *
     * @param  UtilityServiceContract  $utilityService
     * @param  Request  $request
     *
     * @return SuggestionsResponseContract
     */
    public function getSuggestions(UtilityServiceContract $utilityService, Request $request): SuggestionsResponseContract;
}
