<?php
// Untuk mengimport library TestCase
use PHPUnit\Framework\TestCase;

// Class yang ingin di test
require_once "WordCount.php"; // Menyertakan file "WordCount.php" sebanyak satu kali

// Class untuk run Testing
class SimpleTest extends TestCase {
    public function testCountWords() {
        // Class yang ingin di Test
        $Wc = new WordCount();

        // Masukkan parameter 4 kata, yang harusnya dapat output 4
        $TestSentence = "My name is David"; //4 kata
        $WordCount = $Wc->countWords($TestSentence);

        // assertEquals yang mana sebagai ekspektasi bahwa parameter harus 4
        $this->assertEquals(4, $WordCount);
    }
}
