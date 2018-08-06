<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: alihamza
 * Date: 26/7/18
 * Time: 3:08 PM
 */

namespace App\Domain\Entities;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class JsSnippetPosition extends Enum
{
    const AFTER_OPENING_HEAD = 'AFTER_OPENING_HEAD';

    const BEFORE_CLOSING_HEAD = 'BEFORE_CLOSING_HEAD';

    const AFTER_OPENING_BODY = 'AFTER_OPENING_BODY';

    const BEFORE_CLOSING_BODY = 'BEFORE_CLOSING_BODY';

    /**
     * Defines the type of the options contained within the enum.
     *
     * @param PropertyTypeDefiner $values
     *
     * @return void
     */
    protected function defineEnumValues(PropertyTypeDefiner $values)
    {
        $values->asString();
    }
}