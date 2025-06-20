<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Laporan Stok Menipis</title>
  <style>
    body { font-family: Arial, sans-serif; font-size: 12px; }
    .container { width: 100%; margin: 0 auto; }
    .header { text-align: center; margin-bottom: 20px; }
    .header h1 { margin: 0; font-size: 18px; }
    .header p { margin: 5px 0; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border: 1px solid #000; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
    .text-right { text-align: right; }
    .text-center { text-align: center; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Laporan Stok Menipis</h1>
      <p>Klinik Sehat</p>
      <p>Tanggal Cetak: <?php echo date('d/m/Y'); ?></p>
    </div>
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
          <td class="text-center"><?php echo $no++; ?></td>
          <td><?php echo $item['nama_obat']; ?></td>
          <td><?php echo $item['nama_kategori']; ?></td>
          <td><?php echo $item['nama_jenis']; ?></td>
          <td class="text-center"><?php echo $item['stok']; ?></td>
          <td class="text-right"><?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>