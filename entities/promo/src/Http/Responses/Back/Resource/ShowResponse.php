<?php

namespace InetStudio\PromoPackage\Promo\Http\Responses\Back\Resource;

use InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Resource\ShowResponseContract;

class ShowResponse implements ShowResponseContract
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function toResponse($request)
    {
        return response()->json($this->data['item']);
    }
}
