<?php

namespace App\Http\Controllers;

use App\Device;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeviceStatusUserController extends Controller
{
    public function createStatusDeviceUser($id)
    {
        $status = Status::where('name', '<>', 'corregido')->get();
        $device = Device::findOrFail($id);

        $title = "Agregar status de equipo";
        $now = Carbon::now(); // la fecha actual

        return view('changeStatus.addstatus', compact('status','device','title', 'now'));
    }

    public function storeStatusDeviceUser(Request $request,$id)
    {
        $user = auth()->user();

        $user->devices()->attach($id, ['status_id' => $request->status_id, 'observation' => $request->observation]);

        $device = Device::findOrFail($id);
        $device->active = false;
        $device->save();

        return redirect()->route('indexDevice');
    }

    public function deleteStatusDeviceUser($id)
    {
        $device = Device::findOrFail($id);
        $device->active = true;
        $device->save();

        $user = auth()->user();
        $user->devices()->attach($id, ['status_id' => 1, 'observation' => 'Funcionando']);

        return redirect()->route('indexDevice');
    }
}
