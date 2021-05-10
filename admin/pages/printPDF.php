<?php
include('../admin/lib/php/pg_connect.php');
include('../admin/lib/php/classes/Jeux.class.php');
include('../admin/lib/php/classes/JeuxBD.class.php');

$cnx = Connexion::getInstance($dsn, $user, $password);
$j = array();
$jeux = new JeuxBD($cnx);
$listeJeux = $jeux->getJeuxById($_GET['idjeu']);
$nbr = count($listeJeux);

$u = array();
$user = new UserBD($cnx);
$listeUser = $user->getClientById2($_SESSION['iduser']);
$nbr2 = count($listeUser);

include('./lib/php/TCPDF/tcpdf.php');
$pdf = new TCPDF('P','mm','A4');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();
$pdf->SetFont('helvetica','B',18,);
$pdf->SetTextColor(255,0,0);
$pdf->Cell('190','10','Détail en pdf du jeu',1,1,'C');
$pdf->SetFont('helvetica','B',16);
$pdf->SetTextColor(0,0,0);

for($i=0 ; $i<$nbr ; $i++){
    $pdf->WriteHTMLCell('120','10',30,35,"Demandeur du pdf",0,0,'0','1','L');
    $pdf->SetFont('helvetica','',12);
    $pdf->WriteHTMLCell('120','10',30,45,"Nom : ",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',45,45,$listeUser[$i]->nom,0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',30,55,"Prénom : ",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',50,55,$listeUser[$i]->prenom,0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',30,65,"Mail : ",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',45,65,$listeUser[$i]->mail,0,1,'0','1','L');

}
$pdf->WriteHTMLCell('180','10',15,70,"",'B',1,'0','1','L');

for($i=0 ; $i<$nbr ; $i++){
    $pdf->WriteHTMLCell('180','80',15,95,"",'1',1,'0','1','L');
    $pdf->SetFont('helvetica','B',16);
    $pdf->WriteHTMLCell('120','10',40,100,$listeJeux[$i]->nomjeu,0,0,'0','1','C');
    $pdf->SetFont('helvetica','',12);
    $pdf->WriteHTMLCell('100','10',30,120,"Plateforme : ",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',70,120,$listeJeux[$i]->plateforme,0,0,'0','1','L');
    $pdf->WriteHTMLCell('100','10',30,130,"Editeur : ",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',70,130,$listeJeux[$i]->editeur,0,0,'0','1','L');
    $pdf->WriteHTMLCell('100','10',30,140,"Année de sortie : ",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',70,140,$listeJeux[$i]->anneesortie,0,0,'0','1','L');
    $pdf->WriteHTMLCell('100','10',30,150,"Encodeur du jeu : ",0,0,'0','1','L');
    $pdf->WriteHTMLCell('120','10',70,150,$listeJeux[$i]->encodeur,0,0,'0','1','L');
}

$pdf->WriteHTMLCell('180','10',15,260,"",'1',1,'0','1','L');
$pdf->WriteHTMLCell('180','10',15,263,"Responsable : remi.martens@condorcet.be",0,1,'0','1','C');
ob_end_clean();
$pdf->Output();