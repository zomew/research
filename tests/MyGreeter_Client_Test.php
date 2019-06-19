<?php
require_once __DIR__ . '/../__INIT.php';

/**
 * 这里使用的PHPUNIT版本是8.0.4
 * @author  Jamers <jamersnox@zomew.net>
 * @license https://opensource.org/licenses/GPL-3.0 GPL
 * @since   2019.06.19
 */
class MyGreeter_Client_Test extends PHPUnit\Framework\TestCase
{
    /**
     * @var \MyGreeter\Client
     */
    private $greeter;

    /**
     * 初始化对象
     *
     * @return void
     * @since  2019.06.19
     */
    protected function setUp() : void
    {
        $this->greeter = \MyGreeter\Client::getInstance();
    }

    /**
     * 测试单例模式对象是否一致
     *
     * @return void
     * @since  2019.06.19
     */
    public function testInstance()
    {
        $this->assertEquals(
            get_class($this->greeter),
            'MyGreeter\Client'
        );
    }

    /**
     * 测试getGreeting函数预期
     *
     * @return void
     * @since  2019.06.19
     */
    public function testGetGreeting()
    {
        $list = [
            '2019-06-19 00:00:00' => 'Good morning',
            '2019-06-19 06:00:00' => 'Good morning',
            '2019-06-19 11:59:50' => 'Good morning',
            '2019-06-19 12:00:00' => 'Good afternoon',
            '2019-06-19 17:59:00' => 'Good afternoon',
            '2019-06-19 20:00:00' => 'Good evening',
        ];
        $this->assertTrue(
            strlen($this->greeter->getGreeting()) > 0
        );
        foreach ($list as $k => $v) {
            $this->assertEquals($this->greeter->getGreeting($k), $v);
        }
    }
}
