<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\IJsSnippetCodeRepository;
use App\Domain\Entities\JsSnippetCode;
use Dms\Common\Structure\Field;
use App\Domain\Entities\JsSnippetPosition;

/**
 * The js-snippet-code module.
 */
class JsSnippetCodeModule extends CrudModule
{


    public function __construct(IJsSnippetCodeRepository $dataSource, IAuthSystem $authSystem)
    {

        parent::__construct($dataSource, $authSystem);
    }

    /**
     * Defines the structure of this module.
     *
     * @param CrudModuleDefinition $module
     * @throws \Dms\Core\Exception\InvalidArgumentException
     * @throws \Dms\Core\Exception\InvalidOperationException
     */
    protected function defineCrudModule(CrudModuleDefinition $module)
    {
        $module->name('widget-codes');

        $module->labelObjects()->fromProperty(JsSnippetCode::NAME);

        $module->metadata([
            'icon' => 'code'
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('name', 'Name')->string()->required()
                )->bindToProperty(JsSnippetCode::NAME),
                //
                $form->field(
                    Field::create('js_code', 'Js Code')->string()->multiline()->required()
                )->bindToProperty(JsSnippetCode::JS_CODE),
                //
                $form->field(
                    Field::create('contact_type', 'Contact Type')->enum(JsSnippetPosition::class, [
                        JsSnippetPosition::AFTER_OPENING_HEAD => 'After <head>',
                        JsSnippetPosition::BEFORE_CLOSING_HEAD => 'Before </head>',
                        JsSnippetPosition::AFTER_OPENING_BODY => 'After <body>',
                        JsSnippetPosition::BEFORE_CLOSING_BODY => 'Before </body>'
                    ])->required()
                )->bindToProperty(JsSnippetCode::POSITION),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(JsSnippetCode::NAME)->to(Field::create('name', 'Name')->string()->required());
            $table->mapProperty(JsSnippetCode::JS_CODE)->to(Field::create('js_code', 'Js Code')->string()->required());
            $table->mapProperty(JsSnippetCode::POSITION)->to(Field::create('position', 'Position')->enum(JsSnippetPosition::class, [
                JsSnippetPosition::AFTER_OPENING_HEAD => 'After <head>',
                JsSnippetPosition::BEFORE_CLOSING_HEAD => 'Before </head>',
                JsSnippetPosition::AFTER_OPENING_BODY => 'After <body>',
                JsSnippetPosition::BEFORE_CLOSING_BODY => 'Before </body>'
            ])->required());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}