<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$config = [
    'access_key_id' => 'access key',
    'access_key_secret' => 'access secret',
    'region' => 'cn-hangzhou',
    'services' => [
        [
            'product_name' => 'Dysmsapi',
            'domain' => 'dysmsapi.aliyuncs.com',
            'end_point_name' => 'cn-hangzhou',
        ],
    ],
];