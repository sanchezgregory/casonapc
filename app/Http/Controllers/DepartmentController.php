<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function indexDepartment()
    {
        $departments = Department::with('devices')->get();
        $title = "Listado de departamentos";
        return view('departments.index', compact('departments', 'title'));
    }
    public function createDepartment()
    {
        $title = "Agregar nuevo departamento";
        $departments = Department::all();

        return view('departments/add', compact('title', 'departments'));
    }

    public function storeDepartment(Request $request)
    {
        $device = new Department($request->all());
        $device->save();

        return redirect()->route('indexDepartment');
    }

    public function editDepartment($department)
    {
        $department = Department::findOrfail($department);
        $title = "Editando al equipo ".$department->description;
        return view('departments/edit', compact('department','title'));
    }

    public function updateDepartment(Request $request, $id)
    {
        Department::findOrFail($id)->update($request->all());

        return redirect()->route('indexDepartment');
    }

    public function deleteDepartment($department)
    {
        $department = Department::findOrFail($department);
        $title = "¿DESEA BORRAR ESTE DEPARTAMENTO?";

        return view('departments.delete', compact('department', 'title'));
    }

    public function destroyDepartment($id)
    {
        $department = Department::findOrFail($id);
        Department::findOrFail($id)->delete();

        return redirect()->route('indexDepartment');
    }
}
