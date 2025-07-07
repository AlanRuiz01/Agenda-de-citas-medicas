<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;

class AgendarCita extends Component
{
    public $fecha, $hora, $doctor_id;
 
        protected $rules = [
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'doctor_id' => 'required|exists:users,id',
        ];

    public function save()
    {
        $this->validate();

        // Verificar si el horario ya está reservado
        $existe = Cita::where('fecha', $this->fecha)
                      ->where('hora', $this->hora)
                      ->exists();

        if ($existe) {
            $this->addError('hora', 'Este horario ya está reservado.');
            return;
        }

        Cita::create([
            'user_id' => Auth::id(),
            'doctor_id' => $this->doctor_id,
            'fecha' => $this->fecha,
            'hora'  => $this->hora,
            'estado' => 'reservada',
        ]);

        session()->flash('success', '¡Cita agendada con éxito!');
        $this->reset();
    }

    public function render()
    {
        $doctores = User::where('role', 'doctor')->get();

    return view('livewire.reservarCita'); // ← nombre exacto de la vista
    }
}

