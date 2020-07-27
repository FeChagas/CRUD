<?php

namespace App\Core;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\PsrLogMessageProcessor;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LogLevel;

/**
 * summary
 */
class Log
{
	protected function write_log($message, $context, $level) 
	{
		$dt = new \DateTime();
		$handler = new StreamHandler("../log/monolog_php_events_".$dt->format('Y-m-d').".log");
		$handler->setFormatter(new JsonFormatter());
		$memoryProcessor = new MemoryUsageProcessor();
		$psrProcessor = new PsrLogMessageProcessor();

		$logger = new Logger('crudLogger', [$handler], [
			$memoryProcessor,
			$psrProcessor,
		]);
		$logger->{$level}($message, $context);
	}
}

