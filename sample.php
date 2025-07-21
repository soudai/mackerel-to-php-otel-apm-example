<?php

use OpenTelemetry\SDK\Trace\TracerProviderFactory;

require 'vendor/autoload.php';

$factory = new TracerProviderFactory();
$tp = $factory->create();
$tracer = $tp->getTracer('mackerel-trace-tutorial');
$tracer->spanBuilder('Hello Mackerel!')->startSpan()->end();

$tp->shutdown();

echo "Successfully sent a trace to Mackerel." . PHP_EOL;