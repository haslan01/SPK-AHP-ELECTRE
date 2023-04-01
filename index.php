<?php
require_once('includes/init.php');
$judul_page = 'Home';
require_once('template-parts/header.php');
?>
<br><br><br><br><br>
    <div class="container">
 <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="assets/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <h5>Sistem Pendukung Keputusan Pemilihan Program Studi</h5>
                    </div>
                    <div class="left-text">
                        <p>Sistem pendukung keputusan (SPK) merupakan suatu sistem pemilihan yang biasa dipakai untuk menentukan pilihan sesuai dengan kriteria dan alternatif yang sudah ditentukan sebelumnya.<br><br>
                         Berdasarkan proses wawancara yang dilakukan kepada siswa kelas XII SMA Negeri 2 MAJENE, banyak siswa yang memiliki keraguan dalam menentukan jurusan saat melanjutkan pendidikan ke tingkat perguruan tinggi.</p>
                        <div class="field-wrap clearfix">
                            <a href="bobot_kriteria.php" class=""><button type="submit" name="submit" value="submit" class="button">Mulai</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about2">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix">
                    <div class="left-heading">
                        <h5>PENERAPAN METODE AHP DAN ELECTRE</h5>
                    </div>
                    <p>Metode AHP digunakan untuk mencari bobot variabel kriteria (Priadana, 2018), sedangkan metode Electre digunakan untuk menentukan nilai akhir dan perangkingan.</p>
                    <ul>
                        <li>
                            <img src="assets/images/about-icon-02.png" alt="">
                            <div class="text">
                                <h6>Analytic Hierarchy Process (AHP) </h6>
                                <p>Logika Analytic Hierarchy Process (AHP) merupakan suatu metode pengukuran yang pertama kali dikembangkan oleh Thomas L. S.</p>
                            </div>
                        </li>
                        <li>
                            <img src="assets/images/about-icon-03.png" alt="">
                            <div class="text">
                                <h6>Elimination And Choice Expressing Reality (ELECTRE).</h6>
                                <p>Metode ELECTRE merupakan salah satu metode pengambilan keputusan multikriteria berdasarkan pada konsep perangkingan dengan menggunakan perbandingan berpasangan dari alternatif-alternatif berdasarkan setiap kriteria yang sesuai.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="assets/images/right-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->
 
    <!-- ***** Contact Us Start ***** -->
    <section class="section" id="contact-us">
        <div class="container">
            <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255013.31792935356!2d119.19621657424891!3d-2.9354612880258277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d9358e00db17001%3A0x3030bfbcaf76f30!2sKabupaten%20Majene%2C%20Sulawesi%20Barat!5e0!3m2!1sid!2sid!4v1665033046104!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

  </body>
</html>

<br>
<?php
require_once('template-parts/footer.php');
