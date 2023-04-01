<?php 
include'koneksi.php';
 if (isset($_POST['simpan'])) {
   var_dump($_POST);die();
 }


?>
<?php include'header.php';?>
<style>
  table input[type=text]{
    font-size: 15px;
    font-weight: bold;
  }
</style>
<div id="content-analisa">
	<?php include'sidebar.php';?>
  <div id="artikel-analisa"><h1>Analisa Kriteria</h1><br>
	<div id="pesan"></div>
    <div id="isi">
	       <table style="font-size: 20px; font-weight: bold; border: 1px solid black;" width="100%" cellspacing="20px" cellpadding="20px">
            <tr>
              <td></td>
              <td>Tes</td>
              <td>Interview</td>
              <td>Observasi</td>
            </tr>
            <tr>
              <td>Tes</td>
              <td>1.0</td>
              <td><input type="text" id="tes-interview"></td>
              <td><input type="text" id="tes-obser"></td>
            </tr>
            <tr>
              <td>Interview</td>
              <td><input type="text" id="interview-tes"></td>
              <td>1.0</td>
              <td><input type="text" id="inter-obser"></td>
            </tr>
            <tr>
              <td>Observasi</td>
              <td><input type="text" id="obser-tes"></td>
              <td><input type="text" id="obser-inter"></td>
              <td>1.0</td>
            </tr>
            <tr>
              <td>Jumlah</td>
              <td><input type="text" id="tes"></td>
              <td><input type="text" id="inter"></td>
              <td><input type="text" id="obser"></td>
            </tr>
          </table>
          <div id="form">
            <button type="button" style="background: red; color:white; border: 1px solid #999; margin: 20px 10px; padding: 5px; width: 100px;" id="proses">Analisa</button>
            <button type="button" style="background: red; color:white; border: 1px solid #999; margin: 20px 10px; padding: 5px; width: 100px;" id="analisa">Hitung Total</button>
          </div>
        <div id="form-analisa">
          
        </div>
      </div>	
	</div>
</div>
<script src="css/jquery.js"></script>
<script>
  $(function(){
    $('#interview-tes').keyup(function(event) {
      const interview_tes = $(this).val();
      $('#tes-interview').val(1/interview_tes);
    });

    $('#tes-interview').keyup(function(event) {
      const tes_interview = $(this).val();
      $('#interview-tes').val(1/tes_interview);
    });

    $('#obser-tes').keyup(function(event) {
      const obser_tes = $(this).val();
      $('#tes-obser').val(1/obser_tes);
    });

    $('#tes-obser').keyup(function(event) {
      const tes_obser = $(this).val();
      $('#obser-tes').val(1/tes_obser);
    });

    $('#obser-inter').keyup(function(event) {
      const obser_inter = $(this).val();
      $('#inter-obser').val(1/obser_inter);
    });

    $('#inter-obser').keyup(function(event) {
      const inter_obser = $(this).val();
      $('#obser-inter').val(1/inter_obser);
    });
    // ketikatombol analisadi klik
    $('#analisa').on('click', function(event) {
      const jumlahtes = ( Number($('#interview-tes').val()) + Number($('#obser-tes').val()) + 1 );
      $('#tes').val(jumlahtes);
      const jumlahob = ( Number($('#tes-obser').val()) + Number($('#inter-obser').val()) + 1 );
      $('#obser').val(jumlahob);
      const jumlahin = ( Number($('#tes-interview').val()) + Number($('#obser-inter').val()) + 1 );
      $('#inter').val(jumlahin);
      /* Act on the event */

      // ketika tombol proses di tekan
      $('#proses').on('click', function(event) {
        const tes = Number($('#tes').val());
        const int_tes = Number($('#interview-tes').val()) / tes;
        const obser_tes = Number($('#obser-tes').val()) / tes;
        const inter = Number($('#inter').val());
        const tes_inter = Number($('#tes-interview').val()) / inter;
        const obser_inter = Number($('#obser-inter').val()) / inter;
        const obser = Number($('#obser').val());
        const tes_obser = Number($('#tes-obser').val()) / obser;
        const inter_obser = Number($('#inter-obser').val()) / obser;
        const bob_tes = (tes + tes_inter + tes_obser) / 3;
        const bob_inter = (inter + int_tes + inter_obser) / 3;
        const bob_obser = (obser + obser_inter + obser_tes) / 3;
        $.ajax({
          url: 'bobot_edit.php',
          type: 'POST',
          data: {bob_tes: bob_tes,bob_inter: bob_inter,bob_obser: bob_obser},
        })
        .done(function() {
          // alert('Bobot Kriteria Berhasil di Update');
          $('#form-analisa').html(`
          <table style="font-size: 20px; font-weight: bold;" width="100%" cellpadding="20px" cellspacing="20px">
            <tr>
              <td></td>
              <td>Tes</td>
              <td>Interview</td>
              <td>Observasi</td>
            </tr>
            <tr>
              <td>Tes</td>
              <td>`+ 1 / tes +`</td>
              <td>`+ tes_inter +`</td>
              <td>`+ tes_obser +`</td>
            </tr>
            <tr>
              <td>Interview</td>
              <td>`+ int_tes +`</td>
              <td>`+ 1 / inter +`</td>
              <td>`+ inter_obser +`</td>
            </tr>
            <tr>
              <td>Observasi</td>
              <td>` + obser_tes + `</td>
              <td>`+ obser_inter +`</td>
              <td>`+ 1 / obser +`</td>
            </tr>
            <tr>
              <td>Bobot</td>
              <td><input type="text" name="bob_tes" value="`+ bob_tes +`"></td>
              <td><input type="text" name="bob_inter" value="`+ bob_inter +`"></td>
              <td><input type="text" name="bob_obser" value="`+ bob_obser +`"></td>
            </tr>
          </table>
          `);
          $('#pesan').html(`<div style="font-size:15px; width:100%; padding: 15px; background-color: red; color:white; margin: 20px 0px; font-weight: bold;">Bobot kriteria berhsil di ubah </div>`);


        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
        
        
        
      });
    });
  });
</script>
<?php include'footer.php';?>

