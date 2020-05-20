<?php

namespace Oskingv\HttpQueryLogger;

use Oskingv\HttpQueryLogger\Contracts\LoggerInterface;

class DBLogger extends AbstractLogger implements LoggerInterface
{

    /**
     * Model for saving logs
     *
     * @var [type]
     */
    protected $logger;

    public function __construct(Log $logger)
    {
        parent::__construct();
        $this->logger = $logger;
    }
    /**
     * @param string $date
     * return all models
     */
    public function getLogs(string $date)
    {
        return $this->logger->all();
    }
    /**
     * save logs in database
     */
    public function saveLogs($request,$response)
    {
        if ($this->checkCodes($response->status())) {
            $data = $this->logData($request,$response);

            $this->logger->fill($data);

            $this->logger->save();
        }
    }
    /**
     * delete all logs
     */
    public function deleteLogs()
    {
        $this->logger->truncate();
    }
}
