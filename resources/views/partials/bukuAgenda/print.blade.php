<!doctype html>
<html lang="en">

<head>
    <title>Sip Arsip - Buku Agenda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
    body {
        font-family: sans-serif
    }

    .mt-3 {
        margin-top: 3rem
    }

    .cwd {
        width: 90%;
        margin: 0 auto
    }

    .te {
        font-weight: 600;
        color: #000;
    }

    .pa {
        margin-top: .5rem;
        margin-bottom: .5rem
    }

    .justify-content-center {
        justify-content: center;
        display: flex
    }

    table {
        border-collapse: collapse
    }

    .table {
        margin-bottom: 1rem;
        box-shadow: 0 0 15px rgba(0, 0, 0, .281);
        color: #212529;
        width: auto;
        background: #fff
    }

    .table td,
    .table th {
        padding: .75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6
    }

    .table tbody+tbody {
        border-top: 2px solid #dee2e6
    }

    .table thead.thead-primary {
        background: #3d73f0
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        border: none;
        padding: 10px 20px;
        font-size: 14px;
        color: #fff
    }

    .table tbody tr {
        margin-bottom: 10px
    }

    .table tbody td,
    .table tbody th {
        border: none;
        padding: 10px 20px;
        text-align: center;
        border-bottom: 3px solid #f8f9fd;
        font-size: 12px
    }
</style>

<body>
    <section class="mt-3">
        <div class="cwd">
            <div class="row justify-content-center">
                <h2>Sip Arsip - Buku Agenda</h2>
            </div>
            <h4>Rekapan Data Buku Agenda</h4>
            <div class="pa">Tanggal : {{-- strftime('%d%B%Y',strtotime($tanggalAwal)) -
                {{ strftime('%d %B %Y', strtotime($tanggalAkhir)) }} --}}</div>
            <table class="table">
                <thead class="thead-primary">
                    <tr>
                        <th>#</th>
                        <th>Asal Surat</th>
                        <th>Tujuan Surat</th>
                        <th>Jenis Surat</th>
                        <th>Tanggal Simpan</th>
                        <th>Tanggal Input</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datasm as $index => $d)
                        <tr>
                            <th scope="row">#</th>
                            <td>{{ $d->nama_pengirim }}</td>
                            <td>{{ $d->nama_penerima }}</td>
                            <td>Surat Masuk</td>
                            <td>{{ date('d/m/Y', strtotime($d->tanggal_terima)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($d->created_at)) }}</td>
                        </tr>
                    @endforeach
                    @foreach ($datask as $index => $d)
                        <tr>
                            <th scope="row">#</th>
                            <td>{{ $d->nama_pengirim }}</td>
                            <td>{{ $d->nama_penerima }}</td>
                            <td>Surat Keluar</td>
                            <td>{{ date('d/m/Y', strtotime($d->tanggal_terima)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($d->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
