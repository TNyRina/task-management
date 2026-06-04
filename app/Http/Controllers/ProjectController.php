<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use DateTime;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * View : render index page
     */
    public function index(): View | RedirectResponse{
        return view('Projects.index',[
            'user' => Auth::user()  
        ]);
    }

    /**
     * View : render form page for Project (update | create)
     */
    public function form(): View | RedirectResponse {
        return view('Projects.form',[
            'user' => Auth::user(),
            'task' => new Project()
        ]);
    }

    /**
     * Store one task
     */
    public function store(ProjectRequest $request): View | RedirectResponse {
        try{
            $project = $request->validated();
            $project['user_id'] = Auth::id();
            $project['completed'] = false;
            $project = Project::create($project);

            return redirect()->route('project.index')
            ->with([
                'success' => 'Le project '.$project->title.'a été bien créée '
            ]);
        } catch(Exception $e){
            return back()->withErrors([
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function update(Project $project): View | RedirectResponse{
        return view('Projects.form',[
            'user' => Auth::user(),
            'task' => $project
        ]);
    }

    public function save(ProjectRequest $request, Project $project): View | RedirectResponse {
        try{
            $project->update($request->validated());

            return to_route('project.index')
            ->with([
                'success' => 'The project '.$project->title.' has been modified',
            ]);
        } catch(Exception $e){
            return back()->withErrors([
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function updateStatus(Project $project, int $code_status = 1): View | RedirectResponse {
        try {
            $project = Project::find($project->id);
            if (!$project) 
                return back()->withErrors(['errors' => 'Task not found']);
    
            if ($code_status === 1) {
                if ($project->status === 0) $project->accrued_time += $project->accruedTime(); 
                
                $project->play_at = new DateTime();
                $project->status = ($project->status === 1) ? 0 : 1;
            }
               
            elseif ($code_status === 2 || $code_status === 3) 
                $project->status = $code_status;
            else
                return back()->withErrors(['errors' => 'Invalid status code']);
            
            $project->save();
            
            $message = 'The project '.$project->title.' is now';
            switch($project->status){
                case 0: $message .= ' in progressing'; break;
                case 1: $message .= ' on pause'; break;
                case 2: $message .= ' done'; break;
                case 3: $message .= ' abandoned'; break;
                default: break;
            }
    
            return to_route('project.index')
                ->with([
                    'success' => $message,
                    'user' => Auth::user()
                ]);
        } catch (Exception $e) {
            dump('Error: ' . $e->getMessage());
            return back()->withErrors([
                'errors' => $e->getMessage()
            ]);
        }
    }
    

    public function delete(Project $project): View | RedirectResponse {
        try{
            $project->delete();

            return to_route('project.index')
            ->with([
                'success' => 'The project '.$project->title.' has been deleted',
                'user' => Auth::user()
            ]);
        } catch(Exception $e){
            return back()->withErrors([
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function filterByStatus(int $code_status): View | RedirectResponse{
        $user = Auth::user();

        if ($code_status < 0)
            return to_route('project.index')
                ->with(['user' => $user]);

        return view('Projects.index',[
            'projects' => Project::filterByStatus($code_status, $user->id)->get(),
            'user' => $user 
        ]);
    }
    
}
