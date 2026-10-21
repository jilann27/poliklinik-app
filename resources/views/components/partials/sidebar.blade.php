<a href="{{ route('polis.index') }}"
    class="{{ $baseLink }} {{ request()->routeIs('polis.*') ? $active : $inactive }}">
    <i class="fas fa-hospital w-4 text-center"></i>
    Manajemen Poli
</a>
<a href="{{ route('dokter.index') }}"
    class="{{ $baseLink }} {{ request()->routeIs('dokter.*') ? $active : $inactive }}">
    <i class="fas fa-user-doctor w-4 text-center"></i>
    Manajemen Dokter
</a>
<a href="{{ route('pasien.index') }}"
    class="{{ $baseLink }} {{ request()->routeIs('pasien.*') ? $active : $inactive }}">
    <i class="fas fa-bed-pulse w-4 text-center"></i>
    Manajemen Pasien
</a>
<a href="{{ route('obat.index') }}"
    class="{{ $baseLink }} {{ request()->routeIs('obat.*') ? $active : $inactive }}"
>
    <i class="fas fa-pills w-4 text-center"></i>
    Manajemen Obat
</a>
<a href="{{ route('jadwal-periksa.index') }}"
    class="{{ $baseLink }} {{ request()->routeIs('jadwal-periksa.*') ? $active : $inactive }}"
>
    <i class="fas fa-stethoscope w-4 text-center"></i>
    Jadwal Periksa
</a>
<a href="{{ route('pasien.daftar') }}"
   class="{{ ($baseLink ?? '') . (request()->routeIs('pasien.daftar') ? $active : $inactive) }}">
    <i class="fas fa-house-medical w-4 text-center"></i>
    Pendaftaran Periksa
</a>

{{-- ================= DOKTER ================= --}}
@if(request()->is('dokter*'))

    <p class="text-xs uppercase tracking-widest text-indigo-400 px-3 mb-3 mt-6">
        Menu Dokter
    </p>

    <div class="space-y-1">

        <a href="{{ route('dokter.dashboard') }}"
            class="{{ $baseLink }} {{ request()->routeIs('dokter.dashboard') ? $active : $inactive }}">
            <i class="fas fa-stethoscope w-4 text-center"></i>
            Dashboard Dokter
        </a>
        <a href="{{ route('jadwal-periksa.index') }}"
            class="{{ $baseLink }} {{ request()->routeIs('jadwal-periksa.*') ? $active : $inactive }}">
            <i class="fas fa-calendar-days w-4 text-center"></i>
            Jadwal Periksa
        </a>
        <a href="{{ route('periksa-pasien.index') }}"
            class="{{ $baseLink }} {{ request()->routeIs('periksa-pasien.*') ? $active : $inactive }}">
            <i class="fas fa-notes-medical w-4 text-center"></i>
            Periksa Pasien
        </a>

{{-- ================ DOKTER ================ --}}
@if(request()->is('dokter*'))

<p class="text-xs uppercase tracking-widest text-indigo-400 px-3 mt-6">
    Menu Dokter
</p>

<div class="space-y-1">

    <a href="{{ route('dokter.dashboard') }}"
       class="{{ $baseLink }} {{ request()->routeIs('dokter.dashboard') ? $active : $inactive }}">
        <i class="fas fa-stethoscope w-4 text-center"></i>
        Dashboard Dokter
    </a>

    <a href="{{ route('jadwal-periksa.index') }}"
       class="{{ $baseLink }} {{ request()->routeIs('jadwal-periksa.*') ? $active : $inactive }}">
        <i class="fas fa-calendar-days w-4 text-center"></i>
        Jadwal Periksa
    </a>

    <a href="{{ route('periksa-pasien.index') }}"
       class="{{ $baseLink }} {{ request()->routeIs('periksa-pasien.*') ? $active : $inactive }}">
        <i class="fas fa-notes-medical w-4 text-center"></i>
        Periksa Pasien
    </a>

    <a href="{{ route('riwayat-pasien.index') }}"
       class="{{ $baseLink }} {{ request()->routeIs('riwayat-pasien.*') ? $active : $inactive }}">
        <i class="fas fa-clock-rotate-left w-4 text-center"></i>
        Riwayat Pasien
    </a>

</div>
@endif