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
                'https://www.google-analytics.com',
                'https://ajax.googleapis.com',
                'https://www.google.com',
                'https://google.com',
                'https://gstatic.com',
                'https://www.gstatic.com',
                'https://connect.facebook.net',
                'https://facebook.com',
            ],
            'script-src' => [
                'self' => true,
                'https://ajax.googleapis.com',
            ],
            'style-src' => [
                'self' => true,
                'https://fonts.googleapis.com',
            ],
            'style-src-elem' => [
                'self' => true,
                'https://fonts.googleapis.com',
            ],
            'img-src' => [
                'self' => true,
                'data:',
            ],
            'font-src' => [
                'self' => true,
                'https://fonts.gstatic.com',
            ],
            'connect-src' => [
                'self' => true,
                'https://www.google-analytics.com',
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
