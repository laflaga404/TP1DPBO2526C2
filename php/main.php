<?php
require_once 'Bioskop.php';
session_start();

// LIST OF OBJECT (disimpan di session, bukan database)
if (!isset($_SESSION['daftar_film'])) {
    $_SESSION['daftar_film'] = [];
}

$pesan = "";

// Folder upload poster (path file lokal)
$upload_dir = __DIR__ . '/uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

function cariFilmById($id) {
    foreach ($_SESSION['daftar_film'] as $film) {
        if ($film->getId() == $id) {
            return $film;
        }
    }
    return null;
}

// ==== TAMBAH / UPDATE DATA ====
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aksi']) && $_POST['aksi'] === 'simpan') {

    $id = (int) $_POST['id'];
    $judul = trim($_POST['judul']);
    $genre = trim($_POST['genre']);
    $durasi = (int) $_POST['durasi'];
    $harga = (int) $_POST['harga'];
    $sutradara = trim($_POST['sutradara']);
    $mode = $_POST['mode']; // "tambah" atau "update"

    // Handle upload poster -> simpan sebagai path file lokal
    $poster_path = null;
    if (isset($_FILES['poster']) && $_FILES['poster']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION);
        $nama_file = 'poster_' . $id . '_' . time() . '.' . $ext;
        $target = $upload_dir . $nama_file;
        if (move_uploaded_file($_FILES['poster']['tmp_name'], $target)) {
            $poster_path = 'uploads/' . $nama_file;
        }
    }

    if ($mode === 'tambah') {

        // Cek ID agar unik
        $filmLama = cariFilmById($id);
        if ($filmLama !== null) {
            $pesan = "ID udah kepake itu!";
        } else {
            $film_baru = new Film(
                $id,
                $poster_path ?? '',
                $judul,
                $genre,
                $durasi,
                $harga,
                $sutradara
            );
            $_SESSION['daftar_film'][] = $film_baru;
            $pesan = "Data film baru berhasil ditambahkan!";
        }

    } elseif ($mode === 'update') {

        $film = cariFilmById($id);
        if ($film !== null) {
            $film->setJudul($judul);
            $film->setGenre($genre);
            $film->setDurasi($durasi);
            $film->setHarga($harga);
            $film->setSutradara($sutradara);
            if ($poster_path !== null) {
                $film->setPoster($poster_path);
            }
            $pesan = "Data film berhasil diupdate!";
        } else {
            $pesan = "Film tidak ditemukan.";
        }
    }
}

// ==== HAPUS DATA ====
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    foreach ($_SESSION['daftar_film'] as $index => $film) {
        if ($film->getId() == $id) {
            unset($_SESSION['daftar_film'][$index]);
            $_SESSION['daftar_film'] = array_values($_SESSION['daftar_film']);
            $pesan = "Data film berhasil dihapus!";
            break;
        }
    }
}

// ==== AMBIL DATA UNTUK MODE EDIT ====
$film_edit = null;
if (isset($_GET['edit'])) {
    $film_edit = cariFilmById((int) $_GET['edit']);
}

// ==== CARI DATA ====
$keyword = isset($_GET['cari']) ? trim($_GET['cari']) : "";
$hasil_cari = $_SESSION['daftar_film'];
if ($keyword !== "") {
    $hasil_cari = array_filter($_SESSION['daftar_film'], function ($film) use ($keyword) {
        return stripos($film->getJudul(), $keyword) !== false
            || (string) $film->getId() === $keyword;
    });
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tel Aviv XXI - Manajemen Film Bioskop</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f4; }
        h1 { text-align: center; }
        .container { max-width: 900px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; }
        form { margin-bottom: 20px; }
        label { display: inline-block; width: 120px; }
        input[type=text], input[type=number], input[type=file] { width: 250px; padding: 4px; margin-bottom: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #333; color: #fff; }
        img.poster { max-width: 80px; max-height: 100px; }
        .pesan { background: #d4edda; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        .aksi a { margin-right: 8px; text-decoration: none; }
        .search-box { margin-bottom: 15px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Tel Aviv XXI</h1>

    <?php if ($pesan): ?>
        <div class="pesan"><?= htmlspecialchars($pesan) ?></div>
    <?php endif; ?>

    <h2><?= $film_edit ? "Update Data Film" : "Tambah Data Film" ?></h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="aksi" value="simpan">
        <input type="hidden" name="mode" value="<?= $film_edit ? 'update' : 'tambah' ?>">

        <div>
            <label>ID Film</label>
            <input type="number" name="id" value="<?= $film_edit ? $film_edit->getId() : '' ?>" <?= $film_edit ? 'readonly' : '' ?> required>
        </div>
        <div>
            <label>Judul</label>
            <input type="text" name="judul" value="<?= $film_edit ? htmlspecialchars($film_edit->getJudul()) : '' ?>" required>
        </div>
        <div>
            <label>Genre</label>
            <input type="text" name="genre" value="<?= $film_edit ? htmlspecialchars($film_edit->getGenre()) : '' ?>" required>
        </div>
        <div>
            <label>Durasi (menit)</label>
            <input type="number" name="durasi" value="<?= $film_edit ? $film_edit->getDurasi() : '' ?>" required>
        </div>
        <div>
            <label>Harga</label>
            <input type="number" name="harga" value="<?= $film_edit ? $film_edit->getHarga() : '' ?>" required>
        </div>
        <div>
            <label>Sutradara</label>
            <input type="text" name="sutradara" value="<?= $film_edit ? htmlspecialchars($film_edit->getSutradara()) : '' ?>" required>
        </div>
        <div>
            <label>Poster</label>
            <input type="file" name="poster" accept="image/*" <?= $film_edit ? '' : 'required' ?>>
        </div>

        <button type="submit"><?= $film_edit ? "Update" : "Tambah" ?></button>
        <?php if ($film_edit): ?>
            <a href="main.php">Batal</a>
        <?php endif; ?>
    </form>

    <h2>Cari Data Film</h2>
    <form method="GET" class="search-box">
        <input type="text" name="cari" placeholder="Cari berdasarkan ID atau Judul..." value="<?= htmlspecialchars($keyword) ?>">
        <button type="submit">Cari</button>
        <a href="main.php">Reset</a>
    </form>

    <h2>Daftar Film</h2>
    <?php if (empty($hasil_cari)): ?>
        <p>Belum ada data film.</p>
    <?php else: ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Poster</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Durasi</th>
            <th>Harga</th>
            <th>Sutradara</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($hasil_cari as $film): ?>
        <tr>
            <td><?= $film->getId() ?></td>
            <td>
                <?php if ($film->getPoster()): ?>
                    <img class="poster" src="<?= htmlspecialchars($film->getPoster()) ?>" alt="poster">
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($film->getJudul()) ?></td>
            <td><?= htmlspecialchars($film->getGenre()) ?></td>
            <td><?= $film->getDurasi() ?> menit</td>
            <td><?= $film->getHarga() ?></td>
            <td><?= htmlspecialchars($film->getSutradara()) ?></td>
            <td class="aksi">
                <a href="?edit=<?= $film->getId() ?>">Edit</a>
                <a href="?hapus=<?= $film->getId() ?>" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>
</body>
</html>

