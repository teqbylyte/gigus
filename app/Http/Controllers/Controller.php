<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function handleException(\Exception $e)
    {
        $msg = env('APP_ENV') == 'production' ?
            'An error occurred.' : $e->getMessage();

        \Log::error($msg);
        return back()->with('error', $msg);
    }
}
