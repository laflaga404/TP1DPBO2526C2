class Film:
    def __init__(self, id:int,poster:str, judul:str, genre:str, durasi:int, harga:int, sutradara:str):
        self._id = int(id)
        self._poster = str(poster)
        self._judul = str(judul)
        self._genre = str(genre)
        self._durasi = int(durasi)
        self._harga = int(harga)
        self._sutradara = str(sutradara)

    # ---- Getter -----    
    def get_id(self) -> int:
        return self._id
    def get_poster(self) -> str:
        return self._poster
    def get_judul(self) -> str:
        return self._judul    
    def get_genre(self) -> str:
        return self._genre
    def get_durasi(self) -> int:
        return self._durasi
    def get_harga(self) -> int:
        return self._harga
    def get_sutradara(self) -> str:
        return self._sutradara

    # ---- Setter ----aa
    def set_id(self, id: int) -> None:
        self._id = int(id)
    def set_poster(self, poster: str) -> None:
        self._poster = str(poster)
    def set_judul(self, judul: str) -> None:
        self._judul = str(judul)
    def set_genre(self, genre: str) -> None:
        self._genre = str(genre)
    def set_durasi(self, durasi: int) -> None:
        self._durasi = int(durasi)
    def set_harga(self, harga: int) -> None:
        self._harga = int(harga)
    def set_sutradara(self, sutradara: str) -> None:
        self._sutradara = str(sutradara)
