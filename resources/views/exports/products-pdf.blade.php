<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Produk</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color: #BDD7EE;
        }
        h2, h4 {
            text-align: center;
            margin: 0;
        }
        .header {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>PT. RuangJiwa</h2>
        <h4>Laporan Data Produk</h4>
        <h4>Periode November 2025</h4>
        <br>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Satuan</th>
                <th>Tipe</th>
                <th>Kuantitas</th>
                <th>Produsen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->product_name }}</td>
                    <td>{{ $p->unit }}</td>
                    <td>{{ $p->type }}</td>
                    <td>{{ $p->qty }}</td>
                    <td>{{ $p->producer }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
