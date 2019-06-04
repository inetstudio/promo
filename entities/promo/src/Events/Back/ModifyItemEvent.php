<?php

namespace InetStudio\PromoPackage\Promo\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract;
use InetStudio\PromoPackage\Promo\Contracts\Events\Back\ModifyItemEventContract;

/**
 * Class ModifyItemEvent.
 */
class ModifyItemEvent implements ModifyItemEventContract
{
    use SerializesModels;

    /**
     * @var PromoModelContract
     */
    public $item;

    /**
     * ModifyItemEvent constructor.
     *
     * @param  PromoModelContract  $item
     */
    public function __construct(PromoModelContract $item)
    {
        $this->item = $item;
    }
}
