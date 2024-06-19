<?php
namespace App\Http\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class Extended extends Basic
{
    public function configure()
    {
        parent::configure();

        // $this
        //     ->addDirective(Directive::STYLE, 'fonts.googleapis.com')
        //     ->addDirective(Directive::DEFAULT, 'google.analytics.com')
        //     ->addDirective(Directive::FONT, 'self')
        //     ->addDirective(Directive::FONT, 'fonts.googleapis.com')
        //     ->addDirective(Directive::FONT, 'fonts.gstatic.com')
        //     ->addDirective(Directive::SCRIPT_ELEM, 'self')
        //     ->addDirective(Directive::STYLE_ELEM, 'self');
        //     ->addNonceForDirective(Directive::SCRIPT_ELEM)
        //     ->addNonceForDirective(Directive::STYLE_ELEM);

            $this->addDirective(Directive::STYLE, 'fonts.googleapis.com');
            $this->addDirective(Directive::STYLE_ELEM, ['self', 'fonts.googleapis.com', 'fonts.gstatic.com', 'google-analytics.com', 'ajax.googleapis.com', 'google.com', 'gstatic.com', 'connect.facebook.net', 'facebook.com', 'unsafe-inline']);
            $this->addDirective(Directive::STYLE_ATTR, 'self', 'unsafe-inline', 'fonts.googleapis.com');
            $this->addDirective(Directive::FONT, 'fonts.googleapis.com');
            $this->addDirective(Directive::FONT, 'fonts.gstatic.com');
            $this->addDirective(Directive::FONT, 'self');
            $this->addDirective(Directive::DEFAULT, ['self', 'fonts.googleapis.com', 'fonts.gstatic.com', 'google-analytics.com', 'ajax.googleapis.com', 'google.com', 'gstatic.com', 'connect.facebook.net', 'facebook.com', 'unsafe-inline']);

            // $this->reportOnly();
    }
}
