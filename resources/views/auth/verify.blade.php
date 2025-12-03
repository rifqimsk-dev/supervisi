<!DOCTYPE html>
<html
    lang="en"
    dir="ltr"
    data-bs-theme="light"
    data-color-theme="Blue_Theme"
    data-layout="vertical"
>
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Favicon icon-->
        <link
            rel="shortcut icon"
            type="image/png"
            href="{{ asset('assets/images/logos/logo.png') }}"
        />

        <!-- Core Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

        <title>Verifikasi</title>
    </head>

    <body>
        <div id="main-wrapper" class="auth-customizer-none">
            <div
                class="position-relative overflow-hidden radial-gradient min-vh-100 w-100"
            >
                <div class="position-relative z-index-5">
                    <div class="row">
                        <div class="col-xl-5 col-xxl-4">
                            <div
                                class="authentication-login min-vh-100 bg-body row justify-content-center"
                            >
                                <div class="col-12">
                                    <a
                                        href="{{ url('/') }}"
                                        class="text-nowrap logo-img d-flex align-items-center gap-2 px-4 py-9 w-100"
                                    >
                                        <b class="logo-icon">
                                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                            <!-- Light Logo icon -->
                                            <img
                                                src="{{ asset('assets/images/logos/kemakmuran.webp') }}"
                                                alt="homepage"
                                                width="60%"
                                            />
                                        </b>
                                        <!--End Logo icon -->
                                    </a>
                                </div>
                                <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                                    <div class="mb-5">
                                        <h3 class="fw-bolder fs-7 mb-3">Verifikasi Kode OTP</h3>
                                        @error('failed')
                                        <div
                                            id="global-error" 
                                            class="alert customize-alert alert-dismissible rounded-1 alert-light-danger bg-danger-subtle text-danger fade show remove-close-icon"
                                            role="alert"
                                        >
                                            <div class="d-flex align-items-center me-3 me-md-0">
                                                <i class="ti ti-info-circle fs-5 me-2 text-danger"></i>
                                                    <small class="text-danger">{{ $message }}</small>
                                                </div>
                                        </div>
                                        @enderror
                                        <p>
                                            @php
                                                function maskEmailCommon($email) {
                                                    $parts = explode('@', $email);
                                                    $name = $parts[0];
                                                    $domain = $parts[1];

                                                    // Ambil huruf pertama
                                                    $first = substr($name, 0, 1);

                                                    // Sisa username diganti bintang
                                                    $maskedName = $first . str_repeat('*', max(strlen($name) - 1, 1));

                                                    return $maskedName . '@' . $domain;
                                                }
                                            @endphp

                                            Kode OTP Anda telah dikirim ke alamat email <span class="fw-bolder">{{ maskEmailCommon(session('otp_email')) }}</span>. Silakan cek inbox atau spam untuk melanjutkan proses verifikasi.
                                        </p>
                                    </div>
                                    <form action="{{ route('verify.process') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label fw-semibold"
                                                >Masukkan 6 digit angka</label
                                            >
                                            <div class="d-flex align-items-center gap-2 gap-sm-3">
                                                <input type="text" class="form-control form-control-lg otp-input text-center" maxlength="1" style="border: 1px solid #d0d0d0" autofocus placeholder="" />
                                                <input type="text" class="form-control form-control-lg otp-input text-center" maxlength="1" style="border: 1px solid #d0d0d0" placeholder="" />
                                                <input type="text" class="form-control form-control-lg otp-input text-center" maxlength="1" style="border: 1px solid #d0d0d0" placeholder="" />
                                                <input type="text" class="form-control form-control-lg otp-input text-center" maxlength="1" style="border: 1px solid #d0d0d0" placeholder="" />
                                                <input type="text" class="form-control form-control-lg otp-input text-center" maxlength="1" style="border: 1px solid #d0d0d0" placeholder="" />
                                                <input type="text" class="form-control form-control-lg otp-input text-center" maxlength="1" style="border: 1px solid #d0d0d0" placeholder="" />
                                            </div>
                                            <input type="hidden" name="otp" id="otp-full">
                                        </div>
                                        <button class="btn btn-danger w-100 py-8 mb-4">Verifikasi</button>
                                        <div class="d-flex align-items-center">
                                            <p class="fs-4 mb-0 text-dark">Tidak menerima kode?</p>
                                            <a class="text-danger fw-medium ms-2" href="javascript:void(0)"
                                                >Kirim ulang</a
                                            >
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-7 col-xxl-8 d-none d-xl-block">
                            <div
                                class="d-none d-xl-flex align-items-center justify-content-center h-100"
                            >
                                <img
                                    src="{{ asset('assets/images/backgrounds/user-login.png') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
        <!-- Import Js Files -->
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
        <script src="{{ asset('assets/js/theme/theme.js') }}"></script>
        <script src="{{ asset('assets/js/theme/app.min.js') }}"></script>
        <script src="{{ asset('assets/js/theme/feather.min.js') }}"></script>

        <!-- solar icons -->
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

        <script>
            const inputs = document.querySelectorAll('.otp-input');
            const fullOtp = document.getElementById('otp-full');

            inputs.forEach((input, index) => {
                input.addEventListener('input', () => {
                    input.value = input.value.replace(/[^0-9]/g, '');

                    if (input.value && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }

                    fullOtp.value = [...inputs].map(i => i.value).join('');
                });

                input.addEventListener('paste', (e) => {
                    const pasteData = e.clipboardData.getData('text').trim();
                    if (pasteData.length === inputs.length) {
                        pasteData.split('').forEach((char, i) => inputs[i].value = char);
                    }
                    fullOtp.value = pasteData;
                    e.preventDefault();
                });
            });
            </script>

    </body>
</html>
