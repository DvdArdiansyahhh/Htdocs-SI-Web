<!-- <?php
class person {
}
?> -->

<!-- <?php
class person {
var $name;
}
?> -->

<?php
class person {
    public $nama;
    public $umur;
    public $JenisKelamin;

    public function set_name ($namaa, $umurr, $JenisKelaminn) {
        $this->nama = $namaa;
    }
    public function get_name() {
        return $this->nama, 
    }
    }
?>

