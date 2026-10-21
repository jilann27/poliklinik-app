<x-layouts.app>
    <div class="flex items-center gap-3 mb-5">
        <a href="{{ route('periksa-pasien.index') }}" class="text-slate-500 hover:text-slate-800">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-xl font-bold text-slate-800">Periksa Pasien</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('periksa-pasien.store') }}" method="POST" class="space-y-5">
            @csrf
            <input type="hidden" name="id_daftar_poli" value="{{ $daftarPoli->id }}">

            {{-- Info pasien --}}
            <div class="text-sm text-slate-500">
                Pasien: <span class="font-semibold text-slate-800">{{ $daftarPoli->pasien->nama }}</span>
                &middot; Keluhan: <span class="text-slate-700">{{ $daftarPoli->keluhan }}</span>
            </div>

            {{-- Pilih obat --}}
            <div>
                <label class="block text-sm font-medium mb-1">Pilih Obat <span class="text-red-500">*</span></label>
                <select id="selectObat" class="select select-bordered w-full">
                    <option value="">-- Pilih Obat --</option>
                    @foreach ($obats as $obat)
                        <option value="{{ $obat->id }}"
                                data-nama="{{ $obat->nama_obat }}"
                                data-harga="{{ $obat->harga }}">
                            {{ $obat->nama_obat }} - Rp {{ number_format($obat->harga, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
                @error('obat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Obat terpilih --}}
            <div>
                <label class="block text-sm font-medium mb-1">Obat Terpilih</label>
                <div id="listObat" class="space-y-2 min-h-10"></div>
            </div>

            {{-- Total harga --}}
            <div>
                <label class="block text-sm font-medium mb-1">Total Harga</label>
                <input type="text" id="totalHarga" value="Rp 0" readonly
                       class="input input-bordered w-full bg-slate-50 font-semibold">
            </div>

            {{-- Catatan --}}
            <div>
                <label class="block text-sm font-medium mb-1">
                    Catatan <span class="text-slate-400 text-xs">(Opsional)</span>
                </label>
                <textarea name="catatan" rows="4" class="textarea textarea-bordered w-full"
                          placeholder="Tulis catatan...">{{ old('catatan') }}</textarea>
                @error('catatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit" class="btn bg-[#1e2a78] text-white border-0">
                    <i class="fas fa-floppy-disk"></i> Simpan
                </button>
                <a href="{{ route('periksa-pasien.index') }}" class="btn btn-ghost">Batal</a>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        const select = document.getElementById('selectObat');
        const list = document.getElementById('listObat');
        const totalEl = document.getElementById('totalHarga');
        const dipilih = new Map(); // id => {nama, harga}

        const rupiah = n => 'Rp ' + n.toLocaleString('id-ID');

        function render() {
            list.innerHTML = '';
            let total = 0;
            dipilih.forEach((o, id) => {
                total += o.harga;
                const row = document.createElement('div');
                row.className = 'flex items-center justify-between bg-slate-50 rounded-lg px-3 py-2 text-sm';
                row.innerHTML = `
                    <span>${o.nama} - ${rupiah(o.harga)}</span>
                    <span>
                        <input type="hidden" name="obat[]" value="${id}">
                        <button type="button" class="text-red-500 hover:text-red-700" data-hapus="${id}">
                            <i class="fas fa-xmark"></i>
                        </button>
                    </span>`;
                list.appendChild(row);
            });
            totalEl.value = rupiah(total);
        }

        select.addEventListener('change', () => {
            const opt = select.options[select.selectedIndex];
            if (!opt.value || dipilih.has(opt.value)) { select.value = ''; return; }
            dipilih.set(opt.value, { nama: opt.dataset.nama, harga: parseInt(opt.dataset.harga) });
            select.value = '';
            render();
        });

        list.addEventListener('click', e => {
            const btn = e.target.closest('[data-hapus]');
            if (btn) { dipilih.delete(btn.dataset.hapus); render(); }
        });
    </script>
    @endpush
</x-layouts.app>