<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('created_at')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project(); //creiamo un progetto fittizio per unire i form dell'edit e del create

        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:255|unique:projects',
            'description' => 'required|string',
            'technologies' => 'nullable|string',
            'url' => 'nullable|url',
            'image' => 'nullable|url',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|string',
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve essere di almeno :min caratteri',
            'title.max' => 'Il titolo deve essere di massimo :max caratteri',
            'title.unique' => 'Titolo già esistente',
            'description.required' => 'La descrizione è obbligatoria',
            'image.url' => 'L\'indirizzo inserito non è valido',
            'status.required' => 'Lo status è obbligatorio',
            'end_date.after' => 'La data di fine deve essere successiva alla data di inizio'
        ]);


        $data = $request->all();

        $data['status'] = $request->input('status');

        $project = new Project();

        $project->fill($data);

        $project->slug = Str::slug($project->title);

        $project->save();

        return to_route('admin.projects.show', $project)->with('message', 'Progetto creato con successo.')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255', Rule::unique('projects')->ignore($project->id)],
            'description' => 'required|string',
            'technologies' => 'nullable|string',
            'url' => 'nullable|url',
            'image' => 'nullable|url',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|string',
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve essere di almeno :min caratteri',
            'title.max' => 'Il titolo deve essere di massimo :max caratteri',
            'title.unique' => 'Titolo già esistente',
            'description.required' => 'La descrizione è obbligatoria',
            'image.url' => 'L\'indirizzo inserito non è valido',
            'status.required' => 'Lo status è obbligatorio',
            'end_date.after' => 'La data di fine deve essere successiva alla data di inizio'
        ]);

        $data = $request->all();

        $data['status'] = $request->input('status');

        $project->fill($data);

        $project->slug = Str::slug($project->title);

        $project->save();

        return to_route('admin.projects.show', $project)->with('message', 'Progetto modificato con successo')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();


        return to_route('admin.projects.index')->with('type', 'success')->with('message', 'Progetto eliminato con successo');
    }


    //? Rotte soft delete
    public function trash()
    {
        $projects = Project::onlyTrashed()->get();
        return view('admin.projects.trash', compact('projects'));
    }

    public function restore(Project $project)
    {
        $project->restore();
        return to_route('admin.projects.index')->with('type', 'success')->with('message', 'Progetto ripristinato con successo.');
    }

    public function drop(Project $project)
    {
        $project->forceDelete();
        return to_route('admin.projects.trash')->with('type', 'warning')->with('message', 'Progetto eliminato definitivamente');
    }
}
