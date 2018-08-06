<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: alihamza
 * Date: 2/8/18
 * Time: 9:45 PM
 */

namespace App\Domain\Entities;


use Dms\Common\Structure\DateTime\Date;
use Dms\Core\Model\Criteria\SpecificationDefinition;
use Dms\Core\Model\ISpecification;
use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\MutableValueObject;

class PublishSettings extends MutableValueObject
{
    const STATUS = 'status';
    const PUBLISH_DATE = 'publishDate';

    /**
     * @var boolean
     */
    public $status;

    /**
     * @var Date|null
     */
    public $publishDate;

    /**
     * PublishSettings constructor.
     *
     * @param bool      $status
     * @param Date|null $publishDate
     */
    public function __construct($status, $publishDate)
    {
        parent::__construct();

        $this->status       = $status;
        $this->publishDate  = $publishDate;
    }


    /**
     * Defines the structure of this class.
     *
     * @param ClassDefinition $class
     * @throws \Dms\Core\Model\Object\InvalidPropertyDefinitionException
     */
    protected function define(ClassDefinition $class)
    {
        $class->property($this->status)->asBool();

        $class->property($this->publishDate)->nullable()->asObject(Date::class);
    }

    /**
     * @return bool
     * @throws \Dms\Core\Exception\TypeMismatchException
     */
    public function isPublished() : bool
    {
        return self::isPublishedSpec()->isSatisfiedBy($this);
    }

    /**
     * @return ISpecification
     */
    public static function isPublishedSpec(): ISpecification
    {
        return self::specification(function (SpecificationDefinition $match) {
            $match
                ->where(self::STATUS, '=', true)
                ->whereAny(function (SpecificationDefinition $match) {
                    $match->where(self::PUBLISH_DATE, '=', null);
                    $match->where(self::PUBLISH_DATE, '<=', Date::fromNative(new \DateTime()));
                });
        });
    }
}