#include <string>
using namespace std;

class Film {
private:
    int id;
    string poster;
    string judul;
    string genre;
    int durasi;
    int harga;
    string sutradara;

public:
    // Constructor koosng
    Film();

    // constructor berparameter
    
    Film(int id, string poster, string judul, string genre, int durasi, int harga, string sutradara) {
        this->id = id;
        this->poster = poster;
        this->judul = judul;
        this->genre = genre;
        this->durasi = durasi;
        this->harga = harga;
        this->sutradara = sutradara;
    }

    // ---- Getter ----
    int getId() { return id; }
    string getPoster() { return poster; }
    string getJudul() { return judul; }
    string getGenre() { return genre; }
    int getDurasi() { return durasi; }
    int getHarga() { return harga; }
    string getSutradara() { return sutradara; }

    // ---- Setter ----
    void setId(int id) { this->id = id; }
    void setPoster(string poster) { this->poster = poster; }
    void setJudul(string judul) { this->judul = judul; }
    void setGenre(string genre) { this->genre = genre; }
    void setDurasi(int durasi) { this->durasi = durasi; }
    void setHarga(int harga) { this->harga = harga; }
    void setSutradara(string sutradara) { this->sutradara = sutradara; }
};

