<?php

namespace InetStudio\PromoPackage\Promo\Contracts\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use InetStudio\AdminPanel\Base\Contracts\Models\BaseModelContract;

/**
 * Interface PromoModelContract.
 */
interface PromoModelContract extends BaseModelContract, Auditable, HasMedia
{
}
