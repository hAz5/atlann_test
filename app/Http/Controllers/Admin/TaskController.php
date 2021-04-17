<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Repository\TaskRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /** @var TaskRepositoryInterface $taskRepository */
    private $taskRepository;

    /**
     * TaskController constructor.
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * show list of all tasks
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $tasks = Task::orderBy('created_at', 'desc');
        $tasks = $request->get('date', null) == null ? $tasks:
            $tasks->whereDate('created_at', $request->get('date'));

        $tasks = $tasks->paginate();

        return view('admin.task.index', ['tasks' => $tasks]);
    }
}
