<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\JsSnippetCode;


/**
 * The App\Domain\Entities\JsSnippetCode entity mapper.
 */
class JsSnippetCodeMapper extends EntityMapper
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
        $map->type(JsSnippetCode::class);
        $map->toTable('js_snippet_codes');

        $map->idToPrimaryKey('id');

        $map->property(JsSnippetCode::NAME)->to('name')->asVarchar(255);

        $map->property(JsSnippetCode::JS_CODE)->to('js_code')->asText();

        $map->enum(JsSnippetCode::POSITION)->to('position')->asVarchar(255);


    }
}