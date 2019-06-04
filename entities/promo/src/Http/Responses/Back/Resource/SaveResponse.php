<?php

namespace InetStudio\PromoPackage\Promo\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract;
use InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Resource\SaveResponseContract;

/**
 * Class SaveResponse.
 */
class SaveResponse implements SaveResponseContract
{
    /**
     * @var PromoModelContract
     */
    protected $item;

    /**
     * SaveResponse constructor.
     *
     * @param  PromoModelContract  $item
     */
    public function __construct(PromoModelContract $item)
    {
        $this->item = $item;
    }

    /**
     * Возвращаем ответ при сохранении объекта.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        $item = $this->item->fresh();

        return response()->redirectToRoute(
            'back.promo.edit',
            [
                $item['id'],
            ]
        );
    }
}
