<?php


/*
    |--------------------------------------------------------------------------
    | Snappy PDF / Image Configuration
    |--------------------------------------------------------------------------
    |
    | This option contains settings for PDF generation.
    |
    | Enabled:
    |
    |    Whether to load PDF / Image generation.
    |
    | Binary:
    |
    |    The file path of the wkhtmltopdf / wkhtmltoimage executable.
    |
    | Timout:
    |
    |    The amount of time to wait (in seconds) before PDF / Image generation is stopped.
    |    Setting this to false disables the timeout (unlimited processing time).
    |
    | Options:
    |
    |    The wkhtmltopdf command options. These are passed directly to wkhtmltopdf.
    |    See https://wkhtmltopdf.org/usage/wkhtmltopdf.txt for all options.
    |
    | Env:
    |
    |    The environment variables to set while running the wkhtmltopdf process.
    |
    */
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        return [
            'pdf' => [
                'enabled' => true,
                'binary'  => config('addtubestream.WKHTML_PDF_BINARY', 'C:\"Program Files"\wkhtmltopdf\bin\wkhtmltopdf.exe'),
                'timeout' => false,
                'options' => ['enable-local-file-access' => true, 'cookie' => $_COOKIE],
                'env'     => [],
            ],

            'image' => [
                'enabled' => true,
                'binary'  => config('addtubestream.WKHTML_IMG_BINARY', 'C:\"Program Files"\wkhtmltopdf\bin\wkhtmltoimage.exe'),
                'timeout' => false,
                'options' => ['enable-local-file-access' => true, 'cookie' => $_COOKIE],
                'env'     => [],
            ],
        ];
    } else {
        return [
            'pdf' => [
                'enabled' => true,
                'binary'  => config('addtubestream.WKHTML_PDF_BINARY', '/usr/local/bin/wkhtmltopdf'),
                'timeout' => false,
                'options' => ['cookie' => $_COOKIE],
                'env'     => [],
            ],

            'image' => [
                'enabled' => true,
                'binary'  => config('addtubestream.WKHTML_IMG_BINARY', '/usr/local/bin/wkhtmltoimage'),
                'timeout' => false,
                'options' => ['cookie' => $_COOKIE],
                'env'     => [],
            ],
        ];
    };
