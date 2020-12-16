// SOAL #1
function urutKata(array) {
    var selesai = false;
    while (!selesai) {
        selesai = true;
        for (var i = 1; i < array.length; i += 1) {
            if (array[i - 1] > array[i]) {
                selesai = false;
                var temp = array[i - 1];
                array[i - 1] = array[i];
                array[i] = temp;
            }
        }
    }
    return array;
}

var daftarBuah = ["2. Apel", "5. Jeruk", "3. Anggur", "4. Semangka", "1. Mangga"];
urutKata(daftarBuah);
console.log(daftarBuah);

// SOAL 2
var kalimat = "saya sangat senang belajar javascript";
var kalimatArray = kalimat.split(" ");
console.log(kalimatArray);

// SOAL 3
var buah = [
    {
        "nama": "strawberry",
        "warna": "merah",
        "ada bijinya": "tidak",
        "harga": "9000"
    },
    {
        "nama": "jeruk",
        "warna": "oranye",
        "ada bijinya": "ada",
        "harga": "8000"
    },
    {
        "nama": "Semangka",
        "warna": "hijau & merah",
        "ada bijinya": "ada",
        "harga": "10000"
    },
    {
        "nama": "Pisang",
        "warna": "Kuning",
        "ada bijinya": "tidak",
        "harga": "5000"
    },
];

console.log(buah[0].nama);