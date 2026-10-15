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