<?php
namespace App\Http\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class Extended extends Basic
{
    public function configure()
    {
        parent::configure();

            // $this->addDirective(Directive::STYLE, ['self','fonts.googleapis.com']);
            // $this->addDirective(Directive::STYLE_ELEM, ['self', 'fonts.googleapis.com', 'unsafe-inline']);
            // $this->addDirective(Directive::STYLE_ATTR, ['self', 'unsafe-inline', 'fonts.googleapis.com']);
            // $this->addDirective(Directive::FONT, ['self','fonts.gstatic.com']);
            // $this->addDirective(Directive::DEFAULT, ['self', 'google-analytics.com', 'ajax.googleapis.com', 'google.com', 'google.com', 'gstatic.com', 'gstatic.com', 'connect.facebook.net', 'facebook.com']);

            // $this->reportOnly();

            $this
                ->addDirective(Directive::SCRIPT, 'self')
                ->addDirective(Directive::STYLE, ['self','fonts.googleapis.com'])
                ->addDirective(Directive::FONT, ['self','fonts.gstatic.com'])
                ->addNonceForDirective(Directive::SCRIPT)
                ->addNonceForDirective(Directive::STYLE);
    }
}
