<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal No. 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top: 20px;">
        <?php
        // class nilai
        class Nilai
        {
            public $mapel;
            public $nilai;

            public function __construct($mapel, $nilai)
            {
                $this->mapel = $mapel;
                $this->nilai = $nilai;
            }
        }

        class Siswa
        {
            public $nrp;
            public $nama;
            public $daftarNilai;

            public function __construct($nrp, $nama, $daftarNilai)
            {
                $this->nrp = $nrp;
                $this->nama = $nama;
                $this->daftarNilai = $daftarNilai;
            }
        }

        // membuat daftar nilai dengan panjang 3
        $daftarNilai = [];
        for ($i = 0; $i < 3; $i++) {
            $daftarNilai[] = new Nilai('', 0);
        }

        // membuat siswa baru dan set mapel inggris dengan nilai 100

        $siswaBaru = new Siswa('123', 'Siswa Baru', $daftarNilai);
        $siswaBaru->daftarNilai[0]->mapel = "Inggris";
        $siswaBaru->daftarNilai[0]->nilai = 100;

        // membuat 10 nama siswa dengan random string 10 karakter

        $namaSiswa = '';
        $siswaList = [];
        for ($i = 0; $i < 10; $i++) {
            $namaSiswa = generateRandomString(10);
            $daftarNilai = [];
            for ($j = 0; $j < 3; $j++) {
                $mapel = ['Inggris', 'Indonesia', 'Jepang'][rand(0, 2)];
                $nilai = rand(0, 100);
                $daftarNilai[] = new Nilai($mapel, $nilai);
            }
            $siswaList[] = new Siswa($i + 1, $namaSiswa, $daftarNilai);
        }

        // buat fungsi generate nama siswa

        function generateRandomString($length = 10)
        {
            $konsonan = 'plschrtflmng';
            $hurufvocal = 'aiueo';
            $randomNama = '';

            $length = $length % 2 === 0 ? $length : $length + 1;

            for ($i = 0; $i < $length; $i += 2) {
                $randomNama .= $konsonan[rand(0, strlen($konsonan) - 1)];
                $randomNama .= $hurufvocal[rand(0, strlen($hurufvocal) - 1)];
            }

            return ucfirst($randomNama);
        }
        ?>
        <table class="table table-striped" width="100%">
            <thead>
                <tr>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Daftar Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswaList as $siswa) : ?>
                    <tr>
                        <td><?= $siswa->nrp ?></td>
                        <td><?= $siswa->nama ?></td>
                        <td>
                            <?php 
                                $no = 1;
                                foreach($siswa->daftarNilai AS $nilai)  : 
                            ?>
                            <?= $no++; ?>. <?= $nilai->mapel ?>, Nilai: <?= $nilai->nilai; ?><br />
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>