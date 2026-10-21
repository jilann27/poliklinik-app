<x-layouts.app>
    <div class="max-w-xl mx-auto bg-white rounded-xl shadow-sm p-6">
        <h1 class="text-xl font-bold text-center mb-5">
            <i class="fas fa-notes-medical text-indigo-600"></i> Pendaftaran Poli
        </h1>

        <form action="{{ route('pasien.daftar.submit') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="id_pasien" value="{{ $user->id }}">

            <div>
                <label class="block text-sm font-medium mb-1">Nomor Rekam Medis</label>
                <input type="text" value="{{ $user->no_rm }}" readonly
                       class="input input-bordered w-full bg-slate-100">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Pilih Poli</label>
                <select name="id_poli" id="selectPoli" class="select select-bordered w-full">
                    <option value="">-- Pilih Poli --</option>
                    @foreach ($polis as $poli)
                        <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                    @endforeach
                </select>
                @error('id_poli') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Pilih Jadwal Periksa</label>
                <select name="id_jadwal" id="selectJadwal" class="select select-bordered w-full">
                    <option value="">-- Pilih Jadwal --</option>
                    @foreach ($jadwals as $j)
                        <option value="{{ $j->id }}" data-poli="{{ $j->dokter->id_poli }}" hidden>
                            {{ $j->dokter->nama }} - {{ $j->hari }}
                            ({{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }}-{{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }})
                        </option>
                    @endforeach
                </select>
                @error('id_jadwal') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Keluhan</label>
                <textarea name="keluhan" rows="4" class="textarea textarea-bordered w-full"
                          placeholder="Tulis keluhan anda...">{{ old('keluhan') }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary btn-sm">Daftar Poli</button>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        const poli = document.getElementById('selectPoli');
        const jadwal = document.getElementById('selectJadwal');
        poli.addEventListener('change', () => {
            jadwal.value = '';
            [...jadwal.options].forEach(o => {
                if (!o.value) return;
                o.hidden = o.dataset.poli !== poli.value;
            });
        });
    </script>
    @endpush
</x-layouts.app>