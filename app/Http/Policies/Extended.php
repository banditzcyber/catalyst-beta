<?php
namespace App\Http\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class Extended extends Basic
{
    public function configure()
    {
        parent::configure();

        $this
            ->addDirective(Directive::STYLE, 'fonts.googleapis.com')
            ->addDirective(Directive::FONT, 'self')
            ->addDirective(Directive::FONT, 'fonts.googleapis.com')
            ->addDirective(Directive::FONT, 'fonts.gstatic.com')
            ->addDirective(Directive::SCRIPT_ELEM, 'self')
            ->addDirective(Directive::STYLE_ELEM, 'self');
            // ->addNonceForDirective(Directive::SCRIPT_ELEM)
            // ->addNonceForDirective(Directive::STYLE_ELEM);
    }
}
