from Bioskop import Film



# LIST OF OBJECT
daftar_film = []


#ERROR handling biar ID, menit sama harga itu integer
def input_integer(pesan):
    while True:
        try:
            return int(input(pesan))
        except ValueError:
            print("Input harus berupa angka!")

# TAMBAH DATA

def tambah_data():
    print("\n☆☆☆☆ TAMBAH DATA FILM ☆☆☆☆")

    id = input_integer("ID Film       : ")

    # Cek ID agar unik
    for film in daftar_film:
        if film.get_id() == id:
            print("ID udah kepake itu!")
            return

    poster = input("Poster        : ")
    judul = input("Judul         : ")
    genre = input("Genre         : ")
    durasi = input_integer("Durasi (menit): ")
    harga = input_integer("Harga         : ")
    sutradara = input("Sutradara     : ")

    film_baru = Film(
        id,
        poster,
        judul,
        genre,
        durasi,
        harga,
        sutradara
    )

    daftar_film.append(film_baru)

    print("Data film baru berhasil ditambahkan!")


# TAMPILKAN DATA

def tampilkan_data():
    print("\n☆☆☆☆ DAFTAR FILM ☆☆☆☆")

    if len(daftar_film) == 0:
        print("Belum ada data film.")
        return

    for film in daftar_film:
        print("☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆")
        print("ID         :", film.get_id())
        print("Poster     :", film.get_poster())
        print("Judul      :", film.get_judul())
        print("Genre      :", film.get_genre())
        print("Durasi     :", film.get_durasi(), "menit")
        print("Harga      :", film.get_harga())
        print("Sutradara  :", film.get_sutradara())


# CARI DATA

def cari_data():
    print("\n☆☆☆☆ CARI DATA FILM ☆☆☆☆")

    id = int(input("Masukkan ID film: "))

    for film in daftar_film:
        if film.get_id() == id:
            print("\nYey Filmnya ada!")
            print("ID         :", film.get_id())
            print("Poster     :", film.get_poster())
            print("Judul      :", film.get_judul())
            print("Genre      :", film.get_genre())
            print("Durasi     :", film.get_durasi(), "menit")
            print("Harga      :", film.get_harga())
            print("Sutradara  :", film.get_sutradara())
            return

    print("Filmnya gaada wok.")


# UPDATE DATA

def update_data():
    print("\n☆☆☆☆ UPDATE DATA FILM ☆☆☆☆")

    id = int(input("Masukkan ID film yang ingin diupdate: "))

    for film in daftar_film:
        if film.get_id() == id:

            print("\nData lama:")
            print("Judul      :", film.get_judul())
            print("Genre      :", film.get_genre())
            print("Durasi     :", film.get_durasi())
            print("Harga      :", film.get_harga())
            print("Sutradara  :", film.get_sutradara())
            print("Poster     :", film.get_poster())

            print("\nMasukkan data baru:")

            poster = input("Poster        : ")
            judul = input("Judul         : ")
            genre = input("Genre         : ")
            durasi = input_integer("Durasi (menit): ")
            harga = input_integer("Harga         : ")
            sutradara = input("Sutradara     : ")

            film.set_poster(poster)
            film.set_judul(judul)
            film.set_genre(genre)
            film.set_durasi(durasi)
            film.set_harga(harga)
            film.set_sutradara(sutradara)

            print("Data film berhasil diupdate!")
            return

    print("Film tidak ditemukan.")


# HAPUS DATA

def hapus_data():
    print("\n☆☆☆☆HAPUS DATA FILM ☆☆☆☆")

    id = int(input("Masukkan ID film yang ingin dihapus: "))

    for film in daftar_film:
        if film.get_id() == id:

            daftar_film.remove(film)

            print("Data film berhasil dihapus!")
            return

    print("Film tidak ditemukan.")



# MENU UTAMA


def menu():
    while True:
        print("\n☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆")
        print("             Tel Aviv XXI")
        print("    Silakan PIlih Fitur Wahai Goy:")
        print("☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆")
        print("1. Tambah Data")
        print("2. Tampilkan Data")
        print("3. Update Data")
        print("4. Hapus Data")
        print("5. Cari Data")
        print("6. Keluar")
        print("☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆")

        pilihan = input("Pilih menu: ")

        if pilihan == "1":
            tambah_data()

        elif pilihan == "2":
            tampilkan_data()

        elif pilihan == "3":
            update_data()

        elif pilihan == "4":
            hapus_data()

        elif pilihan == "5":
            cari_data()

        elif pilihan == "6":
            print("See You Later!")
            break

        else:
            print("Nuh uh! Gaada pilihannya woy!")


menu()