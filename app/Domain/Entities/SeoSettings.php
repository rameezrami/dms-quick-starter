<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: alihamza
 * Date: 1/8/18
 * Time: 5:59 PM
 */

namespace App\Domain\Entities;


use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\ValueObject;

class SeoSettings extends ValueObject
{
    const SEO_TITLE = 'seoTitle';
    const SEO_DESCRIPTION = 'seoDescription';
    const SEO_KEYWORDS = 'seoKeywords';

    /**
     * @var string|null
     */
    public $seoTitle;

    /**
     * @var string|null
     */
    public $seoDescription;

    /**
     * @var string|null
     */
    public $seoKeywords;

    /**
     * SeoSettings constructor.
     * @param null|string $seoTitle
     * @param null|string $seoDescription
     * @param null|string $seoKeywords
     */
    public function __construct(?string $seoTitle, ?string $seoDescription, ?string $seoKeywords)
    {
        parent::__construct();

        $this->seoTitle = $seoTitle;
        $this->seoDescription = $seoDescription;
        $this->seoKeywords = $seoKeywords;
    }


    /**
     * Defines the structure of this class.
     *
     * @param ClassDefinition $class
     * @throws \Dms\Core\Model\Object\InvalidPropertyDefinitionException
     */
    protected function define(ClassDefinition $class)
    {
        $class->property($this->seoTitle)->nullable()->asString();

        $class->property($this->seoDescription)->nullable()->asString();

        $class->property($this->seoKeywords)->nullable()->asString();
    }
}