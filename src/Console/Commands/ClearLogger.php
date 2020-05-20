<?php

namespace Oskingv\HttpQueryLogger\Console\Commands;

use Oskingv\HttpQueryLogger\Contracts\ApiLoggerInterface;
use Illuminate\Console\Command;

class ClearLogger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'http_query_logger:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush All Records of Http query logger';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(LoggerInterface $logger)
    {
        $logger->deleteLogs();

        $this->info("All records are deleted");
    }
}
