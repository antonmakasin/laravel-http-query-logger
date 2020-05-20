<?php

namespace Oskingv\HttpQueryLogger\Http\Controllers;

use Oskingv\HttpQueryLogger\Contracts\LoggerInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $adminMiddleware = config('http-query-logger.admin_middleware');
        if ($adminMiddleware) {
            $adminMiddlewareArray = explode(',', $adminMiddleware);
            foreach ($adminMiddlewareArray as $middleware) {
                $this->middleware($middleware);
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, LoggerInterface $logger)
    {
        $date = $request->date ?? Carbon::today()->format('Y-m-d');

        $logs = $logger->getLogs($date);

        if(count($logs)>0){
            $logs = $logs->sortByDesc('created_at');
        }
        else{
            $logs = [];
        }
        return view('http-query-logger::index',compact(['logs', 'date']));

    }
    public function delete(LoggerInterface $logger)
    {
        $logger->deleteLogs();

        return redirect()->back();

    }

}
