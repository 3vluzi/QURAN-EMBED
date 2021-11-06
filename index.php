<?php
// ┌──────────────────────────────────────────────────────────────────────────────┐
// │ Alquran embed by Izulthea.com                                                │
// │ url: https://izulthea.com                                                    │
// │ github: 3Vluzi                                                               │
// │                                                                              │
// └──────────────────────────────────────────────────────────────────────────────┘
$protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];
$folder = '/alquran/';
$url = $base_url . $folder . '/assets/data/surahs.json';
$ch = curl_init();
$headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, '3');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
$content = trim(curl_exec($ch));
curl_close($ch);
$data = json_decode($content, TRUE);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Alquran Online Beserta Arti dan Tafsirnya</title>
    <style>
        @font-face {
            font-family: 'LPMQ Isep Misbah';
            src: url('assets/fonts/LPMQIsepMisbah.woff2') format('woff2'),
                url('assets/fonts/LPMQIsepMisbah.woff') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
        .ayat {
            font-family: 'LPMQ Isep Misbah';
            font-weight: normal;
            font-style: normal;
            line-height: 18px;
            text-align: right;
        }
        .surat {
            font-family: 'LPMQ Isep Misbah';
            font-weight: 24px;
            font-style: normal;
        }
        .namasurat {
            font-family: 'LPMQ Isep Misbah';
            font-weight: 54px;
            font-style: normal;
        }
    </style>
</head>
<body>
    <div class="container p-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <!-- ---------------------------- konten utama 2021-11-02 jam  11:13:50.000-05:00 ----------------------------- -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" style="text-align: center;">
                                        <h1 class="namasurat">QURANUL KARIIM</h1>
                                    </th>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Surat</th>
                                    <th>Total Ayat</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($data as $ayat) {
                                $nomor_surat = $ayat['id'];
                                $nama_surat  = $ayat['name'];
                                $kelompok    = $ayat['type'];
                                $jml_ayat    = $ayat['verse_count'];
                            ?>
                                <tr>
                                    <td><?php echo $nomor_surat; ?></td>
                                    <td><span class="ayat"><a href="read.php?surat=<?php echo $nomor_surat; ?>"><?php echo $nama_surat; ?></a></span></td>
                                    <td><?php echo $jml_ayat; ?></td>
                                    <td><?php echo $kelompok; ?> </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tbody>
                            </tbody>
                        </table>
                        <!-- ---------------------------- konten utama  2021-11-02 jam 11:13:50.000-05:00----------------------------- -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h3>Credits</h3>
                <ol>
                    <li>Allah Subhanahu Wata`ala ﷻ</li>
                    <li>Rasullullah (ﷺ) Shallalahu Alaihi Wasallam</li>
                    <li><a href="https://github.com/penggguna/QuranJSON" target="_blank">Quran JSON API</a></li>
                    <li><a href="https://kemenag.go.id/read/kemenag-rilis-font-mushaf-standar-indonesia-untuk-penulisan-alquran-rbkbb" target="_blank">Font 'LPMQ Isep Misbah'</a> Standar Penulisan Alquran KEMENAG RI</li>
                </ol>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>