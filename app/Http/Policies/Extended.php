<?php
namespace App\Http\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class Extended extends Basic
{
    public function configure()
    {
        parent::configure();

            // $this->reportOnly();

            $this
                ->addDirective(Directive::SCRIPT, 'self')
                ->addDirective(Directive::STYLE, ['self','fonts.googleapis.com'])
                ->addDirective(Directive::FONT, ['self','fonts.gstatic.com'])
                ->addDirective(Directive::STYLE_ELEM, ['self','fonts.googleapis.com', 'unsafe-inline'])
                ->addDirective(Directive::DEFAULT, ['self','fonts.googleapis.com', 'unsafe-inline'])
                ->addNonceForDirective(Directive::SCRIPT)
                ->addNonceForDirective(Directive::STYLE);
    }
}
