<?php

namespace InetStudio\PromoPackage\Promo\Models;

use Illuminate\Support\Carbon;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use InetStudio\Uploads\Models\Traits\HasImages;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use InetStudio\Classifiers\Models\Traits\HasClassifiers;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;

/**
 * Class PromoModel.
 */
class PromoModel extends Model implements PromoModelContract
{
    use Auditable;
    use HasImages;
    use SoftDeletes;
    use HasClassifiers;
    use BuildQueryScopeTrait;

    /**
     * Тип сущности.
     */
    const ENTITY_TYPE = 'promo';

    /**
     * Базовый тип промо.
     */
    const BASE_PROMO_TYPE = 'promoaction';

    /**
     * Should the timestamps be audited?
     *
     * @var bool
     */
    protected $auditTimestamps = true;

    /**
     * Настройки для генерации изображений.
     *
     * @var array
     */
    protected $images = [
        'config' => 'promo',
        'model' => 'promo',
    ];

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'promo';

    /**
     * Атрибуты, для которых разрешено массовое назначение.
     *
     * @var array
     */
    protected $fillable = [
        'is_main',
        'title',
        'description',
        'href',
        'promocode',
        'date_start',
        'date_end',
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
        'date_start',
        'date_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Загрузка модели.
     */
    protected static function boot()
    {
        parent::boot();

        self::$buildQueryScopeDefaults['columns'] = [
            'id',
            'is_main',
            'title',
            'description',
            'href',
            'promocode',
            'date_start',
            'date_end',
        ];

        self::$buildQueryScopeDefaults['relations'] = [
            'classifiers' => function (MorphToMany $classifiersQuery) {
                $classifiersQuery->select(
                    [
                        'classifiers_entries.id',
                        'classifiers_entries.value',
                        'classifiers_entries.alias'
                    ]
                );
            },

            'media' => function (MorphMany $mediaQuery) {
                $mediaQuery->select(
                    [
                        'id',
                        'model_id',
                        'model_type',
                        'collection_name',
                        'file_name',
                        'disk',
                        'mime_type',
                        'custom_properties',
                        'responsive_images',
                    ]
                );
            },
        ];
    }

    /**
     * Сеттер атрибута is_main.
     *
     * @param $value
     */
    public function setIsMainAttribute($value): void
    {
        $this->attributes['is_main'] = (bool) trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута title.
     *
     * @param $value
     */
    public function setTitleAttribute($value): void
    {
        $this->attributes['title'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута description.
     *
     * @param $value
     */
    public function setDescriptionAttribute($value): void
    {
        $value = (isset($value['text'])) ? $value['text'] : (! is_array($value) ? $value : '');

        $this->attributes['description'] = trim(str_replace('&nbsp;', ' ', strip_tags($value)));
    }

    /**
     * Сеттер атрибута href.
     *
     * @param $value
     */
    public function setHrefAttribute($value): void
    {
        $this->attributes['href'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута promocode.
     *
     * @param $value
     */
    public function setPromocodeAttribute($value): void
    {
        $this->attributes['promocode'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута date_start.
     *
     * @param $value
     */
    public function setDateStartAttribute($value): void
    {
        $this->attributes['date_start'] = ($value) ? Carbon::createFromFormat('d.m.Y H:i', $value) : null;
    }

    /**
     * Сеттер атрибута date_end.
     *
     * @param $value
     */
    public function setDateEndAttribute($value): void
    {
        $this->attributes['date_end'] = ($value) ? Carbon::createFromFormat('d.m.Y H:i', $value) : null;
    }

    /**
     * Геттер атрибута type.
     *
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return self::ENTITY_TYPE;
    }

    /**
     * Геттер атрибута promo_type.
     *
     * @return string
     *
     * @throws BindingResolutionException
     */
    public function getPromoTypeAttribute(): string
    {
        $promoType = $this->classifiers()->whereHas(
            'groups',
            function ($query) {
                $query->where('alias', '=', 'promo_types');
            }
        )->pluck('alias')->toArray();

        $promoType = (empty($promoType))
            ? ($this->attributes['promo_type'] ?: self::BASE_PROMO_TYPE)
            : str_replace('promo_type_', '', $promoType[0]);

        return $promoType;
    }
}
