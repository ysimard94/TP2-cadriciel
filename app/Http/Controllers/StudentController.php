<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Va rediriger vers la page d'accueil avec tous les étudiants
    public function index()
    {
        //
        $students = Student::all();

        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Va rediriger vers la page de création d'un étudiant
    public function create()
    {
        //
        $cities = City::all();

        return view('student.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Va insérer dans la base de données un nouvel étudiant lié au compte connecté
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $student = Student::create([
            'name' => $request->name,
            'email'  => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'user_id' => $request->user_id
        ]);

        return redirect(route('student.show', $student->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */

    // Va rediriger vers la page d'informations d'un étudiant spécifique
    public function show(Student $student)
    {
        $city = City::find($student->city_id);
        $student->city = $city->name;

        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */

    // Va rediriger vers la page de modification des informations d'un étudiant spécifique
    public function edit(Student $student)
    {
        //
        $cities = City::all();
        return view('student.edit', [
            'student' => $student,
            'cities' => $cities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */

    // Va mettre à jour les informations d'un étudiant spécifique dans la base de données
    public function update(Request $request, Student $student)
    {
        //
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city_id' => 'required'
        ]);

        $lastupdated = date('Y-m-d H:i:s');
        $lastupdated = date('Y-m-d H:i:s', strtotime($lastupdated));

        $student->update([
            'name' => $request->name,
            'email'  => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'updated_at' => $lastupdated
        ]);

        return redirect(route('student.edit', $student->id))->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */

    // Va supprimer un étudiant spécifique de la base de données
    public function destroy(Student $student)
    {
        //
        $student->delete();
        
        return redirect(route('student.index'));
    }
}
