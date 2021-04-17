<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    /** @var UserRepositoryInterface $userRepository */
    public $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
       $this->userRepository = $userRepository;
    }

    /**
     * show list of users
     *
     */
    public function index()
    {
        $users = $this->userRepository->getUsersWithTasksAndRoles();

        return view('admin.user.index', ['users' => $users]);
    }

    /**
     * show list of user tasks
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view(
            'admin.user.show',
            [
                'user' => $user,
                'tasks' => $user->tasks
            ]
        );
    }
}
