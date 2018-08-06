<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: alihamza
 * Date: 2/8/18
 * Time: 10:03 PM
 */

namespace App\Cms\Modules\Fields;


use App\Domain\Entities\PublishSettings;
use Dms\Common\Structure\Field;
use Dms\Core\Common\Crud\Definition\Form\ValueObjectFieldDefinition;
use Dms\Core\Common\Crud\Form\ValueObjectField;

class PublishSettingsField extends ValueObjectField
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
     * @throws \Dms\Core\Exception\InvalidArgumentException
     * @throws \Dms\Core\Exception\InvalidOperationException
     * @throws \Dms\Core\Exception\TypeMismatchException
     */
    protected function define(ValueObjectFieldDefinition $form)
    {
        $form->bindTo(PublishSettings::class);

        $form->section('Details', [
            $form->field(
                Field::create('is_active', 'Active')->bool()
            )->bindToProperty(PublishSettings::STATUS),
            //
            $form->field(
                Field::create('publish_date', 'Publish Date')->date()->attr('help-text', 'If blank, considered published')
            )->bindToProperty(PublishSettings::PUBLISH_DATE),
        ]);

    }
}