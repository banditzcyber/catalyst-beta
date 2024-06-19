<?php
namespace App\Http\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class Extended extends Basic
{
    public function configure()
    {
        parent::configure();

            $this->addDirective(Directive::STYLE, ['self','fonts.googleapis.com']);
            $this->addDirective(Directive::STYLE_ELEM, ['self', 'fonts.googleapis.com', 'fonts.googleapis.com/css?family=Lato:300,400,700,900', 'unsafe-inline']);
            $this->addDirective(Directive::STYLE_ATTR, ['self', 'unsafe-inline', 'fonts.googleapis.com']);
            $this->addDirective(Directive::FONT, ['self','fonts.gstatic.com']);
            $this->addDirective(Directive::DEFAULT, ['self','google-analytics.com','unsafe-inline']);

            // $this->reportOnly();
    }
}
