<?php

namespace App\Providers;

use App\AppCms;
use App\AppOrm;
use App\Domain\Entities\JsSnippetCode;
use App\Domain\Entities\JsSnippetPosition;
use App\Domain\Services\Persistence\IJsSnippetCodeRepository;
use App\Infrastructure\Persistence\DbJsSnippetCodeRepository;
use Dms\Core\ICms;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Package\Content\Core\ContentLoaderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @var IJsSnippetCodeRepository
     */
    protected $jsSnippetCodeRepository;

    /**
     * Bootstrap any application services.
     *
     * @param IJsSnippetCodeRepository $jsSnippetCodeRepository
     * @throws \Dms\Core\Exception\InvalidArgumentException
     * @throws \Dms\Core\Exception\TypeMismatchException
     * @throws \Dms\Core\Model\Criteria\InvalidMemberExpressionException
     * @throws \Dms\Core\Model\Object\InvalidEnumValueException
     *
     * @return void
     */
    public function boot(IJsSnippetCodeRepository $jsSnippetCodeRepository)
    {
        //code snippets
        $this->jsSnippetCodeRepository = $jsSnippetCodeRepository;

        $openingHeadJs = $this->jsSnippetCodeRepository->matching(
            $this->jsSnippetCodeRepository->criteria()
                ->where(JsSnippetCode::POSITION, '=', new JsSnippetPosition(JsSnippetPosition::AFTER_OPENING_HEAD))
        );

        $closingHeadJs = $this->jsSnippetCodeRepository->matching(
            $this->jsSnippetCodeRepository->criteria()
                ->where(JsSnippetCode::POSITION, '=', new JsSnippetPosition(JsSnippetPosition::BEFORE_CLOSING_HEAD))
        );

        $openingBodyJs = $this->jsSnippetCodeRepository->matching(
            $this->jsSnippetCodeRepository->criteria()
                ->where(JsSnippetCode::POSITION, '=', new JsSnippetPosition(JsSnippetPosition::AFTER_OPENING_BODY))
        );

        $closingBodyJs = $this->jsSnippetCodeRepository->matching(
            $this->jsSnippetCodeRepository->criteria()
                ->where(JsSnippetCode::POSITION, '=', new JsSnippetPosition(JsSnippetPosition::BEFORE_CLOSING_BODY))
        );
        $codeSnippets = (object)[
            'openingHeadJs' => $openingHeadJs,
            'closingHeadJs' => $closingHeadJs,
            'openingBodyJs' => $openingBodyJs,
            'closingBodyJs' => $closingBodyJs,
        ];
        view()->composer('*', function ($view) use ($codeSnippets) {
            $view->with('codeSnippets', $codeSnippets);
        });

        //Content package contentLoader
        view()->composer('*', function ($view) {
            $view->with('contentLoader', app(ContentLoaderService::class));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IOrm::class, AppOrm::class);
        $this->app->singleton(ICms::class, AppCms::class);

        $this->app->singleton(IJsSnippetCodeRepository::class, DbJsSnippetCodeRepository::class);
    }
}
