<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IsOwnerTask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var \App\Models\Task $task */
        $task = $request->task;
        $id = Auth::user()->id;
        if ($task->user_id  === $id) {

            return $next($request);
        }

        return redirect(route('employee.task.index'));
    }
}
