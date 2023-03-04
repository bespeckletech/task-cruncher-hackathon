<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class WakaController extends Controller
{
    public function sync_project(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'waqatime_id' => 'required',
        ]);

        $title = $request->title;
        $waqatime_id = $request->waqatime_id;

        $newProject = new Project;
        $newProject->title = $title;
        $newProject->waqatime_id = $waqatime_id;
        $newProject->save();

        return response()->json(['success'=>true, 'message'=>"Successfully synced project!"]);
    }

    public function sync_task(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'branchname' => 'required',
            'project_id' => 'required'
        ]);

        if ($validated) {
            $title = $request->title;
            $description = $request->description;
            $project_id = $request->project_id;
            $branchname = $request->branchname;

            $newTask = new Task;
            $newTask->title = $title;
            $newTask->description = $description;
            $newTask->project_id = $project_id;
            $newTask->branchname = $branchname;
            $newTask->save();

            return response()->json(['success'=>true, 'message'=>"Successfully synced task!"]);
        }
        return response()->json(['success'=>false, 'message'=>"failed to sync task!"]);
    }
}
