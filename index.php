<?php

$produk = [
    [
        "nama" => "ASUS Vivobook 14 Touch",
        "kategori" => "Laptop",
        "harga" => 15000000,
        "stok" => 5
    ],
    [
        "nama" => "Iphone 15",
        "kategori" => "Smartphone",
        "harga" => 13500000,
        "stok" => 3
    ],
    [
        "nama" => "Infinix Note 40 Pro",
        "kategori" => "Smartphone",
        "harga" => 2800000,
        "stok" => 0
    ],
    [
        "nama" => "Logitech Pebble Mouse 2",
        "kategori" => "Aksesoris",
        "harga" => 300000,
        "stok" => 10
    ],
    [
        "nama" => "Anker PowerBank 10000mah",
        "kategori" => "Aksesoris",
        "harga" => 1400000,
        "stok" => 4
    ],
    [
        "nama" => "AirPods Pro Gen 2",
        "kategori" => "Headphone",
        "harga" => 3800000,
        "stok" => 2
    ]
];

$jumlahProduk = count($produk);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Key Store</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- NAVBAR -->
    <header>
        <nav>

            <div class="logo">
                Key Store
            </div>

            <div class="nav-menu">
                <a href="#">Home</a>
                <a href="#produk">Produk</a>
            </div>

        </nav>
    </header>


    <!-- HERO -->
    <section class="hero">

        <h1>
            Selamat Datang di Key Store
        </h1>

        <p>
            Temukan berbagai perangkat dan aksesoris teknologi pilihan.
        </p>

    </section>


    <!-- INFORMASI JUMLAH PRODUK -->
    <section class="info">

        <div class="info-box">

            <h2>
                <?php echo $jumlahProduk; ?>
            </h2>

            <p>
                Produk Tersedia di Katalog
            </p>

        </div>

    </section>


    <!-- KATALOG PRODUK -->
    <main class="container" id="produk">

        <div class="product-grid">

            <?php foreach ($produk as $item): ?>

                <?php

                // Percabangan untuk menentukan status stok
                if ($item["stok"] > 0) {

                    $status = "Tersedia";
                    $statusClass = "available";

                } else {

                    $status = "Stok Habis";
                    $statusClass = "empty";

                }


                // Percabangan untuk menentukan diskon
                if ($item["harga"] >= 1000000) {

                    $diskon = 10;

                    $hargaDiskon = $item["harga"] * $diskon / 100;

                    $hargaAkhir = $item["harga"] - $hargaDiskon;

                } else {

                    $diskon = 0;

                    $hargaAkhir = $item["harga"];

                }

                ?>


                <!-- CARD PRODUK -->
                <article class="product-card">

                    <h3>
                        <?php echo $item["nama"]; ?>
                    </h3>

                    <p class="category">
                        <?php echo $item["kategori"]; ?>
                    </p>


                    <!-- HARGA -->
                    <?php if ($diskon > 0): ?>

                        <p class="normal-price">
                            Rp
                            <?php echo number_format($item["harga"], 0, ',', '.'); ?>
                        </p>

                        <p class="discount">
                            Diskon <?php echo $diskon; ?>%
                        </p>

                        <p class="final-price">
                            Rp
                            <?php echo number_format($hargaAkhir, 0, ',', '.'); ?>
                        </p>

                    <?php else: ?>

                        <p class="price">
                            Rp
                            <?php echo number_format($hargaAkhir, 0, ',', '.'); ?>
                        </p>

                    <?php endif; ?>


                    <!-- STATUS STOK -->
                    <p class="stock <?php echo $statusClass; ?>">

                        <?php echo $status; ?>

                        <?php if ($item["stok"] > 0): ?>

                            (<?php echo $item["stok"]; ?> stok)

                        <?php endif; ?>

                    </p>


                    <!-- TOMBOL BELI -->
                    <?php if ($item["stok"] > 0): ?>

                        <a href="#" class="buy-button">
                            Beli Sekarang
                        </a>

                    <?php else: ?>

                        <div class="disabled-button">
                            Tidak Tersedia
                        </div>

                    <?php endif; ?>

                </article>

            <?php endforeach; ?>

        </div>

    </main>


    <!-- FOOTER -->
    <footer>

        <p>
            &copy; 2026 Key Store. All Rights Reserved.
        </p>

    </footer>

</body>

</html>