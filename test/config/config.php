<?php

// 注释项代表可省略的，使用默认值
return [
    // 项目根命名空间
    'namespace'    => 'Imi\AC\Test',
    // 扫描目录
    'beanScan'    => [
        'Imi\AC\Test\Tool',
    ],
    // 组件命名空间
    'components'    => [
        'AccessControl'       => 'Imi\AC',
    ],
    // 主服务器配置
    'mainServer'    => [
    ],
    // 子服务器（端口监听）配置
    'subServers'        => [
    ],
    // 配置文件
    'configs'    => [
        'beans'        => __DIR__ . '/beans.php',
    ],
    'db'    => [
        // 数据库默认连接池名
        'defaultPool'    => 'maindb',
    ],
    'pools'    => [
        // 数据库连接池名：maindb
        'maindb'    => [
            // 同步池子，task进程使用
            'sync'    => [
                'pool'    => [
                    'class'        => \Imi\Db\Pool\SyncDbPool::class,
                    'config'       => [
                        'maxResources'    => 10,
                        'minResources'    => 0,
                    ],
                ],
                'resource'    => [
                    'dbClass'     => \Imi\Db\Drivers\PdoMysql\Driver::class,
                    'host'        => imiGetEnv('MYSQL_SERVER_HOST', '127.0.0.1'),
                    'username'    => 'root',
                    'password'    => 'root',
                    'database'    => 'db_imi_access_control',
                ],
            ],
            // 异步池子，worker进程使用
            'async'    => [
                'pool'    => [
                    'class'        => \Imi\Db\Pool\CoroutineDbPool::class,
                    'config'       => [
                        'maxResources'    => 10,
                        'minResources'    => 0,
                    ],
                ],
                'resource'    => [
                    'dbClass'     => \Imi\Db\Drivers\PdoMysql\Driver::class,
                    'host'        => imiGetEnv('MYSQL_SERVER_HOST', '127.0.0.1'),
                    'username'    => 'root',
                    'password'    => 'root',
                    'database'    => 'db_imi_access_control',
                ],
            ],
        ],
    ],
];
