<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: alihamza
 * Date: 26/7/18
 * Time: 3:04 PM
 */

namespace App\Domain\Entities;

use Dms\Core\Model\Object\Entity;

class JsSnippetCode extends Entity
{
    CONST NAME = 'name';

    CONST JS_CODE = 'jsCode';

    const POSITION = "position";


    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $jsCode;

    /**
     * @var JsSnippetPosition
     */
    public $position;

    /**
     * Defines the structure of this entity.
     *
     * @param \Dms\Core\Model\Object\ClassDefinition $class
     * @throws \Dms\Core\Model\Object\InvalidPropertyDefinitionException
     */
    protected function defineEntity(\Dms\Core\Model\Object\ClassDefinition $class)
    {
        $class->property($this->name)->asString();

        $class->property($this->jsCode)->asString();

        $class->property($this->position)->asObject(JsSnippetPosition::class);
    }
}