<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\JsSnippetCode;

/**
 * The repository for the App\Domain\Entities\JsSnippetCode entity.
 */
interface IJsSnippetCodeRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return JsSnippetCode[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return JsSnippetCode
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return JsSnippetCode[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return JsSnippetCode|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return JsSnippetCode[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return JsSnippetCode[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return JsSnippetCode[]
     */
    public function satisfying(ISpecification $specification) : array;
}
