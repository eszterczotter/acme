<?php

namespace unit\Acme\Support\Log;

use Monolog\Logger;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Log\LogLevel;

class MonoLoggerSpec extends ObjectBehavior
{
    function let(Logger $logger)
    {
        $this->beConstructedWith($logger);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Support\Log\Log');
        $this->shouldHaveType('Psr\Log\LoggerInterface');
    }

    function it_logs_emergencies(Logger $logger)
    {
        $message = "message";
        $context = [];
        $logger->log(LogLevel::EMERGENCY, $message, $context)->shouldBeCalled();
        $this->emergency($message, $context);
    }

    function it_logs_alerts(Logger $logger)
    {
        $message = "message";
        $context = [];
        $logger->log(LogLevel::ALERT, $message, $context)->shouldBeCalled();
        $this->alert($message, $context);
    }

    function it_logs_criticals(Logger $logger)
    {
        $message = "message";
        $context = [];
        $logger->log(LogLevel::CRITICAL, $message, $context)->shouldBeCalled();
        $this->critical($message, $context);
    }

    function it_logs_errors(Logger $logger)
    {
        $message = "message";
        $context = [];
        $logger->log(LogLevel::ERROR, $message, $context)->shouldBeCalled();
        $this->error($message, $context);
    }

    function it_logs_warnings(Logger $logger)
    {
        $message = "message";
        $context = [];
        $logger->log(LogLevel::WARNING, $message, $context)->shouldBeCalled();
        $this->warning($message, $context);
    }

    function it_logs_notices(Logger $logger)
    {
        $message = "message";
        $context = [];
        $logger->log(LogLevel::NOTICE, $message, $context)->shouldBeCalled();
        $this->notice($message, $context);
    }

    function it_logs_debugs(Logger $logger)
    {
        $message = "message";
        $context = [];
        $logger->log(LogLevel::DEBUG, $message, $context)->shouldBeCalled();
        $this->debug($message, $context);
    }

    function it_logs_infos(Logger $logger)
    {
        $message = "message";
        $context = [];
        $logger->log(LogLevel::INFO, $message, $context)->shouldBeCalled();
        $this->info($message, $context);
    }

    function it_logs(Logger $logger)
    {
        $level = Loglevel::INFO;
        $message = "message";
        $context = [];
        $logger->log($level, $message, $context)->shouldBeCalled();
        $this->log($level, $message, $context);
    }
}
