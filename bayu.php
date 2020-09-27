<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KreditMotor</title>
  <style>
    /* Bayutrich-TIS 19.2 */
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background: #34495e;
      text-align: center;
    }

    div {
      /*seting letak margin*/
      display: inline-block;
      margin: 100px auto;
    }

    .box1 {
      /*membuat kotak hitam*/
      background: black;
      text-align: center;
      width: 450px;
      height: 485px;
      overflow: auto;
      border-radius: 24px;
    }

    .box2 {
      background: black;
      text-align: center;
      width: 450px;
      height: 485px;
      overflow: auto;
      border-radius: 24px;
      margin-left: 20px;
    }

    table {
      background-color: black;
      padding: 20px;
      width: 400px;
      border-radius: 20px;
      color: white;
    }

    table input[type="text"] {
      /*style inputan*/
      border: 0;
      background: none;
      display: block;
      margin: 10px auto;
      text-align: center;
      border: 2px solid #3498db;
      padding: 8px 5px;
      width: 160px;
      outline: none;
      color: white;
      border-radius: 24px;
      transition: 0.50s;
    }

    table input[type="text"]:focus,
    table input[type="text"]:hover {
      width: 170px;
      border-color: #2ecc71;
    }

    table input[type="submit"] {
      border: 0;
      background: none;
      display: block;
      margin: 10px auto;
      text-align: center;
      border: 2px solid #2ecc71;
      padding: 8px 5px;
      width: 130px;
      outline: none;
      color: white;
      border-radius: 24px;
      transition: 0.50s;
      cursor: pointer;
    }

    table input[type="submit"]:hover,
    table input[type="submit"]:focus {
      background: #2ecc71;
      font-weight: bold;
      color: black;
    }

    table input[type="reset"] {
      border: 0;
      background: none;
      color: white;
      cursor: pointer;
      text-align: center;
      outline: none;
    }

    table input[type="reset"]:hover,
    table input[type="reset"]:focus {
      font-weight: bold;
      font-size: 14px;
      color: red;
    }

    table select {
      border: 0;
      background: none;
      display: block;
      margin: 10px auto;
      text-align: center;
      font-weight: bold;
      border: 2px solid #3498db;
      padding: 9px 36px;
      width: 175px;
      outline: none;
      color: #3498db;
      border-radius: 24px;
      transition: 0.50s;
      cursor: pointer;
    }

    table select:focus,
    table select:hover {
      width: 185px;
      border-color: #2ecc71;
    }

    a:link,
    a:visited {
      color: white;
      text-decoration: none;
    }

    a:hover,
    a:focus {
      font-size: 16px;
      color: lightgreen;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="box1">
    <form action="bayu.php" method="post">
      <table align="center">
        <tr>
          <th colspan="3">
            <h3>Form Kredit Motor </h3>
          </th>
        </tr>
        <tr>
          <td><b>Nama Debitur </b></td>
          <td>:</td>
          <td><input type="text" name="debitur" placeholder="Nama Debitur" autofocus autocomplete="off" required></td>
        </tr>
        <tr>
          <td><b>Jenis Motor </b></td>
          <td>:</td>
          <td><select name="jenismtr" class="form-control">
              <option>Jenis Motor</option>
              <option value="Mega Pro">Mega Pro</option>
              <option value="CBR 150">CBR 150</option>
              <option value="R25">R25</option>
              <option value="Ninja">Ninja</option>
              <option value="Vixion">Vixion</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><b> Lama Angsuran </b></td>
          <td>:</td>
          <td><input type="text" name="lmangsuran" placeholder="Lama Angsuran" autocomplete="off" required></td>
        </tr>
        <tr>
          <td><b> Bunga (%) </b></td>
          <td>:</td>
          <td><input type="text" name="bunga" placeholder="Bunga %" autocomplete="off" required></td>
        </tr>
        <tr>
          <td><b> Administrasi </b></td>
          <td>:</td>
          <td><input type="text" name="administrasi" placeholder="Biaya Administrasi" autocomplete="off" required></td>
        </tr>
        <tr>
          <td colspan="3"><input type="submit" class="button" value=" Proses Hitung " name="submit">
            <input type="reset" class="button" value="Batal"> </td>
        </tr>
      </table>
    </form>
  </div>
  <?php
  error_reporting(0);
  if (isset($_POST['submit'])) {
    $debitur = $_POST['debitur'];
    $jenismtr = $_POST['jenismtr'];
    $bunga = $_POST['bunga'];
    $lmangsuran = $_POST['lmangsuran'];
    $administrasi = $_POST['administrasi'];

    if ($jenismtr == 'Mega Pro') {
      $harga = 25000000;
      $motor = "Mega Pro";
    } elseif ($jenismtr == 'CBR 150') {
      $harga = 30000000;
      $motor = "CBR 150";
    } elseif ($jenismtr == 'R25') {
      $harga = 35000000;
      $motor = "R25";
    } elseif ($jenismtr == 'Ninja') {
      $harga = 50000000;
      $motor = "Ninja";
    } elseif ($jenismtr == 'Vixion') {
      $harga = 27000000;
      $motor = "Vixion";
    } else {
      $harga = 0;
      $motor = "Tidak ada pilihan";
    }

    $hrgkredit = $harga + ($harga * ($bunga / 12 / 100) * $lmangsuran);
    $angsuran  = $hrgkredit / $lmangsuran;
    $angsuran1 = $angsuran + $administrasi;
    //---- Mengatur Format Nomor Faktur ----
    $nofaktur = substr($debitur, -5) . date('dmY');
    //---- Menambahkan Variabel Bonus ----
    if ($lmangsuran < 12) {
      $bonus = "Kipas Angin 17inc";
    } elseif ($lmangsuran > 12 && $lmangsuran <= 24) {
      $bonus = "Setrika";
    } else {
      $bonus = "Tidak ada Bonus";
    }
    //=============================================================
    if ($debitur == '' || $jenismtr == '' || $bunga == '' || $lmangsuran == '' || $administrasi == '') {
  ?><script language="javascript">
        alert('Data gagal proses? data ada yang kosong')
      </script><?php
                ?><script language="javascript">
        document.location.href = "bayu.php"
      </script><?php
              }
              $tanggal = date('dmY');
                ?>

    <div class="box2">
      <table align="center">
        <tr>
          <th colspan="3">
            <h3>RINCIAN BIAYA PEMBELIAN / KREDIT MOTOR</h3>
          </th>
        </tr>
        <tr>
          <td><strong>No Faktur </strong></td>
          <td>:</td>
          <td><input type="text" value="<?php echo $nofaktur; ?>" /></td>
        </tr>
        <tr>
          <td><b>Nama Debitur </b></td>
          <td>:</td>
          <td><input type="text" value="<?php echo $debitur; ?>" /></td>
        </tr>
        <tr>
          <td><b>Jenis Motor </b></td>
          <td>:</td>
          <td><input type="text" value="<?php echo $jenismtr; ?>" />
          </td>
        </tr>
        <tr>
          <td><b> Lama Angsuran </b></td>
          <td>:</td>
          <td><input type="text" value="<?php echo $lmangsuran; ?>" /></td>
        </tr>
        <tr>
          <td><b> Bunga (%) </b></td>
          <td>:</td>
          <td><input type="text" value="<?php echo $bunga; ?>" /></td>
        </tr>
        <tr>
          <td><b> Administrasi </b></td>
          <td>:</td>
          <td><input type="text" value="<?php echo $administrasi; ?>" /></td>
        </tr>
        <tr>
          <td><b> Harga Motor </b></td>
          <td>:</td>
          <td><input type="text" value="<?php echo $harga; ?>" /></td>
        </tr>
        <tr>
          <td><b> Harga Kredit </b></td>
          <td>:</td>
          <td><input type="text" value="<?php echo $hrgkredit; ?>" /></td>
        </tr>
        <tr>
          <td><b> Angsuran </b></td>
          <td>:</td>
          <td><input type="text" value="<?php echo $angsuran; ?>" /></td>
        </tr>
        <tr>
          <td><b> Angsuran Pertama </b></td>
          <td>:</td>
          <td><input type="text" value="<?php echo $angsuran1; ?>" /></td>
        </tr>
        <tr>
          <td><b> Bonus </b></td>
          <td>:</td>
          <td><input type="text" value="<?php echo $bonus; ?>" /></td>
        </tr>
        <tr>
          <td colspan="3">
            <a href="bayu.php">Bersihkan</a>
          </td>
        </tr>
      </table>
    <?php
  }
    ?>
    </div>
</body>

</html>