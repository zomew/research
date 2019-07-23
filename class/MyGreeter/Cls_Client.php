<?php
/**
 * Created by PhpStorm.
 * User: Jamers
 * Date: 2019-06-19
 * Time: 8:32
 * File: Cls_Client.php
 */

namespace MyGreeter;

class Client
{
    /**
     * 实体静态变量
     * @var self
     */
    private static $instance;

    /**
     * 禁止实例化
     */
    private function __construct()
    {
    }

    /**
     * 禁止克隆
     *
     * @return void
     * @since  2019.06.19
     */
    private function __clone()
    {
    }

    /**
     * 获取单例模式对象
     *
     * @return Client
     * @static
     * @since  2019.06.19
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 根据时间获取问候语，便于调试加入默认调试参数
     * @param int $times 允许使用时间字符串和时间戳
     *
     * @return string
     * @since  2019.06.19
     */
    public function getGreeting($times = 0)
    {
        $ret = '';
        if (preg_match('/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}(?::\d{1,2})?/', $times)) {
            $times = strtotime($times);
        }
        if ($times == 0) {
            $times = time();
        }
        $base = strtotime(date('Y-m-d', $times));
        $diff = $times - $base;
        switch (true) {
            case ($diff < 12*60*60):    //小于12时
                $ret = 'Good morning';
                break;
            case ($diff >= 12*60*60 && $diff < 18*60*60):   //大于等于12时，小于18时
                $ret = 'Good afternoon';
                break;
            case ($diff >= 18*60*60):   //大于等于18时
                $ret = 'Good evening';
                break;
        }
        return $ret;
    }
}
