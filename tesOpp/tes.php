<!-- muhamad reikhan efendi
22090090
4c -->

<?php
class Book {
    private $judul;
    private $tahun;
    private $jumlahHalaman;
    private $bahanMaterial;
    private $diskon;

    public function __construct($judul, $tahun, $jumlahHalaman, $bahanMaterial, $diskon) {
        $this->judul = $judul;
        $this->tahun = $tahun;
        $this->jumlahHalaman = $jumlahHalaman;
        $this->bahanMaterial = $bahanMaterial;
        $this->diskon = $diskon;
    }

    public function getJudul() {
        return $this->judul;
    }

    public function getTahun() {
        return $this->tahun;
    }

    public function getJumlahHalaman() {
        return $this->jumlahHalaman;
    }

    public function getBahanMaterial() {
        return $this->bahanMaterial;
    }

    public function getDiskon() {
        return $this->diskon;
    }

    //  diskon
    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }


    public function checkPrice() {
        $usiaBuku = date('Y') - $this->tahun;

        if ($usiaBuku <= 5) {
            if ($this->jumlahHalaman <= 100) {
                return 100000;
            } elseif ($this->jumlahHalaman > 500) {
                return 500000;
            } else {
                return 300000;
            }
        } elseif ($usiaBuku > 5 && $usiaBuku <= 10) {
            if ($this->jumlahHalaman <= 100) {
                return 50000;
            } elseif ($this->jumlahHalaman > 500) {
                return 250000;
            } else {
                return 150000;
            }
        } else {
            return 10000;
        }
    }
}

class Comic extends Book {
    private $isColorful;

    private function __construct($judul, $tahun, $jumlahHalaman, $bahanMaterial, $diskon, $isColorful) {
        parent::__construct($judul, $tahun, $jumlahHalaman, $bahanMaterial, $diskon);
        $this->isColorful = $isColorful;
    }

    public static function createComic($judul, $tahun, $jumlahHalaman, $bahanMaterial, $diskon, $isColorful) {
        return new Comic($judul, $tahun, $jumlahHalaman, $bahanMaterial, $diskon, $isColorful);
    }

    public function getIsColorful() {
        return $this->isColorful;
    }
}

// Objek buku
$book = new Book("Calculus", 2024, 1000, "Kertas", 0);
echo "Judul Buku: " . $book->getJudul() . "<br>";

// Objek komik
$comic = Comic::createComic("One Piece", 1998, 500, "Kertas", 0, true);
echo "Judul Komik: " . $comic->getJudul() . "<br>";

