<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function indexStatus()
    {
        $status = Status::all();
        $title = "Listado de status para equipos";
        return view('status.index', compact('status', 'title'));
    }
    public function createStatus()
    {
        $title = "Agregar nuevo departamento";
        $status = Status::all();

        return view('status/add', compact('title', 'status'));
    }

    public function storeStatus(Request $request)
    {
        $device = new Status($request->all());
        $device->save();

        return redirect()->route('indexStatus');
    }

    public function editStatus($statu)
    {
        $status = Status::findOrfail($statu);
        $title = "Editando al status ".$status->name;
        return view('status/edit', compact('status','title'));
    }

    public function updateStatus(Request $request, $id)
    {
        Status::findOrFail($id)->update($request->all());

        return redirect()->route('indexStatus');
    }

    public function deleteStatus($statu)
    {
        $status = Status::findOrFail($statu);
        $title = "¿DESEA BORRAR ESTE DEPARTAMENTO?";

        return view('status.delete', compact('status', 'title'));
    }

    public function destroyStatus($id)
    {
        $department = Status::findOrFail($id);
        Status::findOrFail($id)->delete();

        return redirect()->route('indexStatus');
    }
}
