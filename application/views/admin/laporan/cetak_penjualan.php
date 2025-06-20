<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Laporan Penjualan</title>
  <style>
    body { font-family: Arial, sans-serif; font-size: 12pt; }
    .container { width: 100%; margin: 0 auto; }
    .header { text-align: center; margin-bottom: 20px; }
    .header h1 { margin: 0; font-size: 16pt; }
    .header p { margin: 5px 0; font-size: 12pt; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    table, th, td { border: 1px solid #000; }
    th, td { padding: 8px; text-align: left; font-size: 11pt; }
    th { background-color: #f2f2f2; }
    .text-right { text-align: right; }
    .total { font-weight: bold; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Laporan Penjualan</h1>
      <p>Klinik Pertiwi</p>
      <p>Periode: <?php echo date('d/m/Y', strtotime($dari)); ?> - <?php echo date('d/m/Y', strtotime($sampai)); ?></p>
    </div>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Total Harga</th>
          <th>Nama Kasir</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; $total = 0; foreach ($penjualan as $item): ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo date('d/m/Y H:i', strtotime($item['tanggal'])); ?></td>
          <td>Rp <?php echo number_format($item['total_harga'], 0, ',', '.'); ?></td>
          <td><?php echo $item['nama_user'] ?: '-'; ?></td>
        </tr>
        <?php $total += $item['total_harga']; ?>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2" class="text-right total">Total</td>
          <td class="total">Rp <?php echo number_format($total, 0, ',', '.'); ?></td>
          <td></td>
        </tr>
      </tfoot>
    </table>
  </div>
</body>
</html>