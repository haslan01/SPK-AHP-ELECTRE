<?php include'koneksi.php';?>
<?php include'header.php';?>
	<div id="content-analisa">
	<?php include'sidebar.php';?>
	<div id="artikel"><h1>Hasil Analisa Kriteria</h1><br>
	
	<div id="isi">
<?php



$jml=$_POST['jml_data'];
  $kolom=$jml+1;
  $bawah=$kolom+1;
  $x=1;
 
  $record=mysqli_query($conn,"SELECT Nama_Kriteria FROM kriteria");


  $ar1 = array();
 
  $ar2=array('&nbsp;',
  'KPS',
  'PKH',
  'Panti Asuhan',
  'Korban Bencana',
  'SKTM',
  'Kesulitan Biaya',
  'Yatim/Piatu',
  'Penghasilan Ortu',
  'Prestasi',
  'Rata-Rata Raport',
  'Jumlah Saudara',
  'Rekening Listrik',
  'Kelainan Fisik',
  'Kelas',
  'Pekerjaan Ortu');
  echo "<b><h3>Matriks Faktor Pembobotan Hirarki untuk semua kriteria yang didesimalkan</h3></b><br>";
  echo "<table border='1'>";
   for ($i=0; $i<$bawah; $i++) { 

     echo "<tr>";
     for ($j=0; $j<$kolom; $j++) { 
            

        if($i==0){
           if(($i==0) && ($j==0)){
             echo "<td style='width:50px'></td>";
           } 
           else {
              if($j==$kolom){
                echo "<td style='width:80px;background-color:#fff;text-align:center;'>Vektor Weight</td>";
              }
              else {
                $row=mysqli_fetch_array($record);
                echo "<td style='width:50px;background-color:#FFF;text-align:center'>".$ar1[]=$row['Nama_Kriteria']."</td>";

              }

              
           }

        }

        else {
          if($j==0){

            if($i==$kolom){

            	if($j==0){
            	   echo "<td style='width:50px;text-align:center;'>&Sigma;</td>";	
            	}
            	else{
            	  echo "<td style='width:50px;background-color:#FFF;text-align:center;'>".$kolom1[1]."</td>";		
            	}
              
            	
            }
            else{
         
                echo "<td style='width:50px;background-color:#FFF;text-align:center;'>".$ar2[$j]."</td>";	
            }
          }
          else if($i==$j){
            echo "<td style='width:50px;background-color:#000; color:#fff'>1</td>";
              $ar2[$j]=1;
            
          }
          else if($j>$i){
            echo "<td style='width:50px;background-color:#D3D3D3'>".$_POST['t-'.$i."-".$j]."</td>";
            $ar2[$j]=$_POST['t-'.$i."-".$j];
           }

          else {
              if($i==$kolom){
            	if($j!=0){            	   
            	  $jumlah=0;	
            	   for($y=1;$y<=$jml;$y++){
            	   	  $jumlah=$jumlah+$ar1[$y][$j];
					  $jumlah2=$jumlah2+$ar1[$y][$j];
            	   }
            	   echo "<td style='width:50px'>";
            	   echo number_format($jumlah,3)."</td>";
            	   $sigma[$j]=$jumlah;
				   $sigma2[$j]=$jumlah2;
            	}
            	
            }
            else {
            	 echo "<td style='width:50px;background-color:#D3D3D3'>".number_format((1/$_POST['t-'.$j."-".$i]),3)."</td>";
            	 $ar2[$j]=(1/$_POST['t-'.$j."-".$i]);
             }        
          
          }
        }
     }
     
     $ar1[$i]=$ar2;
   
    
     echo "</tr><input type='hidden' id='jml_data' name='jml_data' value='$jml' />";
    }
    echo "</table>";

   //tabel 2
  $jml=$_POST['jml_data'];
  $kolom=$jml+1;
  $bawah=$kolom+1;
  $x=1;
 $ar1=array('&nbsp;',
  'KPS',
  'PKH',
  'Panti Asuhan',
  'Korban Bencana',
  'SKTM',
  'Kesulitan Biaya',
  'Yatim/Piatu',
  'Penghasilan Ortu',
  'Prestasi',
  'Rata-Rata Raport',
  'Jumlah Saudara',
  'Rekening Listrik',
  'Kelainan Fisik',
  'Kelas',
  'Pekerjaan Ortu');
  $ar2=array('&nbsp;',
  'KPS',
  'PKH',
  'Panti Asuhan',
  'Korban Bencana',
  'SKTM',
  'Kesulitan Biaya',
  'Yatim/Piatu',
  'Penghasilan Ortu',
  'Prestasi',
  'Rata-Rata Raport',
  'Jumlah Saudara',
  'Rekening Listrik',
  'Kelainan Fisik',
  'Kelas',
  'Pekerjaan Ortu');
  echo "<br><b><h3>Matriks Faktor Pembobotan Hirarki untuk semua kriteria yang dinormalkan</h3></b><br>";
  echo "<table border='1'>";
   for ($i=0; $i<$kolom; $i++) { 
     echo "<tr>";
     for ($j=0; $j<$bawah; $j++) { 
        if($i==0){
           if(($i==0) && ($j==0)){
             echo "<td style='width:50px'></td>";
           } 
           else {
           	  if($j==$kolom){
           	  	echo "<td style='width:80px;background-color:#fff;text-align:center;'>Vektor Weight</td>";
           	  }
           	  else {
           	  	echo "<td style='width:50px;background-color:#FFF;text-align:center'>".$ar1[$j]."</td>";
           	  }
              
           }
        }
        else {
          if($j==0){
            
                echo "<td style='width:50px;background-color:#FFF;text-align:center;'>".$ar1[$i]."</td>";	
           
          }
           else if($j>$i){
          	 if($j>=$kolom){
          	 	$ar1[$i]=$ar2;
          	 	$jumlah=0;	
            	   for($y=1;$y<=$jml;$y++){
            	   	   
            	   	   	  $jumlah=$jumlah+$ar1[$i][$y];
            	   	  
            		  }
            	    $eigen=$jumlah;
                    $mak[$i]=$eigen;
          	    echo "<td style='width:50px;background-color:#fff'>".number_format($eigen,3)."</td>";
             }
             else {
             echo "<td style='width:50px;background-color:#D3D3D3'>".$_POST['t-'.$i."-".$j]."</td>";
            $ar2[$j]=$_POST['t-'.$i."-".$j];
              
             }
      
          }

          else if($i==$j){
            echo "<td style='width:50px;background-color:#000; color:#fff'>1</td>";
              $ar2[$j]=1;
            
          }
       
          else {
             
            	 echo "<td style='width:50px;background-color:#D3D3D3'>".number_format((1/$_POST['t-'.$j."-".$i]),3)."</td>";
            	 $ar2[$j]=(1/$_POST['t-'.$j."-".$i]);
        
          }
        }
     }
     
     $ar1[$i]=$ar2;
   
    
     echo "</tr>";
    }
    echo "</table><br/>";
  
  
  
  //tabel 3
  
  //tabel 2
  $jml=$_POST['jml_data'];
  $kolom=$jml+1;
  $bawah=$kolom+1;
  $x=1;
 $ar1=array('&nbsp;',
  'KPS',
  'PKH',
  'Panti Asuhan',
  'Korban Bencana',
  'SKTM',
  'Kesulitan Biaya',
  'Yatim/Piatu',
  'Penghasilan Ortu',
  'Prestasi',
  'Rata-Rata Raport',
  'Jumlah Saudara',
  'Rekening Listrik',
  'Kelainan Fisik',
  'Kelas',
  'Pekerjaan Ortu');
  $ar2=array('&nbsp;',
  'KPS',
  'PKH',
  'Panti Asuhan',
  'Korban Bencana',
  'SKTM',
  'Kesulitan Biaya',
  'Yatim/Piatu',
  'Penghasilan Ortu',
  'Prestasi',
  'Rata-Rata Raport',
  'Jumlah Saudara',
  'Rekening Listrik',
  'Kelainan Fisik',
  'Kelas',
  'Pekerjaan Ortu');
  echo "<br><b><h3>Menghitung Konsistensi Bobot</h3></b><br>";
  echo "<table border='1'>";
   for ($i=0; $i<$kolom; $i++) { 
     echo "<tr>";
     for ($j=0; $j<$bawah; $j++) { 
        if($i==0){
           if(($i==0) && ($j==0)){
             echo "<td style='width:50px'></td>";
           } 
           else {
           	  if($j==$kolom){
           	  	echo "<td style='width:80px;background-color:#fff;text-align:center;'>Vektor Weight</td>";
           	  }
           	  else {
           	  	echo "<td style='width:50px;background-color:#FFF;text-align:center'>".$ar1[$j]."</td>";
           	  }
              
           }
        }
        else {
          if($j==0){
            
                echo "<td style='width:50px;background-color:#FFF;text-align:center;'>".$ar1[$i]."</td>";	
           
          }
           else if($j>$i){
          	 if($j>=$kolom){
          	 	$ar1[$i]=$ar2;
          	 	$jumlah2=0;	
            	   for($y=1;$y<=$jml;$y++){
            	   	   
            	   	   	  $jumlah2=$jumlah2+$ar1[$i][$y];
            	   	  
            		  }
            	    $eigen2=$jumlah2/$jml;
                    $mak[$i]=$eigen2;
          	    echo "<td style='width:50px;background-color:#fff'>".number_format($eigen2,3)."</td>";
             }
             else {
             	echo "<td style='width:50px;background-color:#D3D3D3'>".number_format(($_POST['t-'.$i."-".$j]/$sigma2[$j]*$eigen2),3)."</td>";
             	$ar2[$j]=($_POST['t-'.$i."-".$j]/$sigma2[$j]*$eigen2);
              
             }
      
          }

          else if($i==$j){
            echo "<td style='width:50px;background-color:#000; color:#fff'>".number_format(1*($sigma2[$j]),3)."</td>";
              $ar2[$j]=(1*$sigma2[$j]);
            
          }
       
          else {
             
            	 echo "<td style='width:50px;background-color:#D3D3D3'>".number_format(((1/$_POST['t-'.$j."-".$i])/$sigma2[$j]*$eigen2),3)."</td>";
            	 $ar2[$j]=((1/$_POST['t-'.$j."-".$i])/$sigma2[$j]*$eigen2);
        
          }
        }
     }
     
     $ar1[$i]=$ar2;
   
    
     echo "</tr>";
    }
    echo "</table><br/>";
  
  
  
	$maks=0;
    for ($i=1; $i <=$jml ; $i++) { 
    	$maks=($maks+(($sigma2[$i]))/$jml);
    	//echo $sigma[$i].",".$mak[$i];
    }
    echo "&lambda; maksimum = ".number_format($maks,3)."<br>";
    echo "CI = ";
    $ci=number_format((($maks-$jml)/($jml-1)),3);
    echo "$ci<br>";
    if($jml==1){
    	$ri=0;
    }
    else if($jml==2){
    	$ri=0;
    }
     else if($jml==3){
    	$ri=0.58;
    }
     else if($jml==4){
    	$ri=0.9;
    }
     else if($jml==5){
    	$ri=1.12;
    }
     else if($jml==6){
    	$ri=1.24;
    }
     else if($jml==7){
    	$ri=1.32;
    }
     else if($jml==8){
    	$ri=1.41;
    }
     else if($jml==9){
    	$ri=1.45;
    }
     else if($jml==10){
    	$ri=1.49;
    }
     else if($jml==11){
    	$ri=1.51;
    }
     else if($jml==12){
    	$ri=1.48;
    }
     else if($jml==13){
    	$ri=1.56;
    }
     else if($jml==14){
    	$ri=1.57;
    }
     else if($jml==15){
    	$ri=1.59;
    }
    $cr=number_format(($ci/$ri),3);

    if($cr<0.1){
    	echo "<div style='background-color:#00FFFF;width:500px;font-size:20px'>CR = $ci/$ri = <b>$cr</b> , Preferensi responden adalah KONSISTEN<br><br></div>";
    }
    else if($cr>0.1){
    	echo "<div style='background-color:#FFB6C1;width:500px;font-size:20px'>CR = $ci/$ri = <b>$cr</b> , Preferensi responden adalah TIDAK KONSISTEN<br><br></div>";
    }

 
    
?>

</div>
</div>