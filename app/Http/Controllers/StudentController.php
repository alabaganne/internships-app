<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\UserResource;

use App\Models\User;
use App\Models\Student;
use App\Models\Field;
use App\Models\City;

use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Students/Index', [
            'students' => UserResource::collection(Student::paginate(12))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Students/Edit', [
            'fields' => Field::select('id', 'name')->get(),
            'cities' => City::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        Student::create($request->only('about', 'field_id', 'city_id'))->user()->save(
            User::create($request->only('name', 'email', 'phone_number'))
        );

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return Inertia::render('Students/Show', [
            'student' => new UserResource($student)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return Inertia::render('Students/Edit', [
            'student' => new UserResource($student),
            'fields' => Field::select('id', 'name')->get(),
            'cities' => City::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $student->update($request->only('about', 'field_id', 'city_id'));

        $student->user()->update($request->only('name', 'email', 'phone_number'));

        return redirect()->route('students.show', $student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->user()->delete();
        $student->delete();

        return redirect()->route('students.index');
    }
}
