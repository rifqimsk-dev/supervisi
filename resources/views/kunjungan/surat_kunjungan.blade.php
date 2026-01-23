<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Kunjungan</title>
</head>
<body>
    <div style="margin-left: 30px; margin-right: 30px; font-family: 'Times New Roman', serif; font-size: 12pt; color: #000;">

        {{-- KOP SURAT --}}
        <div style="text-align: center; margin-bottom: 20px;">
            <h3 style="margin:0;">SURAT TUGAS MONITORING</h3>
            <p style="margin:0;">Nomor: 001/ST-MON/I/2026</p>
        </div>

        <p style="text-align: justify;">
            Yang bertanda tangan di bawah ini menerangkan bahwa:
        </p>

        {{-- DATA --}}
        <table width="100%" cellpadding="5" cellspacing="0">
            <tr>
                <td valign="top" width="35%">Nama</td>
                <td valign="top" width="1%">:</td>
                <td valign="top">{{ $kunjungan->user->name }}</td>
            </tr>
            <tr>
                <td valign="top">Departemen</td>
                <td valign="top">:</td>
                <td valign="top">{{ $kunjungan->user->departemen->name ?? '-' }}</td>
            </tr>
            <tr>
                <td valign="top">Jabatan</td>
                <td valign="top">:</td>
                <td valign="top">{{ $kunjungan->user->jabatan }}</td>
            </tr>
            <tr>
                <td valign="top">Dealer</td>
                <td valign="top">:</td>
                <td valign="top">
                    {{ $kunjungan->dealer->dealer_name }}<br>
                    <small>{{ $kunjungan->alamat }}</small>
                </td>
            </tr>
            <tr>
                <td valign="top">Tujuan</td>
                <td valign="top">:</td>
                <td valign="top">{{ $kunjungan->tujuan }}</td>
            </tr>
            <tr>
                <td valign="top">Inventaris yang digunakan</td>
                <td valign="top">:</td>
                <td valign="top">{{ $kunjungan->inventaris->name }}</td>
            </tr>
            <tr>
                <td valign="top">Tanggal</td>
                <td valign="top">:</td>
                <td valign="top">
                    {{ \Carbon\Carbon::parse($kunjungan->tanggal)
                        ->locale('id')
                        ->translatedFormat('l, d F Y') }}
                </td>
            </tr>
        </table>

        {{-- PARAGRAF --}}
        <p style="text-align: justify; margin-top: 20px;">
            Surat ini dibuat sebagai bukti pelaksanaan kegiatan monitoring dealer
            sesuai dengan tugas dan tanggung jawab yang telah diberikan.
            Demikian surat ini dibuat untuk dipergunakan sebagaimana mestinya.
        </p>

        {{-- TANDA TANGAN --}}
        <div style="width: 250px; float: right; text-align: left; margin-top: 40px;">
            <p style="margin: 0; padding: 0;">Pandeglang, {{ now()->locale('id')->translatedFormat('d F Y') }}</p>
            <p style="margin: 0; padding: 0;">Kepala Departemen {{ $kunjungan->user->departemen->name }}</p>
            <p style="margin-top: 80px; font-weight: bold;">
                {{ $kadep->name ?? '..................................' }}
            </p>
        </div>

    </div>
</body>
</html>