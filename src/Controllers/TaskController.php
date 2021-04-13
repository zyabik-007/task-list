<?php

namespace App\Controllers;

use App\Helper;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Valitron\Validator;

class TaskController
{
    public function __construct()
    {
        if (!empty($_SESSION['userId']))
            UserController::$user = User::where('id', $_SESSION['userId'])->first();
    }

    public function index($page = 1)
    {
        $request = Request::capture();
        $page = $PaginatorCurrentPage = intval((int)$page);
        $orderBy['status'] = $request->input('status_sort');
        $orderBy['name'] = $request->input('name_sort');
        $orderBy['email'] = $request->input('email_sort');
        $tasks = Task::getIndex($page, $orderBy);
        $PaginatorTotalItems = Task::count();
        return Helper::view('task.index', compact('tasks', 'PaginatorTotalItems', 'PaginatorCurrentPage'));
    }

    public function edit($id = null)
    {
        $task = Task::find(intval((int)$id));
        return Helper::view('task.form', compact('task'));
    }

    public function create()
    {
        return Helper::view('task.form');
    }

    public function store()
    {
        $request = Request::capture();
        if ($request->post() && (!empty($request->input('id')) && $_SESSION['pex'] === 'admin') || empty($request->input('id'))) {
            $v = new Validator($request->all());
            $v->rules([
                'required' => ['name', 'email', 'description'],
                'email' => ['email'],
                'integer' => ['id'],
                'lengthMin' => ['name', 1],
                'lengthMax' => [
                    ['name', 255],
                    ['email', 255],
                ],
                'in' => [['status', ['on', 'off']]]
            ]);
            if ($v->validate()) {
                $data = [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'description' => trim($request->input('description')),
                    'status' => $request->input('status') === 'on' ? 'done' : null
                ];
                $task = empty($request->input('id')) ? null : Task::where('id', $request->input('id'))->first();
                if (!empty($task) && $task->description != trim($request->input('description'))) $data['updated_at'] = date('Y-m-d H:i:s');
                if (Task::updateOrCreate(['id' => $request->input('id')], $data)) {
                    unset($_SESSION['errors']);
                    $_SESSION['success'] = true;
                } else $_SESSION['errors'] = [['Error db']];
            } else {
                $_SESSION['errors'] = $v->errors();
                $_SESSION['success'] = false;
            }
        }
        return Helper::redirect(!empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : Helper::url());
    }
}