<?php declare(strict_types = 1);

namespace App\Cms\Modules\Fields;

use Dms\Core\Common\Crud\Definition\Form\ValueObjectFieldDefinition;
use Dms\Core\Common\Crud\Form\ValueObjectField;
use App\Domain\Entities\SeoSettings;
use Dms\Common\Structure\Field;

/**
 * The App\Domain\Entities\SeoSettings value object field.
 */
class SeoSettingsField extends ValueObjectField
{


    public function __construct(string $name, string $label)
    {

        parent::__construct($name, $label);
    }

    /**
     * Defines the structure of this value object field.
     *
     * @param ValueObjectFieldDefinition $form
     *
     * @return void
     */
    protected function define(ValueObjectFieldDefinition $form)
    {
        $form->bindTo(SeoSettings::class);

        $form->section('Details', [
            $form->field(
                Field::create('seo_title', 'Seo Title')->string()
            )->bindToProperty(SeoSettings::SEO_TITLE),
            //
            $form->field(
                Field::create('seo_description', 'Seo Description')->string()
            )->bindToProperty(SeoSettings::SEO_DESCRIPTION),
            //
            $form->field(
                Field::create('seo_keywords', 'Seo Keywords')->string()
            )->bindToProperty(SeoSettings::SEO_KEYWORDS),
            //
        ]);

    }
}