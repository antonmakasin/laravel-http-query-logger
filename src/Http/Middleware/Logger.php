<?php

namespace Oskingv\HttpQueryLogger\Http\Middleware;

use Oskingv\HttpQueryLogger\Contracts\LoggerInterface;
use Closure;

class Logger
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        return $response;
    }

    public function terminate($request, $response)
    {
        $this->logger->saveLogs($request,$response);
    }
}
