<?php

// Pakai abstract class
abstract class Hewan {
    use Fight;
    public $nama;
    public $darah = 50;
    public $jumlahKaki;
    public $keahlian;

    public function atraksi() {
        $str = $this->nama .' sedang '.$this->keahlian.'<br/>';
        return $str;
    }

    abstract public function getInfoHewan();
}

trait Fight {
    public $attackPower;
    public $defencePower;

    public function serang(Hewan $lawan) {
        echo $this->nama.' sedang menyerang '.$lawan->nama.'<br/>';
        $lawan->diserang($this);
    }

    public function diserang(Hewan $lawan) {
        echo $this->nama.' sedang diserang '.$lawan->nama.'<br/>';
        $this->darah = $this->darah - $lawan->attackPower / $this->defencePower;
    }
}

class Elang extends Hewan {

    public $jenisHewan = 'elang';

    public function __construct($nama,$jumlahKaki,$keahlian, $attackPower, $defensePower)
    {
        $this->nama = $this->jenisHewan.'_'.$nama;
        $this->jumlahKaki = $jumlahKaki;
        $this->keahlian = $keahlian;
        $this->attackPower = $attackPower;
        $this->defencePower = $defensePower;
    }

    public function getInfoHewan() {
        echo 'Nama: '.$this->nama.'<br/>';
        echo 'Jenis Hewan: '.$this->jenisHewan.'<br/>';
        echo 'Attack Power: '.$this->attackPower.'<br/>';
        echo 'Defence Power: '.$this->defencePower.'<br/>';
        echo 'Darah: '.$this->darah.'<br/>';
        echo 'Jumlah Kaki: '.$this->jumlahKaki.'<br/>';
        echo 'Keahlian: '.$this->keahlian.'<br/>';
    }
}

class Harimau extends Hewan {

    public $jenisHewan = 'harimau';

    public function __construct($nama,$jumlahKaki,$keahlian, $attackPower, $defensePower)
    {
        $this->nama = $this->jenisHewan.'_'.$nama;
        $this->jumlahKaki = $jumlahKaki;
        $this->keahlian = $keahlian;
        $this->attackPower = $attackPower;
        $this->defencePower = $defensePower;
    }

    public function getInfoHewan() {
        echo 'Nama: '.$this->nama.'<br/>';
        echo 'Jenis Hewan: '.$this->jenisHewan.'<br/>';
        echo 'Attack Power: '.$this->attackPower.'<br/>';
        echo 'Defence Power: '.$this->defencePower.'<br/>';
        echo 'Darah: '.$this->darah.'<br/>';
        echo 'Jumlah Kaki: '.$this->jumlahKaki.'<br/>';
        echo 'Keahlian: '.$this->keahlian.'<br/>';
    }
}

$elang = new Elang('2',2,'terbang tinggi', 10, 5 );
$harimau = new Harimau('5',4,'lari cepat', 7, 8 );

$elang->getInfoHewan();
echo "<br/>";
$harimau->getInfoHewan();
echo "<br/>";
echo $elang->atraksi();
echo $harimau->atraksi();
echo "<br/>";
$elang->serang($harimau);
echo "<br/>";
$harimau->serang($elang);
echo "<br/>";
$elang->getInfoHewan();
echo "<br/>";
$harimau->getInfoHewan();
echo "<br/>";