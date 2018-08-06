<?php declare(strict_types=1);

namespace App\Cms\Packages;

use App\Cms\Modules\JsSnippetCodeModule;
use Dms\Package\Content\Cms\ContentPackage;
use Dms\Package\Content\Cms\Definition\ContentConfigDefinition;
use Dms\Package\Content\Cms\Definition\ContentGroupDefiner;
use Dms\Package\Content\Cms\Definition\ContentModuleDefinition;
use Dms\Package\Content\Cms\Definition\ContentPackageDefinition;

/**
 * @author rameez rami<rameespu@gmail.com>
 */
class SiteContentPackage extends ContentPackage
{
    protected static function defineConfig(ContentConfigDefinition $config)
    {
        $config
            ->storeImagesUnder(public_path('app/content/images'))
            ->mappedToUrl(url('app/content/images'))
            ->storeFilesUnder(public_path('app/content/files'));
    }

    /**
     * Defines the structure of the content.
     *
     * @param ContentPackageDefinition $content
     *
     * @return void
     * @throws \Dms\Core\Exception\InvalidOperationException
     */
    protected function defineContent(ContentPackageDefinition $content)
    {

        //######### HOME CONTENT MODULE STARTS
        $content->module('home', 'home', function (ContentModuleDefinition $module) {
            
            $module->group('seo', 'Search Engine Optimisation')
                ->withText('title', 'SEO Title')
                ->withText('description', 'SEO Description')
                ->withText('keywords', 'SEO Keywords')
            ;
        });
        //######### HOME CONTENT MODULE ENDS

        //######### SETTINGS CONTENT MODULE STARTS
        $content->module('settings', 'cog', function (ContentModuleDefinition $module) {
            $module->group('contact-details', 'Contact Details')
                ->withText('business_name', 'Business Name')
                ->withText('enquiry_email_address', 'Enquiry Email Address')
                ->withText('phone_number', 'Phone Number')
                ->withText('address_1', 'Address line 1')
                ->withText('address_2', 'Address line 2')
                ->withText('suburb', 'Suburb')
                ->withText('state', 'State')
                ->withText('post_code', 'Post Code');

            $module->group('social-links', 'Social Links')
                ->withText('facebook_link', 'Facebook Link')
                ->withText('twitter_link', 'Twitter Link')
                ->withText('linked_in_link', 'Linked In Link')
                ->withText('google_plus_link', 'Google Plus Link')
                ->withText('youtube_link', 'YouTube Link')
                ->withText('skype_link', 'Skype Link')
                ->withText('blog_link', 'Blog Link');

        });
        //######### SETTINGS CONTENT MODULE ENDS

        $content->customModules([
            'widget-codes' => JsSnippetCodeModule::class,
        ]);

    }
}