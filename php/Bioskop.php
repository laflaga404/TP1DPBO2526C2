<?php

class Film {
    private $id;
    private $poster;
    private $judul;
    private $genre;
    private $durasi;
    private $harga;
    private $sutradara;

    // Constructor
    public function __construct($id, $poster, $judul, $genre, $durasi, $harga, $sutradara) {
        $this->id = (int) $id;
        $this->poster = (string) $poster;
        $this->judul = (string) $judul;
        $this->genre = (string) $genre;
        $this->durasi = (int) $durasi;
        $this->harga = (int) $harga;
        $this->sutradara = (string) $sutradara;
    }

    // ---- Getter ----
    public function getId() { return $this->id; }
    public function getPoster() { return $this->poster; }
    public function getJudul() { return $this->judul; }
    public function getGenre() { return $this->genre; }
    public function getDurasi() { return $this->durasi; }
    public function getHarga() { return $this->harga; }
    public function getSutradara() { return $this->sutradara; }

    // ---- Setter ----
    public function setId($id) { $this->id = (int) $id; }
    public function setPoster($poster) { $this->poster = (string) $poster; }
    public function setJudul($judul) { $this->judul = (string) $judul; }
    public function setGenre($genre) { $this->genre = (string) $genre; }
    public function setDurasi($durasi) { $this->durasi = (int) $durasi; }
    public function setHarga($harga) { $this->harga = (int) $harga; }
    public function setSutradara($sutradara) { $this->sutradara = (string) $sutradara; }
}

