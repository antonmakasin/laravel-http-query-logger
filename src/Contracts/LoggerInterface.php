<?php

namespace Oskingv\HttpQueryLogger\Contracts;

interface LoggerInterface{

    /**
     * saving methods in favourite driver
     *
     * @param [type] $request
     * @param [type] $response
     * @return void
     */
    public function saveLogs($request,$response);
    /**
     * return logs to use in the frontend
     * @param string $date
     * @return void
     */
    public function getLogs(string $date);
    /**
     * provide method to delete all the logs
     *
     * @return void
     */
    public function deleteLogs();

}
