<?php
error_reporting(0);
// ┌──────────────────────────────────────────────────────────────────────────────┐
// │ Alquran embed by Izulthea.com                                                │
// │ url: https://izulthea.com                                                    │
// │ github: 3Vluzi                                                               │
// │                                                                              │
// └──────────────────────────────────────────────────────────────────────────────┘
include('models/m.php');
$verse = hanyaangka($_GET['surat']);
if (($verse > 0) && ($verse <= 114) && isset($verse)) {
    $datax = surat($verse);
    $data = json_decode($datax, TRUE);
    $nama           =  $data['name'];
    $nama_arti_ar   = $data['name_translations']['ar'];
    $nama_arti_en   = $data['name_translations']['en'];
    $nama_arti_id   = $data['name_translations']['id'];
    $jumlah_ayat    = $data['number_of_ayah'];
    $surat_ke       = $data['number_of_surah'];
    $turun_surat    = $data['place'];
    $jenis_surat    = $data['type'];
    $qori1          = $data['recitations'][0]['name'];
    $qori1_mp3      = $data['recitations'][0]['audio_url'];
    $qori2          = $data['recitations'][1]['name'];
    $qori2_mp3      = $data['recitations'][1]['audio_url'];
    $qori3          = $data['recitations'][2]['name'];
    $qori3_mp3      = $data['recitations'][2]['audio_url'];
    $tafsir         = $data['tafsir']['id']['kemenag']['text'];
    #satuan
    $ayats          = $data['verses'];
    $no = 0;
    $des            = 'Surat ' . $nama . ' beserta arti dan tafsirnya';
    $link_ini       = get_the_current_url();
?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Surat <?php echo $nama; ?> | <?php echo $nama_arti_id; ?> | <?php echo $nama_arti_en; ?></title>
        <!-- seo -->
        <link rel="opengraph" href="<?php echo $link_ini; ?>" />
        <meta name="keywords" content="<?php echo $keyword; ?>" />
        <meta name="description" content="<?php echo $des; ?>" />
        <meta name="revisit-after" content="7" />
        <meta name="webcrawlers" content="all" />
        <meta name="rating" content="general" />
        <meta name="spiders" content="all" />
        <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
        <meta name="google" content="notranslate" />
        <meta property="og:title" content="Surat <?php echo $nama; ?> | <?php echo $nama_arti_id; ?> | <?php echo $nama_arti_en; ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="" />
        <meta property="og:url" content="<?php echo $link_ini; ?>" />
        <meta property="og:description" content="<?php echo $des; ?>" />
        <meta property="og:site_name" content="Surat <?php echo $nama; ?> | <?php echo $nama_arti_id; ?> | <?php echo $nama_arti_en; ?>" />
        <meta itemprop="description" content="<?php echo $des; ?>" />
        <style>
            @font-face {
                font-family: 'LPMQ Isep Misbah';
                src: url('assets/fonts/LPMQIsepMisbah.woff2') format('woff2'),
                    url('assets/fonts/LPMQIsepMisbah.woff') format('woff');
                font-weight: 32px;
                font-style: normal;
                font-display: swap;
            }

            .ayat {
                font-family: 'LPMQ Isep Misbah';
                font-size: 22px;
                line-height: 18px;
                text-align: right !important;
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

            @media (min-width: 900px) {
                .modal-xlg {
                    width: 90%;
                }
            }

            .table-responsive {
                display: table;
            }
        </style>
    </head>

    <body>
        <div class="container p-3">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <!-- ---------------------------- konten utama 2021-11-02 jam  11:13:50.000-05:00 ----------------------------- -->
                        <center>
                            <h1 class="namasurat"><?php echo $nama_arti_ar; ?></h1>
                        </center>
                        <?php
                        $mobile = isMobile();
                        if (!$mobile) {
                        ?>
                            <div class="table-responsive">
                                <table class="table w-100 d-block d-md-table">
                                    <thead>
                                        <tr>
                                            <th colspan="4" scope="col"><span class="surat">Surat <?php echo $nama; ?> ( <?php echo $nama_arti_id; ?> | <?php echo $nama_arti_en; ?> ) | Nomor surat: <?php echo $surat_ke; ?> | Jumlah Ayat: <?php echo $jumlah_ayat; ?></span> | Diturunkan di <?php if ($turun_surat == 'Mecca') {
                                                                                                                                                                                                                                                                                                        echo "Makkah";
                                                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                                                        echo "Madinah";
                                                                                                                                                                                                                                                                                                    } ?> | Jenis Surat: <?php echo $jenis_surat; ?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Qari: <?php echo $qori1; ?>
                                                <br>
                                                <audio controls>
                                                    <source src="<?php echo $qori1_mp3; ?>" type="audio/ogg">
                                                    Your browser does not support the audio element.
                                                </audio>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col" width="40%">Ayat</th>
                                            <th scope="col">Terjemah</th>
                                            <th scope="col" width="10%">Tafsir</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($ayats as $ayat) {
                                        $nomor_ayat = $ayat['number'];
                                        $text_ayat  = $ayat['text'];
                                        $text_en    = $ayat['translation_en'];
                                        $text_id    = $ayat['translation_id'];
                                    ?>
                                        <tr>
                                            <td><?php echo $nomor_ayat; ?></td>
                                            <td><span class="ayat"><?php echo $text_ayat; ?></span></td>
                                            <td><?php echo $text_id; ?> <br><small><i><?php echo $text_en; ?></i></small></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tafsir<?php echo $nomor_ayat; ?>">
                                                    Tafsir
                                                </button>
                                                <!--  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#en<?php echo $nomor_ayat; ?>">
                                        ENGLISH
                                    </button> -->
                                                <!-- Modal -->
                                                <div class="modal fade" id="tafsir<?php echo $nomor_ayat; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tafsir Kemenag Surat <?php echo $nama; ?> Ayat <?php echo $nomor_ayat; ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> <?php echo $tafsir[$nomor_ayat]; ?></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="en<?php echo $nomor_ayat; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">ENGLISH Surah <?php echo $nama_arti_ar; ?> (<?php echo $nama_arti_en; ?>) Verse <?php echo $nomor_ayat; ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><?php echo $text_en; ?></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else {
                        ?>
                            <table class="table w-100 d-block d-md-table">
                                <thead>
                                    <tr>
                                        <th scope="col"><span class="surat">Surat <?php echo $nama; ?> ( <?php echo $nama_arti_id; ?> | <?php echo $nama_arti_en; ?> ) | Nomor surat: <?php echo $surat_ke; ?> | Jumlah Ayat: <?php echo $jumlah_ayat; ?></span> | Diturunkan di <?php if ($turun_surat == 'Mecca') { echo "Makkah"; } else { echo "Madinah";} ?> | Jenis Surat: <?php echo $jenis_surat; ?></th>
                                    <tr>
                                    <tr>
                                        <th <th scope="col">Qari: <?php echo $qori1; ?>
                                            <br>
                                            <audio controls>
                                                <source src="<?php echo $qori1_mp3; ?>" type="audio/ogg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        </th>
                                    </tr>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($ayats as $ayat) {
                                    $nomor_ayat = $ayat['number'];
                                    $text_ayat  = $ayat['text'];
                                    $text_en    = $ayat['translation_en'];
                                    $text_id    = $ayat['translation_id'];
                                ?>
                                    <tr>
                                        <td>Ayat <?php echo $nomor_ayat; ?><br>
                                            <span class="ayat"><?php echo $text_ayat; ?></span><br><?php echo $text_id; ?> <br><small><i><?php echo $text_en; ?></i></small><br>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tafsir<?php echo $nomor_ayat; ?>">
                                                Tafsir
                                            </button>
                                            <!--  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#en<?php echo $nomor_ayat; ?>">
                                        ENGLISH
                                    </button> -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="tafsir<?php echo $nomor_ayat; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tafsir Kemenag Surat <?php echo $nama; ?> Ayat <?php echo $nomor_ayat; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> <?php echo $tafsir[$nomor_ayat]; ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="en<?php echo $nomor_ayat; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">ENGLISH Surah <?php echo $nama_arti_ar; ?> (<?php echo $nama_arti_en; ?>) Verse <?php echo $nomor_ayat; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?php echo $text_en; ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                                <tbody>
                                </tbody>
                            </table>
                    </div>
                <?php  } ?>
                <!-- ---------------------------- konten utama  2021-11-02 jam 11:13:50.000-05:00----------------------------- -->
                </div>
            </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
    /* -------------------------------- if not ok ------------------------------- */
} else {
    //echo 'FORBIDDEN';
    header('Location: ./');
    exit;
}
?>