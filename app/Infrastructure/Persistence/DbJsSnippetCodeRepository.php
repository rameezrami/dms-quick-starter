<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\IJsSnippetCodeRepository;
use App\Domain\Entities\JsSnippetCode;

/**
 * The database repository implementation for the App\Domain\Entities\JsSnippetCode entity.
 */
class DbJsSnippetCodeRepository extends DbRepository implements IJsSnippetCodeRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(JsSnippetCode::class));
    }
}