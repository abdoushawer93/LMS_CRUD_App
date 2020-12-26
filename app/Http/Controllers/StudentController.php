<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStore;
use App\Models\Student;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        return view('admin.student.index', [
            'students' => Student::query()
                ->when($request->query('search'), function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->query('search') . '%');
                })
                ->with(['addresses'])
                ->latest()
                ->select('students.id', 'students.name', 'students.email')
                ->paginate(100)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentStore $request
     * @return RedirectResponseAlias|Redirector
     */
    public function store(StudentStore $request)
    {
        Student::create($request->all());

        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return Factory|View
     */
    public function show(Student $student)
    {
        return view('admin.student.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return Factory|View
     */
    public function edit(Student $student)
    {
        return view('admin.student.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Student $student
     * @return Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return RedirectResponseAlias|Redirector
     * @throws \Exception
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect(route('students.index'));
    }

//    public function search(Request $request)
//    {
//        return view('admin.student.index', [
//            'students' => Student::query()
//                ->where('name', 'like', '%' . $request->query('search') . '%')
//                // ->withTrashed() -> select all in database  // ->onlyTrashed() -> to select only deleted
//                ->latest()
//                ->select('students.id', 'students.name', 'students.email')
//                ->paginate(10)
//        ]);
//    }

    public function addressCreate(Student $student)
    {
        return view('admin.student.address.create', [
            'student' => $student
        ]);
    }

    public function addressStore(Student $student, Request $request)
    {
        $student->addresses()->create($request->all());
        return redirect(route('students.index'));
    }
}
