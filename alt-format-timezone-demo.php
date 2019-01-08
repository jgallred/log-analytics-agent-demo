<?php

require __DIR__ . '/vendor/autoload.php';

// Configure loggers
Logger::configure(
    [
        'appenders' => [
            'LogAnalyticsFileLogger' => [
                'class' => 'LoggerAppenderFile',
                'params' => [
                    'file' => '/var/log/demo/log-analytics-alt-format-timezone-demo.log',
                ],
                'layout' => [
                    'class' => 'LoggerLayoutPattern',
                    'params' => [
                        'conversionPattern' => '%date{d/M/Y:H:i:s P} %pid [%level] [%logger] %message%newline'
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

date_default_timezone_set('America/Denver');

$logger = Logger::getLogger('Alt-Format-Non-UTC-Logger');

while (1) {
    $id = uniqid('Alt-Format-Non-UTC-Logger_');
    $logger->debug("Message ID $id" . PHP_EOL . "Second line $id");
    sleep(1);
}
