<?php

return [

    /*
     * Cabeçalho: Unwanted-Headers
     *
     * Documentação: https://techcommunity.microsoft.com/t5/iis-support-blog/remove-unwanted-http-response-headers/ba-p/369710
     *
     * Valores: 'X-Powered-By', 'Server'
     */

    'unwanted-headers' => [
        'X-Powered-By' => true, 
        'Server' => true
    ],

    /*
     * Cabeçalho: Referrer-Policy
     *
     * Documentação: https://www.w3.org/TR/referrer-policy
     *
     * Valores: 'no-referrer', 'no-referrer-when-downgrade', 'same-origin', 'origin', 'strict-origin', 
     * 'origin-when-cross-origin', 'strict-origin-when-cross-origin', 'unsafe-url'
     */

    'referrer-policy' => 'no-referrer-when-downgrade', 

    /*
     * Cabeçalho: X-Content-Type-Options
     *
     * Documentação: https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Headers/X-Content-Type-Options
     *
     * Valores: 'nosniff' 
     */

    'x-content-type-options' => 'nosniff', 

    /*
     * Cabeçalho: X-XSS-Protection
     *
     * Documentação: https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Headers/X-XSS-Protection
     *
     * Valores: '0', '1', '1; mode=block', '1; report=<reporting-uri>'(Chromium somente)
     */

    'x-xss-protection' => '1; mode=block',

    /*
     * Cabeçalho: X-Frame-Options
     *
     * Documentação: https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Headers/X-Frame-Options
     *
     * Valores: 'DENY', 'SAMEORIGIN', 'ALLOW-FROM uri'(Obsoleto)
     */

    'x-frame-options' => 'sameorigin',

    /*
     * Cabeçalho: X-Download-Options
     *
     * Documentação: https://msdn.microsoft.com/en-us/library/jj542450(v=vs.85).aspx
     *
     * Valores: 'noopen'
     */

    'x-download-options' => 'noopen',

    /*
     * Cabeçalho: Strict-Transport-Security
     *
     * Documentação: https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Headers/Strict-Transport-Security
     *
     * Valores: 'max-age=<expire-time>', 'max-age=<expire-time>; includeSubDomains', 'max-age=<expire-time>; preload'
     */

    'strict-transport-security' => [
        'enable' => true,

        'max-age' => 31536000, /* Um ano em segundos */

        'include-sub-domains' => false,

        'preload' => false,
    ],

    /*
     * Cabeçalho: Access-Control-Allow-Origin
     *
     * Documentação: https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
     *
     * Valores: '*', '<origin>'
     */

    'access-control-allow-origin' => '*',

    /*
     * Cabeçalho: Access-Control-Allow-Methods
     *
     * Documentação: https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Headers/Access-Control-Allow-Methods
     *
     * Valores: '*', 'GET','HEAD','POST','PUT','DELETE','CONNECT','OPTIONS','TRACE','PATCH' 
   */
    'access-control-allow-methods' => [
        'enable' => true,

        'GET' => true,

        'HEAD' => false,

        'POST' => true,

        'PUT' => true,

        'DELETE' => true,

        'CONNECT' => false,

        'OPTIONS' => true,

        'TRACE' => false,

        'PATCH' => false
    ],
 

    /*
     * Cabeçalho: Access-Control-Allow-Headers
     *
     * Documentação: https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Headers/Access-Control-Allow-Headers
     *
     * Valores: '*', '<nome-do-cabeçalho>[, <nome-do-cabeçalho>]*'
     */

    'access-control-allow-headers' => '*',

    /*
     * Cabeçalho: Permissions-Policy
     *
     * Documentação: https://www.w3.org/TR/permissions-policy-1
     */

    'permissions-policy' => [
        'enable' => false,

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/accelerometer */
        'accelerometer' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/ambient-light-sensor */
        'ambient-light-sensor' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/autoplay */
        'autoplay' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/battery */
        'battery' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/camera */
        'camera' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://www.chromestatus.com/feature/5690888397258752 */
        'cross-origin-isolated' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/display-capture */
        'display-capture' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/document-domain */
        'document-domain' => [
            'none' => false,

            '*' => true,

            'self' => false,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/encrypted-media */
        'encrypted-media' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://wicg.github.io/page-lifecycle/#execution-while-not-rendered */
        'execution-while-not-rendered' => [
            'none' => false,

            '*' => true,

            'self' => false,

            'origins' => [],
        ],

        /* Documentação: https://wicg.github.io/page-lifecycle/#execution-while-out-of-viewport */
        'execution-while-out-of-viewport' => [
            'none' => false,

            '*' => true,

            'self' => false,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/fullscreen */
        'fullscreen' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/geolocation */
        'geolocation' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/gyroscope */
        'gyroscope' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/magnetometer */
        'magnetometer' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/microphone */
        'microphone' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/midi */
        'midi' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://drafts.csswg.org/css-nav-1 */
        'navigation-override' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/payment */
        'payment' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/picture-in-picture */
        'picture-in-picture' => [
            'none' => false,

            '*' => true,

            'self' => false,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/publickey-credentials-get */
        'publickey-credentials-get' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/screen-wake-lock */
        'screen-wake-lock' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/sync-xhr */
        'sync-xhr' => [
            'none' => false,

            '*' => true,

            'self' => false,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/usb */
        'usb' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/web-share */
        'web-share' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/xr-spatial-tracking */
        'xr-spatial-tracking' => [
            'none' => false,

            '*' => false,

            'self' => true,

            'origins' => [],
        ],
    ],

    /*
     * Cabeçalho: Content-Security-Policy
     *
     * Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP 
     */
    'content-security-policy' => [
        'enable' => true,

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/default-src */
        'default-src' => [
            //
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src */
        'script-src' => [
            '\'self\'',
            'data:',
            '\'unsafe-inline\'',
            '\'unsafe-eval\'',
            '\'unsafe-hashes\'',
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/connect-src */
        'connect-src' => [
            '\'self\'',
            'cdn.jsdelivr.net', /* MaterialCSS */
            'fonts.googleapis.com', /* Google Fonts */
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/img-src */
        'img-src' => [
            '*',
            'data:',
            'https:'
        ],
        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src */
        'style-src' => [
            '\'unsafe-inline\'',
            'fonts.googleapis.com',
            'cdn.jsdelivr.net',
            '\'unsafe-eval\'',
            '\'unsafe-hashes\'',
            '\'self\'',
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/base-uri */
        'base-uri'=>[
            //
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/form-action */
        'form-action'=>[
            //
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/font-src */
        'font-src' => [
            '\'unsafe-inline\'',
            '\'unsafe-hashes\'',
            '\'self\'',
            'fonts.gstatic.com',
            'cdn.jsdelivr.net',
            'data:',
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/frame-src */
        'frame-src' => [
            //
        ],
        
        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/frame-ancestors */
        'frame-ancestors' => [
            //
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/manifest-src */
        'manifest-src' => [
            //
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/media-src */
        'media-src' => [
            //
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/prefetch-src */
        'prefetch-src' => [
            //
        ],

        /* Documentação: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/worker-src */
        'worker-src' => [
            //
        ],
    ],
];
