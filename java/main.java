import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class main {

    // LIST OF OBJECT
    static List<Film> daftarFilm = new ArrayList<>();
    static Scanner scanner = new Scanner(System.in);

    // ERROR handling biar ID, menit sama harga itu integer
    static int inputInteger(String pesan) {
        while (true) {
            System.out.print(pesan);
            String input = scanner.nextLine();
            try {
                return Integer.parseInt(input.trim());
            } catch (NumberFormatException e) {
                System.out.println("Input harus berupa angka!");
            }
        }
    }

    // TAMBAH DATA

    static void tambahData() {
        System.out.println("\n☆☆☆☆ TAMBAH DATA FILM ☆☆☆☆");

        int id = inputInteger("ID Film       : ");

        // Cek ID agar unik
        for (Film film : daftarFilm) {
            if (film.getId() == id) {
                System.out.println("ID udah kepake itu!");
                return;
            }
        }

        System.out.print("Poster        : ");
        String poster = scanner.nextLine();
        System.out.print("Judul         : ");
        String judul = scanner.nextLine();
        System.out.print("Genre         : ");
        String genre = scanner.nextLine();
        int durasi = inputInteger("Durasi (menit): ");
        int harga = inputInteger("Harga         : ");
        System.out.print("Sutradara     : ");
        String sutradara = scanner.nextLine();

        Film filmBaru = new Film(id, poster, judul, genre, durasi, harga, sutradara);
        daftarFilm.add(filmBaru);

        System.out.println("Data film baru berhasil ditambahkan!");
    }

    // TAMPILKAN DATA

    static void tampilkanData() {
        System.out.println("\n☆☆☆☆ DAFTAR FILM ☆☆☆☆");

        if (daftarFilm.isEmpty()) {
            System.out.println("Belum ada data film.");
            return;
        }

        for (Film film : daftarFilm) {
            System.out.println("☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆");
            System.out.println("ID         : " + film.getId());
            System.out.println("Poster     : " + film.getPoster());
            System.out.println("Judul      : " + film.getJudul());
            System.out.println("Genre      : " + film.getGenre());
            System.out.println("Durasi     : " + film.getDurasi() + " menit");
            System.out.println("Harga      : " + film.getHarga());
            System.out.println("Sutradara  : " + film.getSutradara());
        }
    }

    // CARI DATA

    static void cariData() {
        System.out.println("\n☆☆☆☆ CARI DATA FILM ☆☆☆☆");

        int id = inputInteger("Masukkan ID film: ");

        for (Film film : daftarFilm) {
            if (film.getId() == id) {
                System.out.println("\nYey Filmnya ada!");
                System.out.println("ID         : " + film.getId());
                System.out.println("Poster     : " + film.getPoster());
                System.out.println("Judul      : " + film.getJudul());
                System.out.println("Genre      : " + film.getGenre());
                System.out.println("Durasi     : " + film.getDurasi() + " menit");
                System.out.println("Harga      : " + film.getHarga());
                System.out.println("Sutradara  : " + film.getSutradara());
                return;
            }
        }

        System.out.println("Filmnya gaada wok.");
    }

    // UPDATE DATA

    static void updateData() {
        System.out.println("\n☆☆☆☆ UPDATE DATA FILM ☆☆☆☆");

        int id = inputInteger("Masukkan ID film yang ingin diupdate: ");

        for (Film film : daftarFilm) {
            if (film.getId() == id) {

                System.out.println("\nData lama:");
                System.out.println("Judul      : " + film.getJudul());
                System.out.println("Genre      : " + film.getGenre());
                System.out.println("Durasi     : " + film.getDurasi());
                System.out.println("Harga      : " + film.getHarga());
                System.out.println("Sutradara  : " + film.getSutradara());
                System.out.println("Poster     : " + film.getPoster());

                System.out.println("\nMasukkan data baru:");

                System.out.print("Poster        : ");
                String poster = scanner.nextLine();
                System.out.print("Judul         : ");
                String judul = scanner.nextLine();
                System.out.print("Genre         : ");
                String genre = scanner.nextLine();
                int durasi = inputInteger("Durasi (menit): ");
                int harga = inputInteger("Harga         : ");
                System.out.print("Sutradara     : ");
                String sutradara = scanner.nextLine();

                film.setPoster(poster);
                film.setJudul(judul);
                film.setGenre(genre);
                film.setDurasi(durasi);
                film.setHarga(harga);
                film.setSutradara(sutradara);

                System.out.println("Data film berhasil diupdate!");
                return;
            }
        }

        System.out.println("Film tidak ditemukan.");
    }

    // HAPUS DATA

    static void hapusData() {
        System.out.println("\n☆☆☆\u2606HAPUS DATA FILM ☆☆☆☆");

        int id = inputInteger("Masukkan ID film yang ingin dihapus: ");

        for (Film film : daftarFilm) {
            if (film.getId() == id) {
                daftarFilm.remove(film);
                System.out.println("Data film berhasil dihapus!");
                return;
            }
        }

        System.out.println("Film tidak ditemukan.");
    }

    // MENU UTAMA

    static void menu() {
        while (true) {
            System.out.println("\n☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆");
            System.out.println("             Tel Aviv XXI");
            System.out.println("    Silakan Pilih Fitur Wahai Goy:");
            System.out.println("☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆");
            System.out.println("1. Tambah Data");
            System.out.println("2. Tampilkan Data");
            System.out.println("3. Update Data");
            System.out.println("4. Hapus Data");
            System.out.println("5. Cari Data");
            System.out.println("6. Keluar");
            System.out.println("☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆");

            System.out.print("Pilih menu: ");
            String pilihan = scanner.nextLine();

            switch (pilihan) {
                case "1": tambahData(); break;
                case "2": tampilkanData(); break;
                case "3": updateData(); break;
                case "4": hapusData(); break;
                case "5": cariData(); break;
                case "6":
                    System.out.println("See You Later!");
                    return;
                default: System.out.println("Nuh uh! Gaada pilihannya woy!");
            }
        }
    }

    public static void main(String[] args) {
        menu();
    }
}

