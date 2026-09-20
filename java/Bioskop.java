class Film {
    private int id;
    private String poster;
    private String judul;
    private String genre;
    private int durasi;
    private int harga;
    private String sutradara;


    // constructor
    public Film(int id, String poster, String judul, String genre, int durasi, int harga, String sutradara) {
        this.id = id;
        this.poster = poster;
        this.judul = judul;
        this.genre = genre;
        this.durasi = durasi;
        this.harga = harga;
        this.sutradara = sutradara;
    }

    // ---- Getter ----
    public int getId() { return id; }
    public String getPoster() { return poster; }
    public String getJudul() { return judul; }
    public String getGenre() { return genre; }
    public int getDurasi() { return durasi; }
    public int getHarga() { return harga; }
    public String getSutradara() { return sutradara; }

    // ---- Setter ----
    public void setId(int id) { this.id = id; }
    public void setPoster(String poster) { this.poster = poster; }
    public void setJudul(String judul) { this.judul = judul; }
    public void setGenre(String genre) { this.genre = genre; }
    public void setDurasi(int durasi) { this.durasi = durasi; }
    public void setHarga(int harga) { this.harga = harga; }
    public void setSutradara(String sutradara) { this.sutradara = sutradara; }
}
