<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        .header { margin-bottom: 20px; }
        .header p { margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Penjualan Klinik Pertiwi</h2>
        <p>Periode: <?php echo date('d/m/Y', strtotime($dari)); ?> - <?php echo date('d/m/Y', strtotime($sampai)); ?></p>
        <p>Kasir: <?php echo $nama_kasir; ?></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Kasir</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($penjualan)): ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Tidak ada data penjualan.</td>
                </tr>
            <?php else: ?>
                <?php $no = 1; foreach ($penjualan as $row): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($row['tanggal'])); ?></td>
                        <td>Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['nama']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>