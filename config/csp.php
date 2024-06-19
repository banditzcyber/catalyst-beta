<?php

return [

    /*
     * A policy will determine which CSP headers will be set. A valid CSP policy is
     * any class that extends `Spatie\Csp\Policies\Policy`
     */
    // 'policy' => Spatie\Csp\Policies\Basic::class,
    'policy' => App\Http\Policies\Extended::class,
    // 'report_only_policy' => App\Http\Policies\Extended::class,

    'policies' => [

        Spatie\Csp\Policies\Basic::class => [
            'default-src' => [
                'self' => true,
                'google-analytics.com',
                'ajax.googleapis.com',
                'google.com',
                'google.com',
                'gstatic.com',
                'gstatic.com',
                'connect.facebook.net',
                'facebook.com',
            ],
            'script-src' => [
                'self' => true,
                'ajax.googleapis.com',
            ],
            'style-src' => [
                'self' => true,
                'fonts.googleapis.com',
            ],
            'style-src-elem' => [
                'self' => true,
                'fonts.googleapis.com',
            ],
            'img-src' => [
                'self' => true,
                'data:',
            ],
            'font-src' => [
                'self' => true,
                'fonts.gstatic.com',
            ],
            'connect-src' => [
                'self' => true,
                'www.google-analytics.com',
            ],
            // Add other directives as needed
        ],
    ],

    /*
     * This policy which will be put in report only mode. This is great for testing out
     * a new policy or changes to existing csp policy without breaking anything.
     */
    'report_only_policy' => '',

    /*
     * All violations against the policy will be reported to this url.
     * A great service you could use for this is https://report-uri.com/
     *
     * You can override this setting by calling `reportTo` on your policy.
     */
    'report_uri' => env('CSP_REPORT_URI', ''),

    /*
     * Headers will only be added if this setting is set to true.
     */
    'enabled' => env('CSP_ENABLED', true),

    /*
     * The class responsible for generating the nonces used in inline tags and headers.
     */
    'nonce_generator' => Spatie\Csp\Nonce\RandomString::class,
];
