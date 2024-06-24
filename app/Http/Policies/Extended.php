<?php
namespace App\Http\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class Extended extends Basic
{
    public function configure()
    {
        parent::configure();

            $this->addDirective(Directive::STYLE, 'fonts.googleapis.com');
            $this->addDirective(Directive::STYLE_ELEM, 'fonts.googleapis.com');
            $this->addDirective(Directive::FONT, 'fonts.googleapis.com');
            $this->addDirective(Directive::SCRIPT, 'fonts.googleapis.com');

            // $this->reportOnly();
    }
}
