<x-layouts.app title="Edit Pasien">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-slate-800">
            Edit Data Pasien
        </h2>

        <a href="{{ route('pasien.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-200 hover:bg-slate-300 
                  text-slate-700 rounded-xl text-sm font-semibold transition">
            <i class="fas fa-arrow-left text-sm"></i>
            Kembali
        </a>
    </div>

    {{-- Card Form --}}
    <div class="card bg-base-100 shadow-md rounded-2 border">
        <div class="card-body">
            <form action="{{ route('pasien.update', $pasien) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Nama Pasien <span class="text-error">*</span></span>
                        </label>
                        <input type="text" name="nama" placeholder="Masukkan nama pasien" 
                               class="input input-bordered @error('nama') input-error @enderror" 
                               value="{{ old('nama', $pasien->nama) }}" required>
                        @error('nama')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Email <span class="text-error">*</span></span>
                        </label>
                        <input type="email" name="email" placeholder="email@example.com" 
                               class="input input-bordered @error('email') input-error @enderror" 
                               value="{{ old('email', $pasien->email) }}" required>
                        @error('email')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">No. KTP <span class="text-error">*</span></span>
                        </label>
                        <input type="text" name="no_ktp" placeholder="Masukkan nomor KTP" maxlength="16"
                               class="input input-bordered @error('no_ktp') input-error @enderror" 
                               value="{{ old('no_ktp', $pasien->no_ktp) }}" required>
                        @error('no_ktp')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">No. HP <span class="text-error">*</span></span>
                        </label>
                        <input type="text" name="no_hp" placeholder="Masukkan nomor HP" 
                               class="input input-bordered @error('no_hp') input-error @enderror" 
                               value="{{ old('no_hp', $pasien->no_hp) }}" required>
                        @error('no_hp')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                </div>

                <div class="form-control mt-4">
                    <label class="label">
                        <span class="label-text font-semibold">Alamat <span class="text-error">*</span></span>
                    </label>
                    <textarea name="alamat" placeholder="Masukkan alamat lengkap" rows="4"
                              class="textarea textarea-bordered @error('alamat') textarea-error @enderror" required>{{ old('alamat', $pasien->alamat) }}</textarea>
                    @error('alamat')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mt-4">
                    <label class="label">
                        <span class="label-text font-semibold">Password <span class="text-info">(Kosongkan jika tidak ingin mengubah)</span></span>
                    </label>
                    <input type="password" name="password" placeholder="Masukkan password baru" 
                           class="input input-bordered @error('password') input-error @enderror">
                    @error('password')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="card-actions justify-end mt-6">
                    <button type="submit" class="btn bg-primary hover:bg-primary/90 text-white border-none">
                        <i class="fas fa-save me-2"></i> Update
                    </button>
                    <a href="{{ route('pasien.index') }}" class="btn bg-slate-200 hover:bg-slate-300 text-slate-700 border-none">
                        <i class="fas fa-times me-2"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

</x-layouts.app>