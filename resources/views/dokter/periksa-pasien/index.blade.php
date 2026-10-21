<x-layouts.app>
    <div class="mb-5">
        <h1 class="text-xl font-bold text-slate-800">Periksa Pasien</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="table">
            <thead>
                <tr class="text-xs uppercase text-slate-500">
                    <th>ID</th>
                    <th>Pasien</th>
                    <th>Keluhan</th>
                    <th>No Antrian</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftarPasien as $daftar)
                    <tr>
                        <td>{{ $daftar->id }}</td>
                        <td class="font-semibold">{{ $daftar->pasien->nama }}</td>
                        <td class="text-slate-500">{{ $daftar->keluhan }}</td>
                        <td>{{ $daftar->no_antrian }}</td>
                        <td>
                            <div class="flex justify-end">
                                @if ($daftar->periksa)
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-green-100 text-green-700 text-xs font-semibold">
                                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                        Sudah Diperiksa
                                    </span>
                                @else
                                    <a href="{{ route('periksa-pasien.create', $daftar->id) }}"
                                       class="btn btn-xs bg-orange-400 text-white border-0">
                                        <i class="fas fa-stethoscope"></i> Periksa
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-slate-400 py-6">
                            Belum ada pasien yang mendaftar
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>