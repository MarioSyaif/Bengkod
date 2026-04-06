<x-layouts.app title="Tambah Poli">

    {{-- BREADCRUMB --}}
    <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-primary transition-colors">Poliklinik</a>
        <i class="fas fa-chevron-right text-xs"></i>
        <span class="text-slate-800 font-medium">Tambah Poli</span>
    </nav>

    {{-- HEADER --}}
    <div class="mb-6">
        <a href="{{ route('polis.index') }}" class="inline-flex items-center gap-2 text-slate-600 hover:text-primary transition-colors mb-3">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-2xl font-bold text-slate-800">Tambah Poli</h1>
    </div>

    {{-- FORM CARD --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <form action="{{ route('polis.store') }}" method="POST">
            @csrf

            {{-- NAMA POLI --}}
            <div class="mb-5">
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Nama Poli <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nama_poli" 
                       class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-sm placeholder:text-slate-400"
                       placeholder="Masukkan nama poli..."
                       value="{{ old('nama_poli') }}">
                @error('nama_poli')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- KETERANGAN --}}
            <div class="mb-6">
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Keterangan <span class="text-red-500">*</span>
                </label>
                <textarea name="keterangan" rows="4"
                          class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-sm resize-none placeholder:text-slate-400"
                          placeholder="Masukkan keterangan poli...">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- BUTTONS --}}
            <div class="flex items-center gap-3">
                <button type="submit" 
                        class="px-6 py-2.5 bg-primary hover:bg-primary/90 text-white text-sm font-semibold rounded-lg flex items-center gap-2 transition-all">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>
                <a href="{{ route('polis.index') }}" 
                   class="px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm font-semibold rounded-lg transition-all">
                    Batal
                </a>
            </div>

        </form>
    </div>

</x-layouts.app>