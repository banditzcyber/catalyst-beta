<?php
namespace App\Http\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class Extended extends Basic
{
    public function configure()
    {
        parent::configure();

            $this->addDirective(Directive::STYLE, ['self','fonts.googleapis.com', 'fonts.gstatic.com']);
            // $this->addDirective(Directive::STYLE_ELEM, ['self']);
            $this->addDirective(Directive::FONT, ['self','fonts.googleapis.com', 'fonts.gstatic.com']);
            $this->addDirective(Directive::SCRIPT, ['self','fonts.googleapis.com']);

            // $this->reportOnly();
    }
}
