<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\BackEndController;
use App\models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Task\Store as TaskStore;

class Tasks extends Controller
{
    //



    public function index()
    {
        $tasks = Task::all();
        $PageTitle = 'Tasks';
        $headerLevelProcessTitle1 = "Tasks";
        $headerLevelProcessTitle2 = "All ( الكل )";
        $buttonsRoutsname = $modelViewName = "tasks";
        return view('Admin.tasks.index', compact('tasks', 'PageTitle', 'buttonsRoutsname', 'headerLevelProcessTitle1', 'headerLevelProcessTitle2'));
    }


    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
        if (Task::create($request->toArray())) {
            swal()->button('Close Me')->message('تم', 'تمت عملية الاضافة بنجاح', 'info');
        } else {
            swal()->button('Close Me')->message('Sorry !!', 'Your Process Not Completed !!', 'info');
        }
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tasks = Task::findOrFail($id);;
        $PageTitle = 'Tasks';
        $headerLevelProcessTitle1 = "Tasks";
        $headerLevelProcessTitle2 = "All ( الكل )";
        $buttonsRoutsname = $modelViewName = "tasks";
        return View('Admin.tasks.edit',compact('tasks','PageTitle', 'buttonsRoutsname', 'headerLevelProcessTitle1', 'headerLevelProcessTitle2'));
    }


    public function update(TaskStore $request, $id)
    {
        $row = Task::findOrFail($id);
        if($row->update($request->toArray())){
            swal()->button('Close Me')->message('تم','تمت عملية تعديل البيانات بنجاح','info');
        }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
        }
        return redirect('backend/tasks');
    }

    public function destroy($id)
    {
        //
    }
}

