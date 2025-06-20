<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Nota Transaksi</title>
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
      <h1>Nota Transaksi</h1>
      <p>Klinik Pertiwi</p>
      <p>ID Transaksi: <?php echo $transaksi['id_transaksi']; ?></p>
      <p>Tanggal: <?php echo date('d/m/Y H:i', strtotime($transaksi['tanggal'])); ?></p>
      <p>Kasir: <?php echo $transaksi['nama_user']; ?></p>
    </div>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Obat</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($detail as $item): ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $item['nama_obat']; ?></td>
          <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
          <td><?php echo $item['jumlah']; ?></td>
          <td>Rp <?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4" class="text-right total">Total</td>
          <td class="total">Rp <?php echo number_format($transaksi['total_harga'], 0, ',', '.'); ?></td>
        </tr>
      </tfoot>
    </table>
  </div>
</body>
</html>