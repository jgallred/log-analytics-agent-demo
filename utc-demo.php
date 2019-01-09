<?php

require __DIR__ . '/vendor/autoload.php';

// Configure loggers
Logger::configure(
    [
        'appenders' => [
            'LogAnalyticsFileLogger' => [
                'class' => 'LoggerAppenderFile',
                'params' => [
                    'file' => '/var/log/demo/log-analytics-utc-demo.log',
                ],
                'layout' => [
                    'class' => 'LoggerLayoutPattern',
                    'params' => [
                        'conversionPattern' => '%date{Y-m-d\TH:i:sP} %pid [%level] [%logger] %message%newline'
                    ]
                ],
            ]
        ],
        'rootLogger' => [
            'appenders' => ['LogAnalyticsFileLogger'],
            'level' => 'DEBUG'
        ],
    ]
);

date_default_timezone_set('UTC');

$logger = Logger::getLogger('UTC-Logger');

while (1) {
    $id = uniqid('UTC-Logger_');
    $logger->debug("Message ID $id" . PHP_EOL . "Second line $id");
    sleep(1);
}
