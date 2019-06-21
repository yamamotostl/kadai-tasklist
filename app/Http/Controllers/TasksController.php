<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
     //タスク一覧画面
    public function index()
    {
        // 読み込んだレコードを渡して画面を表示
        // $tasks = Task::all();
        // return view('tasks.index', [
        //     'tasks' => $tasks,
        // ]);
            $data = [];
            if (\Auth::check()) 
            {
                $user = \Auth::user();
                //     $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
                    
                // }
                // $tasks = Task::all();
                // $tasks = $user->Task::all();
                $tasks = $user->tasks()->get();
                $data = [
                    'tasks' => $tasks,
                    'user' => $user,
                ];
                //dd($data);
                return view('tasks.index', $data);
            }
            else
            return view('welcome', $data);
        // return view('welcome', $data);
        
    }

     //新規登録フォーム画面
    public function create()
    {
        //新規登録の入れ物となるTaskインスタンスを生成し画面表示
        if (\Auth::check()) {
            $task = new Task;
            return view('tasks.create', [
                'task' => $task,
            ]);
        }
    }

     //新規登録処理
    public function store(Request $request)
    {
        //requestを保存するだけ
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:10',
        ]);
        
        // $task = new Task;
        // $task->content = $request->content;
        // $task->status = $request->status;
        // $task->save();
        
        $request->user()->tasks()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);
        
        return redirect('/');
    }

     //詳細画面表示
    public function show($id)
    {
        $task = Task::find($id);
        
        if (\Auth::id() === $task->user_id) {
            return view('tasks.show', [
                'task' => $task,
            ]);
        }
        return redirect('/');
    }

     //更新フォーム画面表示
    public function edit($id)
    {
        $task = Task::find($id);

        if (\Auth::id() === $task->user_id) {
            return view('tasks.edit', [
                'task' => $task,
            ]);
        }
        return redirect('/');
    }

     //更新処理
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:10',
        ]);
        
        $task = Task::find($id);
        if (\Auth::id() === $task->user_id) {
            $task->content = $request->content;
            $task->status = $request->status;
            $task->save();
        }
        // $request->user()->tasks()->create([
        //     'content' => $request->content,
        //     'status' => $status->status,
        // ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        
        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        return redirect('/');
    }
}
