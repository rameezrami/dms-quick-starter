<?php declare(strict_types = 1);

namespace App;

use App\Domain\Entities\JsSnippetCode;
use App\Infrastructure\Persistence\JsSnippetCodeMapper;
use Dms\Core\Persistence\Db\Mapping\Definition\Orm\OrmDefinition;
use Dms\Core\Persistence\Db\Mapping\Orm;
use Dms\Package\Content\Persistence\ContentOrm;
use Dms\Web\Laravel\Persistence\Db\DmsOrm;

/**
 * The application's orm.
 */
class AppOrm extends Orm
{
    /**
     * Defines the object mappers registered in the orm.
     *
     * @param OrmDefinition $orm
     *
     * @return void
     */
    protected function define(OrmDefinition $orm)
    {
        $orm->enableLazyLoading();

        $orm->encompass(DmsOrm::inDefaultNamespace());

        $orm->encompass(new ContentOrm($this->iocContainer));

        // TODO: Register your mappers...

        $orm->entities([
            JsSnippetCode::class    => JsSnippetCodeMapper::class,
        ]);
    }
}