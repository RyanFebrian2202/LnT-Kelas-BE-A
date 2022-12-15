<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>
    <h1>Hello</h1>
    <?php
    //ini comment
        echo 'hello world';
        print 'test <br>';
        echo 'hello world';
        print '<h1>test</h1>';
        echo 'test 2 \n'; 
        $nama = 'Ryan';
        echo "halo $nama";
        echo 'halo '.$nama .'<br>';
        $x = 5;
        $y = 10;
        $x = 7;
        $z = NULL;
        echo var_dump($x);
        echo var_dump($nama);
        echo var_dump($z) . '<br>';
        $a = 5.0;
        $b = '5';
        echo $a == $b. '<br>';
        echo $a === $b . '<br>';
        echo ++$x,' ',$y++ . '<br>';
        echo $x, ' ',$y . '<br>';
        // $x += $y
        // $x = $x+$y
        // $x += 5
        $score = 92;
        if ($score>90) {
            echo 'A <br>';
        } elseif ($score>80) {
            echo 'B <br>';
            # code...
        } else {
            echo 'C <br>';
            # code...
        }

        $color = 'green';
        switch($color){
            case 'red':
                echo 'tomat <br>';
                break;
            case 'green':
                echo 'kangkung <br>';
                break;
            default:
                echo 'apa aja dah <br>';
        }
        
        // $r = 5;
        // while ($r<10){
        //     echo $r . '<br>';
        //     $r++;
        // }

        // do{
        //     $genre = 'budi';
        // }while(!($genre == 'Horror' || $genre == 'Comedy'));

        // for ($i=0; $i<5; $i++){
        //     echo $i . '<br>';
        // }

        // $buah = array('Jeruk','Apel','Mangga','Alpukat');
        // foreach ($buah as $b) {
        //     echo $b .'<br>';
        // }

        // $buah = array('Jeruk','Apel','Mangga','Alpukat');
        // $jumlah = count($buah);
        // $buah[1] = "Anggur";

        // for ($i=0; $i < $jumlah; $i++) { 
        //     echo $buah[$i] . '<br>';
        // }

        $mahasiswa = array(
            "nama" => "Budi",
            "umur" => 18,
            "GPA" => 3.5
        );
        $mahasiswa["umur"] = 19;

        foreach($mahasiswa as $mhs => $mhs_data) {
            echo "Key= $mhs, Value= $mhs_data<br>";
        }

        $mahasiswa = array (
            array("Budi", 18, 3.5),
            array("Cika", 19, 4),
            array("Didi", 19, 3.6),
        );

        $jumlah_mahasiswa = count($mahasiswa);

        for($idx = 0; $idx < $jumlah_mahasiswa; $idx++) {
            echo "Mahasiswa :". $idx+1 . "<br>";
            echo "Nama :". $mahasiswa[$idx][0]. "<br>";
            echo "Umur :". $mahasiswa[$idx][1]. "<br>";
            echo "GPA :". $mahasiswa[$idx][2]. "<br>";
            echo "<br>";
        }

        echo strlen($nama);

        function pesan() {
            echo "Hello World!<br>";
        }
        pesan();

        // function pesan1($nama1, $nama2) {
        //     echo "Halo $nama1 $nama2!<br>";
        // }
        // pesan1();

        function pesan2($nama1 = "Wawan", $nama2 ="Wawanto") {
            echo "Halo $nama1 $nama2!<br>";
        }
        pesan2("Budi", "Budiman");
        pesan2();

        function jumlah(int $a, int $b) {
            return $a + $b;
        }
        $x = 5;
        $y = 10;
        $z = jumlah($x,$y);
        echo "$x + $y = ".jumlah($x, $y);
    ?>
</body>
</html>