<?php

declare(strict_types=1);

/*
 * This file is part of the forcodepoem package.
 *
 * The PHP Application Created By Code Poem. <Query Yet Simple>
 * (c) 2018-2099 http://forcodepoem.com All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\App\Controller;

use Leevel\Mvc\Controller;

/**
 * index 控制器.
 *
 * @author Name Your <your@mail.com>
 *
 * @since 2017.10.12
 *
 * @version 1.0
 */
class Index // extends Controller
{
    /**
     * 默认方法.
     */
    public function index()
    {
        $rpc = \Leevel\Client\Rpc::instance();

        return $rpc->call('test/handle2', ['foo', 'bar'], ['send_uid' => 350749960, 'name' => 'rango']);
        print_r([
            'php_version'    => PHP_VERSION,
            'swoole_version' => extension_loaded('swoole') ? phpversion('swoole') : 'Not installed Or It installed but not running.',
            'leevel_version' => extension_loaded('leevel') ? phpversion('leevel') : 'Not Installed.',
        ]);
    }

    public function tests()
    {
        return 'I am test33吞吞吐吐拖拖不hhhhhhhhh!';
    }

    public function coroutineMysql()
    {
        go(function () {
            \co::sleep(0.5);
            echo 'hello';
        });

        go('home\app\controller\test');
        go([$this, 'testMysql']);
    }

    protected function testMysql()
    {
        $mysql = new \Swoole\Coroutine\MySQL();

        $res = $mysql->connect([
            'host'     => '127.0.0.1',
            'user'     => 'root',
            'password' => '123456',
            'database' => 'dhb_data_2',
        ]);

        if (false === $res) {
            return 'MySQL connect fail!';
        }

        $ret = $mysql->query('select sleep(1)');

        echo 'swoole response is ok, result='.var_export($ret, true);
    }
}
