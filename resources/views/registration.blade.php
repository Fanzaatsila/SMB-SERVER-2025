@extends('partials.header')

@section('title', 'Formulir Registrasi - SMB')

@section('content')
<style>
    .registration-container {
        min-height: 100vh;
        padding: 80px 20px 40px;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }

    body.dark-mode .registration-container {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    }

    .registration-card {
        max-width: 1200px;
        margin: 0 auto;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        padding: 40px;
    }

    body.dark-mode .registration-card {
        background: #2d2d2d;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    }

    .registration-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .registration-logo {
        max-width: 150px;
        margin-bottom: 20px;
        height: auto;
    }

    .registration-title {
        font-size: 28px;
        font-weight: bold;
        color: #28353B;
        margin-bottom: 10px;
    }

    body.dark-mode .registration-title {
        color: #ffffff;
    }

    .registration-subtitle {
        font-size: 16px;
        color: #666;
        margin-bottom: 30px;
    }

    body.dark-mode .registration-subtitle {
        color: #b0b0b0;
    }

    .section-title {
        font-size: 20px;
        font-weight: bold;
        color: #00B2D6;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #00B2D6;
    }

    body.dark-mode .section-title {
        color: #00B2D6;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #28353B;
        margin-bottom: 8px;
        display: block;
    }

    body.dark-mode .form-label {
        color: #e0e0e0;
    }

    .form-control, .form-select {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
        color: #28353B;
    }

    body.dark-mode .form-control,
    body.dark-mode .form-select {
        background: #1a1a1a;
        border-color: #444;
        color: #e0e0e0;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: #00B2D6;
        box-shadow: 0 0 0 3px rgba(0, 178, 214, 0.1);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
    }

    .radio-group {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .radio-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .radio-item input[type="radio"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .radio-item label {
        margin: 0;
        cursor: pointer;
        color: #28353B;
    }

    body.dark-mode .radio-item label {
        color: #e0e0e0;
    }

    .btn-submit {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, #00B2D6 0%, #0099b8 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 30px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(0, 178, 214, 0.4);
    }

    .required-mark {
        color: #dc3545;
        margin-left: 3px;
    }

    @media (max-width: 768px) {
        .registration-card {
            padding: 30px 20px;
        }

        .registration-title {
            font-size: 24px;
        }

        .section-title {
            font-size: 18px;
        }
    }
</style>

<div class="registration-container">
    <div class="registration-card">
        <div class="registration-header">
            <h1 class="registration-title">Formulir Registrasi Pelatihan dan Sertifikasi</h1>
            <p class="registration-subtitle">Silakan isi formulir berikut dengan lengkap dan benar</p>
        </div>

        <form action="{{ route('registration.submit') }}" method="POST">
            @csrf
            
            <div class="row">
                <!-- Left Column - Data Diri -->
                <div class="col-md-6">
                    <h3 class="section-title">Data Diri</h3>

                    <div class="form-group">
                        <label class="form-label" for="nama_lengkap">Nama Lengkap<span class="required-mark">*</span></label>
                        <input type="text" 
                               class="form-control @error('nama_lengkap') is-invalid @enderror" 
                               id="nama_lengkap" 
                               name="nama_lengkap" 
                               value="{{ old('nama_lengkap') }}" 
                               placeholder="Masukkan nama lengkap"
                               required>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nik">NIK<span class="required-mark">*</span></label>
                        <input type="text" 
                               class="form-control @error('nik') is-invalid @enderror" 
                               id="nik" 
                               name="nik" 
                               value="{{ old('nik') }}" 
                               placeholder="Nomor Induk Kependudukan"
                               required>
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="sumber_anggaran">Sumber Anggaran<span class="required-mark">*</span></label>
                        <input type="text" 
                               class="form-control @error('sumber_anggaran') is-invalid @enderror" 
                               id="sumber_anggaran" 
                               name="sumber_anggaran" 
                               value="{{ old('sumber_anggaran') }}" 
                               placeholder="Contoh: Pribadi, Perusahaan, dll"
                               required>
                        @error('sumber_anggaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin<span class="required-mark">*</span></label>
                        <div class="radio-group">
                            <div class="radio-item">
                                <input type="radio" 
                                       id="jk_laki" 
                                       name="jenis_kelamin" 
                                       value="Laki-laki" 
                                       {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}
                                       required>
                                <label for="jk_laki">Laki-laki</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" 
                                       id="jk_perempuan" 
                                       name="jenis_kelamin" 
                                       value="Perempuan" 
                                       {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}
                                       required>
                                <label for="jk_perempuan">Perempuan</label>
                            </div>
                        </div>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="alamat_domisili">Alamat Domisili<span class="required-mark">*</span></label>
                        <textarea class="form-control @error('alamat_domisili') is-invalid @enderror" 
                                  id="alamat_domisili" 
                                  name="alamat_domisili" 
                                  rows="3" 
                                  placeholder="Masukkan alamat lengkap"
                                  required>{{ old('alamat_domisili') }}</textarea>
                        @error('alamat_domisili')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="kode_pos">Kode Pos<span class="required-mark">*</span></label>
                        <input type="text" 
                               class="form-control @error('kode_pos') is-invalid @enderror" 
                               id="kode_pos" 
                               name="kode_pos" 
                               value="{{ old('kode_pos') }}" 
                               placeholder="Contoh: 12345"
                               required>
                        @error('kode_pos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="no_telepon">No. Telepon<span class="required-mark">*</span></label>
                        <input type="tel" 
                               class="form-control @error('no_telepon') is-invalid @enderror" 
                               id="no_telepon" 
                               name="no_telepon" 
                               value="{{ old('no_telepon') }}" 
                               placeholder="Contoh: 08123456789"
                               required>
                        @error('no_telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email<span class="required-mark">*</span></label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="contoh@email.com"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="pendidikan_terakhir">Pendidikan Terakhir<span class="required-mark">*</span></label>
                        <select class="form-select @error('pendidikan_terakhir') is-invalid @enderror" 
                                id="pendidikan_terakhir" 
                                name="pendidikan_terakhir"
                                required>
                            <option value="">Pilih Pendidikan</option>
                            <option value="SD" {{ old('pendidikan_terakhir') == 'SD' ? 'selected' : '' }}>SD</option>
                            <option value="SMP" {{ old('pendidikan_terakhir') == 'SMP' ? 'selected' : '' }}>SMP</option>
                            <option value="SMA/SMK" {{ old('pendidikan_terakhir') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                            <option value="D3" {{ old('pendidikan_terakhir') == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="S1" {{ old('pendidikan_terakhir') == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('pendidikan_terakhir') == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('pendidikan_terakhir') == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                        @error('pendidikan_terakhir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Right Column - Data Perusahaan & Pilihan Pelatihan -->
                <div class="col-md-6">
                    <h3 class="section-title">Data Perusahaan</h3>

                    <div class="form-group">
                        <label class="form-label" for="nama_perusahaan">Nama Perusahaan<span class="required-mark">*</span></label>
                        <input type="text" 
                               class="form-control @error('nama_perusahaan') is-invalid @enderror" 
                               id="nama_perusahaan" 
                               name="nama_perusahaan" 
                               value="{{ old('nama_perusahaan') }}" 
                               placeholder="Masukkan nama perusahaan"
                               required>
                        @error('nama_perusahaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="jabatan">Jabatan<span class="required-mark">*</span></label>
                        <input type="text" 
                               class="form-control @error('jabatan') is-invalid @enderror" 
                               id="jabatan" 
                               name="jabatan" 
                               value="{{ old('jabatan') }}" 
                               placeholder="Masukkan jabatan"
                               required>
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="alamat_perusahaan">Alamat Perusahaan<span class="required-mark">*</span></label>
                        <textarea class="form-control @error('alamat_perusahaan') is-invalid @enderror" 
                                  id="alamat_perusahaan" 
                                  name="alamat_perusahaan" 
                                  rows="3" 
                                  placeholder="Masukkan alamat perusahaan"
                                  required>{{ old('alamat_perusahaan') }}</textarea>
                        @error('alamat_perusahaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <h3 class="section-title mt-4">Pilihan Pelatihan</h3>

                    <div class="form-group">
                        <label class="form-label" for="sertifikasi_pelatihan">Sertifikasi Pelatihan<span class="required-mark">*</span></label>
                        <select class="form-select @error('sertifikasi_pelatihan') is-invalid @enderror" 
                                id="sertifikasi_pelatihan" 
                                name="sertifikasi_pelatihan"
                                required>
                            <option value="">Pilih Sertifikasi</option>
                            @foreach($trainingTypes as $type)
                                <option value="{{ $type->type }}" {{ old('sertifikasi_pelatihan') == $type->type ? 'selected' : '' }}>
                                    {{ $type->type }}
                                </option>
                            @endforeach
                        </select>
                        @error('sertifikasi_pelatihan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="jenis_pelatihan">Jenis Pelatihan<span class="required-mark">*</span></label>
                        <select class="form-select @error('jenis_pelatihan') is-invalid @enderror" 
                                id="jenis_pelatihan" 
                                name="jenis_pelatihan"
                                required
                                disabled>
                            <option value="">Pilih Sertifikasi Pelatihan Terlebih Dahulu</option>
                        </select>
                        @error('jenis_pelatihan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="uji_kompetensi">Uji Kompetensi<span class="required-mark">*</span></label>
                        <input type="text" 
                               class="form-control @error('uji_kompetensi') is-invalid @enderror" 
                               id="uji_kompetensi" 
                               name="uji_kompetensi" 
                               value="{{ old('uji_kompetensi') }}" 
                               placeholder="Masukkan uji kompetensi yang diinginkan"
                               required>
                        @error('uji_kompetensi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit">Kirim Registrasi</button>
        </form>
    </div>
</div>

<script>
    // Data pelatihan dari server
    const trainingsData = @json($trainings);
    const trainingTypesData = @json($trainingTypes);
    
    // Create mapping: training_type_id => type name
    const typeMapping = {};
    trainingTypesData.forEach(type => {
        typeMapping[type.id] = type.type;
    });
    
    // Filter jenis pelatihan berdasarkan sertifikasi yang dipilih
    document.getElementById('sertifikasi_pelatihan').addEventListener('change', function() {
        const selectedType = this.value;
        const jenisSelect = document.getElementById('jenis_pelatihan');
        
        // Reset dropdown
        jenisSelect.innerHTML = '<option value="">Pilih Jenis Pelatihan</option>';
        
        if (selectedType) {
            // Enable dropdown
            jenisSelect.disabled = false;
            
            // Filter trainings berdasarkan training type yang dipilih
            const filteredTrainings = trainingsData.filter(training => {
                const trainingTypeName = typeMapping[training.training_type_id];
                return trainingTypeName === selectedType;
            });
            
            // Populate dropdown dengan pelatihan yang sesuai
            if (filteredTrainings.length > 0) {
                filteredTrainings.forEach(training => {
                    const option = document.createElement('option');
                    option.value = training.title;
                    option.textContent = training.title;
                    jenisSelect.appendChild(option);
                });
            } else {
                jenisSelect.innerHTML = '<option value="">Tidak ada pelatihan untuk sertifikasi ini</option>';
            }
        } else {
            // Disable dropdown jika belum pilih sertifikasi
            jenisSelect.disabled = true;
            jenisSelect.innerHTML = '<option value="">Pilih Sertifikasi Pelatihan Terlebih Dahulu</option>';
        }
    });
    
    // Auto-format phone number
    document.getElementById('no_telepon').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0 && value[0] === '0') {
            e.target.value = value;
        } else if (value.length > 0) {
            e.target.value = '0' + value;
        }
    });

    // Auto-format NIK (max 16 digits)
    document.getElementById('nik').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 16) {
            value = value.substr(0, 16);
        }
        e.target.value = value;
    });

    // Auto-format postal code (max 5 digits)
    document.getElementById('kode_pos').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 5) {
            value = value.substr(0, 5);
        }
        e.target.value = value;
    });
</script>
@endsection
