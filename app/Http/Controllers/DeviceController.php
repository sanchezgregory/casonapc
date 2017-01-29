<?php

namespace App\Http\Controllers;

use App\Department;
use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function indexDevice()
    {
        $departments = Department::with('devices')->get();
        $title = "Listado de equipos activos por departamento";
        return view('devices.index', compact('departments', 'title'));
    }
    public function createDevice()
    {
        $title = "Agregar nuevo equipo";
        $departments = Department::all();

        return view('devices/add', compact('title', 'departments'));
    }

    public function storeDevice(Request $request)
    {
        $device = new Device($request->all());
        $device->save();

        return redirect()->route('indexDevice');
    }

    public function editDevice($device)
    {
        $device = Device::findOrfail($device);
        $departments = Department::all();
        $title = "Editando al equipo ".$device->description;
        return view('devices/edit', compact('device','title','departments'));
    }

    public function updateDevice(Request $request, $id)
    {
        Device::findOrFail($id)->update($request->all());

        return redirect()->route('indexDevice');
    }

    public function deleteDevice($device)
    {
        $device = Device::findOrFail($device);
        $title = "¿DESEA DESINCORPORAR ESTE EQUIPO?";

        return view('devices.delete', compact('device', 'title'));
    }

    public function destroyDevice($id)
    {
        $device = Device::findOrFail($id);
        Device::findOrFail($id)->delete();

        return redirect()->route('indexDevice');
    }
}
