<?php require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

if(!empty($_POST['ville'])){
  $ville = htmlspecialchars($_POST['ville']);
  $html2pdf = new Html2Pdf('p', 'A4', 'fr');


  $html = "<page>
  <page_header>
  d'ou venez vous
  </page_header>
  <br />
  je viens de $ville
  <page_footer></page_footer>

  </page>";

$html2pdf->writeHTML($html);
$html2pdf->output('ma-ville.pdf');
};
?>
