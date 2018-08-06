<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\IndependentValueObjectMapper;
use App\Domain\Entities\SeoSettings;


/**
 * The App\Domain\Entities\SeoSettings value object mapper.
 */
class SeoSettingsMapper extends IndependentValueObjectMapper
{
    /**
     * Defines the entity mapper
     *
     * @param MapperDefinition $map
     *
     * @return void
     * @throws \Dms\Core\Exception\InvalidArgumentException
     */
    protected function define(MapperDefinition $map)
    {
        $map->type(SeoSettings::class);

        $map->property(SeoSettings::SEO_TITLE)->to('seo_title')->nullable()->asVarchar(255);

        $map->property(SeoSettings::SEO_DESCRIPTION)->to('seo_description')->nullable()->asVarchar(255);

        $map->property(SeoSettings::SEO_KEYWORDS)->to('seo_keywords')->nullable()->asVarchar(255);


    }
}