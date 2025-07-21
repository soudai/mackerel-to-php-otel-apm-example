<?php
use OpenTelemetry\SDK\Trace\TracerProviderFactory;

class Dice
{

    private $tracer;
    private $root_span;
    private $tp;
    function __construct()
    {
        $factory = new TracerProviderFactory();
        $this->tp = $factory->create();
        $this->tracer = $this->tp->getTracer('mackerel-trace-tutorial');
        $this->root_span = $this->tracer->spanBuilder('Dice Mackerel!!!!')->startSpan();
    }

    public function roll($rolls)
    {
        $parentScope = $this->root_span->activate();

        $span = $this->tracer->spanBuilder("rollTheDice")->startSpan();
        $result = [];
        for ($i = 0; $i < $rolls; $i++) {
            $result[] = $this->rollOnce();
        }
        $span->end();
        $parentScope->detach();
        return $result;
    }

    private function rollOnce()
    {
        sleep(0.2);
        $parentScope = $this->root_span->activate();
        $span = $this->tracer->spanBuilder("Dice!!")->startSpan();
        $result = random_int(1, 6);
        $span->setAttribute('dicelib.rolled', $result);
        $span->end();
        $parentScope->detach();

        return $result;
    }

    public function __destruct()
    {
        $this->root_span->end();
        $this->tp->shutdown();
    }
}