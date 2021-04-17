<?php namespace App\Http\Controllers\Employee;


use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\Task\TaskStoreRequest;
use App\Http\Requests\Employee\Task\TaskUpdateRequest;
use App\Models\Task;
use App\Repository\Eloquent\TaskRepository;
use App\Repository\TaskRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /** @var TaskRepository $taskRepository */
    private $taskRepository;

    /**
     * TaskController constructor.
     *
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * show list of employee tasks
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks = $this->taskRepository->userTasks(Auth::id())->orderByDesc('created_at')->paginate(5);

        return view('employee.task.index', ['tasks' => $tasks]);
    }

    /**
     * show create task form
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('employee.task.create');
    }

    /**
     * store new task
     *
     * @param TaskStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskStoreRequest $request)
    {
        // create task
        Auth::user()->tasks()->create($request->except('employee_id'));

        Session::flash('success', 'task successfully created!');

        return redirect()->back();
    }


    /**
     * show edit form
     *
     * @param Task $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Task $task)
    {
        return view('employee.task.edit', ['task' => $task]);
    }

    /**
     * update task
     *
     * @param Task $task
     * @param TaskUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Task $task, TaskUpdateRequest $request)
    {
        $task->update($request->except('employee_id'));

        Session::flash('success', 'task successfully updated!');

        return redirect()->back();
    }


    /**
     * delete task
     *
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task)
    {
        $task->delete();

        Session::flash('success', 'task deleted');

        return redirect()->route('employee.task.index');
    }
}
