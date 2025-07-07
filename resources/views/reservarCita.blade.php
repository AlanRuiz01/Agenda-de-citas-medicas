
<div class="max-w-md mx-auto mt-8 p-6 bg-white rounded shadow">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label for="fecha" class="block font-semibold">Fecha</label>
            <input type="date" id="fecha" wire:model="fecha"
                   class="w-full border rounded px-3 py-2 mt-1">
            @error('fecha') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="doctor" class="block font-semibold">Doctor</label>
        <select id="doctor" wire:model="doctor_id" class="w-full border rounded px-3 py-2 mt-1">
            <option value="">-- Selecciona un doctor --</option>
            @foreach ($doctores as $doc)
                <option value="{{ $doc->id }}">{{ $doc->name }}</option>
            @endforeach
        </select>
        @error('doctor_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

        <div class="mb-4">
            <label for="hora" class="block font-semibold">Hora</label>
            <select id="hora" wire:model="hora"
                    class="w-full border rounded px-3 py-2 mt-1">
                <option value="">-- Selecciona una hora --</option>
                @foreach (['08:00', '09:00', '10:00', '11:00', '14:00', '15:00'] as $h)
                    <option value="{{ $h }}">{{ $h }}</option>
                @endforeach
            </select>
            @error('hora') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Agendar cita
        </button>
    </form>
</div>

