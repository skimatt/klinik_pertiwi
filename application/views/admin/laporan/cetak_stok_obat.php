<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laporan Stok Obat</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Stok Obat</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Jenis</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($obat as $item): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $item['nama_obat']; ?></td>
                <td><?php echo $item['nama_kategori']; ?></td>
                <td><?php echo $item['nama_jenis']; ?></td>
                <td><?php echo $item['stok']; ?></td>
                <td><?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>