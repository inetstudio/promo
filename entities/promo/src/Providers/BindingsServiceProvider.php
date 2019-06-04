<?php

namespace InetStudio\PromoPackage\Promo\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class BindingsServiceProvider.
 */
class BindingsServiceProvider extends BaseServiceProvider implements DeferrableProvider
{
    /**
     * @var array
     */
    public $bindings = [
        'InetStudio\PromoPackage\Promo\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\PromoPackage\Promo\Events\Back\ModifyItemEvent',
        'InetStudio\PromoPackage\Promo\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\PromoPackage\Promo\Http\Controllers\Back\ResourceController',
        'InetStudio\PromoPackage\Promo\Contracts\Http\Controllers\Back\DataControllerContract' => 'InetStudio\PromoPackage\Promo\Http\Controllers\Back\DataController',
        'InetStudio\PromoPackage\Promo\Contracts\Http\Controllers\Back\UtilityControllerContract' => 'InetStudio\PromoPackage\Promo\Http\Controllers\Back\UtilityController',
        'InetStudio\PromoPackage\Promo\Contracts\Http\Requests\Back\SaveItemRequestContract' => 'InetStudio\PromoPackage\Promo\Http\Requests\Back\SaveItemRequest',
        'InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\PromoPackage\Promo\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Resource\FormResponseContract' => 'InetStudio\PromoPackage\Promo\Http\Responses\Back\Resource\FormResponse',
        'InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\PromoPackage\Promo\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Resource\SaveResponseContract' => 'InetStudio\PromoPackage\Promo\Http\Responses\Back\Resource\SaveResponse',
        'InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract' => 'InetStudio\PromoPackage\Promo\Http\Responses\Back\Utility\SuggestionsResponse',
        'InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract' => 'InetStudio\PromoPackage\Promo\Models\PromoModel',
        'InetStudio\PromoPackage\Promo\Contracts\Services\Back\DataTableServiceContract' => 'InetStudio\PromoPackage\Promo\Services\Back\DataTableService',
        'InetStudio\PromoPackage\Promo\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\PromoPackage\Promo\Services\Back\ItemsService',
        'InetStudio\PromoPackage\Promo\Contracts\Services\Back\UtilityServiceContract' => 'InetStudio\PromoPackage\Promo\Services\Back\UtilityService',
        'InetStudio\PromoPackage\Promo\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\PromoPackage\Promo\Services\Front\ItemsService',
        'InetStudio\PromoPackage\Promo\Contracts\Transformers\Back\Resource\IndexTransformerContract' => 'InetStudio\PromoPackage\Promo\Transformers\Back\Resource\IndexTransformer',
        'InetStudio\PromoPackage\Promo\Contracts\Transformers\Back\Utility\SuggestionTransformerContract' => 'InetStudio\PromoPackage\Promo\Transformers\Back\Utility\SuggestionTransformer',
    ];

    /**
     * Получить сервисы от провайдера.
     *
     * @return array
     */
    public function provides()
    {
        return array_keys($this->bindings);
    }
}
