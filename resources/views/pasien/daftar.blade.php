<x-layouts.app title="Daftar Poli">

    <div class="flex items-center justify-center px-4">
        <div class="w-full max-w-3xl">
            <div class="card bg-base-100 shadow">
                <div class="card-body">

                    <h2 class="text-2xl font-bold text-center mb-6">
                        🏥 Pendaftaran Poli
                    </h2>

                    @if (session('message'))
                    <div class="alert alert-success mb-4">
                        <span>{{ session('message') }}</span>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-error mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('pasien.daftar.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_pasien" value="{{ $user->id }}">

                        {{-- Nomor RM --}}
                        <div class="mb-4">
                            <label class="font-semibold block mb-1">Nomor Rekam Medis</label>
                            <input type="text" value="{{ $user->no_rm }}"
                                class="w-full border-2 rounded-lg p-2 bg-gray-100" disabled>
                        </div>

                        {{-- Pilih Poli --}}
                        <div class="mb-4">
                            <label class="font-semibold block mb-1">Pilih Poli <span class="text-red-500">*</span></label>
                            <select name="id_poli" id="poliSelect" class="w-full border-2 rounded-lg p-2" required>
                                <option value="">-- Pilih Poli --</option>
                                @foreach ($polis as $poli)
                                <option value="{{ $poli->id }}">
                                    {{ $poli->nama_poli }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Pilih Jadwal --}}
                        <div class="mb-4">
                            <label class="font-semibold block mb-1">Pilih Jadwal Periksa <span class="text-red-500">*</span></label>
                            <select name="id_jadwal" id="jadwalSelect" class="w-full border-2 rounded-lg p-2" required>
                                <option value="">-- Pilih Jadwal --</option>
                                @foreach ($jadwals as $jadwal)
                                <option value="{{ $jadwal->id }}" 
                                        data-poli="{{ $jadwal->dokter->id_poli ?? '' }}"
                                        data-dokter="{{ $jadwal->dokter->nama ?? '-' }}">
                                    {{ $jadwal->hari }} | 
                                    {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }} | 
                                    Dr. {{ $jadwal->dokter->nama ?? '--' }}
                                </option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-500 mt-1">*Jadwal akan muncul setelah memilih poli</p>
                        </div>

                        {{-- Keluhan --}}
                        <div class="mb-6">
                            <label class="font-semibold block mb-1">Keluhan</label>
                            <textarea name="keluhan" rows="3" class="w-full border-2 rounded-lg p-2"
                                placeholder="Tulis keluhan anda..."></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-8 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                                Daftar Poli
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(){
            const poliSelect = document.getElementById("poliSelect");
            const jadwalSelect = document.getElementById("jadwalSelect");
            const jadwalOptions = jadwalSelect.querySelectorAll("option");

            poliSelect.addEventListener("change", function(){
                let selectedPoliId = this.value;
                let visibleCount = 0;
                
                jadwalOptions.forEach(option => {
                    // Skip option default
                    if(option.value === "") {
                        return;
                    }
                    
                    let optionPoliId = option.dataset.poli;
                    
                    // Jika poli tidak dipilih, sembunyikan semua jadwal
                    if(selectedPoliId === "") {
                        option.style.display = "none";
                        option.disabled = true;
                        option.selected = false;
                    } 
                    // Jika poli dipilih, tampilkan hanya yang cocok
                    else if(optionPoliId === selectedPoliId) {
                        option.style.display = "block";
                        option.disabled = false;
                        visibleCount++;
                    } 
                    // Sembunyikan yang tidak cocok
                    else {
                        option.style.display = "none";
                        option.disabled = true;
                        option.selected = false;
                    }
                });
                
                // Reset pilihan jadwal
                jadwalSelect.value = "";
                
                // Cek apakah ada jadwal yang tersedia
                if(selectedPoliId !== "" && visibleCount === 0) {
                    alert("Maaf, belum ada jadwal tersedia untuk poli ini. Silakan pilih poli lain atau hubungi admin.");
                }
            });
        });
    </script>
</x-layouts.app>