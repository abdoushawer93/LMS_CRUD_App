<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        return view('admin.teacher.index', [
            'teachers' => Teacher::query()
                ->when($request->query('search'), function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->query('search') . '%');
                })
                ->select('teachers.id', 'teachers.name', 'teachers.email')
                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeacherStore $request
     * @return RedirectResponseAlias|Redirector
     */
    public function store(TeacherStore $request)
    {
        Teacher::create($request->all());

        return redirect(route('teachers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Teacher $teacher
     * @return Factory|View
     */
    public function show(Teacher $teacher)
    {
        return view('admin.teacher.show', [
            'teacher' => $teacher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Teacher $teacher
     * @return Factory|View
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teacher.edit', [
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Teacher $teacher
     * @return Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update($request->all());
        return redirect(route('teachers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Teacher $teacher
     * @return RedirectResponseAlias|Redirector
     * @throws \Exception
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect(route('teachers.index'));
    }

    public function search(Request $request)
    {
        return view('admin.teacher.index', [
            'teachers' => teacher::query()
                ->where('name', 'like', '%' . $request->query('search') . '%')
                // ->withTrashed() -> select all in database  // ->onlyTrashed() -> to select only deleted
                ->select('teachers.id', 'teachers.name', 'teachers.email')
                ->paginate(10)
        ]);
    }
}
