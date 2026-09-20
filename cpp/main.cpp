#include <iostream>
#include <vector>
#include <string>
#include <limits>
#include "Bioskop.cpp"

using namespace std;

// LIST OF OBJECT
vector<Film> daftarFilm;

// ERROR handling biar ID, menit sama harga itu integer
int inputInteger(string pesan) {
    int nilai;

    while (true) {
        cout << pesan;

        if (cin >> nilai) {
            if (nilai < 0) {
                cout << "Input harus berupa angka 0 atau lebih!" << endl;
            } else {
                cin.ignore(numeric_limits<streamsize>::max(), '\n');
                return nilai;
            }
        } else {
            cout << "Input harus berupa angka hey!" << endl;

            cin.clear();
            cin.ignore(numeric_limits<streamsize>::max(), '\n');
        }
    }
}

// TAMBAH DATA

void tambahData() {
    cout << "\n******** TAMBAH DATA FILM ********" << endl;

    int id = inputInteger("ID Film       : ");

    // Cek ID agar unik
    for (auto &film : daftarFilm) {
        if (film.getId() == id) {
            cout << "ID udah kepake itu!" << endl;
            return;
        }
    }

    string poster, judul, genre, sutradara;
    cout << "Poster        : "; getline(cin, poster);
    cout << "Judul         : "; getline(cin, judul);
    cout << "Genre         : "; getline(cin, genre);
    int durasi = inputInteger("Durasi (menit): ");
    int harga = inputInteger("Harga         : ");
    cout << "Sutradara     : "; getline(cin, sutradara);

    Film filmBaru(id, poster, judul, genre, durasi, harga, sutradara);
    daftarFilm.push_back(filmBaru);

    cout << "Data film baru berhasil ditambahkan!" << endl;
}

// TAMPILKAN DATA

void tampilkanData() {
    cout << "\n******** DAFTAR FILM ********" << endl;

    if (daftarFilm.empty()) {
        cout << "Belum ada data film." << endl;
        return;
    }

    for (auto &film : daftarFilm) {
        cout << "*************************************************************************" << endl;
        cout << "ID         : " << film.getId() << endl;
        cout << "Poster     : " << film.getPoster() << endl;
        cout << "Judul      : " << film.getJudul() << endl;
        cout << "Genre      : " << film.getGenre() << endl;
        cout << "Durasi     : " << film.getDurasi() << " menit" << endl;
        cout << "Harga      : " << film.getHarga() << endl;
        cout << "Sutradara  : " << film.getSutradara() << endl;
    }
}

// CARI DATA

void cariData() {
    cout << "\n******** CARI DATA FILM ********" << endl;

    int id = inputInteger("Masukkan ID film: ");

    for (auto &film : daftarFilm) {
        if (film.getId() == id) {
            cout << "\nYey Filmnya ada!" << endl;
            cout << "ID         : " << film.getId() << endl;
            cout << "Poster     : " << film.getPoster() << endl;
            cout << "Judul      : " << film.getJudul() << endl;
            cout << "Genre      : " << film.getGenre() << endl;
            cout << "Durasi     : " << film.getDurasi() << " menit" << endl;
            cout << "Harga      : " << film.getHarga() << endl;
            cout << "Sutradara  : " << film.getSutradara() << endl;
            return;
        }
    }

    cout << "Filmnya gaada wok." << endl;
}

// UPDATE DATA

void updateData() {
    cout << "\n******** UPDATE DATA FILM ********" << endl;

    int id = inputInteger("Masukkan ID film yang ingin diupdate: ");

    for (auto &film : daftarFilm) {
        if (film.getId() == id) {

            cout << "\nData lama:" << endl;
            cout << "Judul      : " << film.getJudul() << endl;
            cout << "Genre      : " << film.getGenre() << endl;
            cout << "Durasi     : " << film.getDurasi() << endl;
            cout << "Harga      : " << film.getHarga() << endl;
            cout << "Sutradara  : " << film.getSutradara() << endl;
            cout << "Poster     : " << film.getPoster() << endl;

            cout << "\nMasukkan data baru:" << endl;

            string poster, judul, genre, sutradara;
            cout << "Poster        : "; getline(cin, poster);
            cout << "Judul         : "; getline(cin, judul);
            cout << "Genre         : "; getline(cin, genre);
            int durasi = inputInteger("Durasi (menit): ");
            int harga = inputInteger("Harga         : ");
            cout << "Sutradara     : "; getline(cin, sutradara);

            film.setPoster(poster);
            film.setJudul(judul);
            film.setGenre(genre);
            film.setDurasi(durasi);
            film.setHarga(harga);
            film.setSutradara(sutradara);

            cout << "Data film berhasil diupdate!" << endl;
            return;
        }
    }

    cout << "Film tidak ditemukan." << endl;
}

// HAPUS DATA

void hapusData() {
    cout << "\n******** HAPUS DATA FILM ********" << endl;

    int id = inputInteger("Masukkan ID film yang ingin dihapus: ");

    for (auto it = daftarFilm.begin(); it != daftarFilm.end(); ++it) {
        if (it->getId() == id) {
            daftarFilm.erase(it);
            cout << "Data film berhasil dihapus!" << endl;
            return;
        }
    }

    cout << "Film tidak ditemukan." << endl;
}

// MENU UTAMA

void menu() {
    while (true) {
        cout << "\n**************************************" << endl;
        cout << "             Tel Aviv XXI" << endl;
        cout << "    Silakan Pilih Fitur Wahai Goy:" << endl;
        cout << "**************************************" << endl;
        cout << "1. Tambah Data" << endl;
        cout << "2. Tampilkan Data" << endl;
        cout << "3. Update Data" << endl;
        cout << "4. Hapus Data" << endl;
        cout << "5. Cari Data" << endl;
        cout << "6. Keluar" << endl;
        cout << "**************************************" << endl;

        cout << "Pilih menu: ";
        string pilihan;
        getline(cin, pilihan);

        if (pilihan == "1") {
            tambahData();
        } else if (pilihan == "2") {
            tampilkanData();
        } else if (pilihan == "3") {
            updateData();
        } else if (pilihan == "4") {
            hapusData();
        } else if (pilihan == "5") {
            cariData();
        } else if (pilihan == "6") {
            cout << "See You Later!" << endl;
            break;
        } else {
            cout << "Nuh uh! Gaada pilihannya woy!" << endl;
        }
    }
}

int main() {
    menu();
    return 0;
}

