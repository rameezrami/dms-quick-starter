<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: alihamza
 * Date: 2/8/18
 * Time: 9:56 PM
 */

namespace App\Infrastructure\Persistence;


use App\Domain\Entities\PublishSettings;
use Dms\Common\Structure\DateTime\Persistence\DateMapper;
use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\IndependentValueObjectMapper;

class PublishSettingsMapper extends IndependentValueObjectMapper
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
        $map->type(PublishSettings::class);

        $map->property(PublishSettings::STATUS)->to('status')->asBool();

        $map->embedded(PublishSettings::PUBLISH_DATE)
            ->withIssetColumn('publish_date')
            ->using(new DateMapper('publish_date'));
    }
}