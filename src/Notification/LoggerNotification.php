<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2015/10/14
 * Time: 14:47
 */

namespace Jenner\LogMonitor\Notification;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class LoggerNotification implements NotificationInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct()
    {
        $this->logger = new Logger("logger notification");
        $this->logger->pushHandler(new StreamHandler("/tmp/notification.log"));
    }

    /**
     * send message to members
     * @param array $config
     * @param $message
     * @return mixed
     */
    public function send($config, $message)
    {
        $message = 'config:' . json_encode($config) . PHP_EOL . 'message:' . $message . PHP_EOL;
        $this->logger->info($message);
    }
}