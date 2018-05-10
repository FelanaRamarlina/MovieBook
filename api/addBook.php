<?php
require('../sources/lib/fpdf/fpdf.php');

class PDF extends FPDF {

    private $params;
    private $sheets;
    public $title;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4')
    {
        parent::__construct($orientation, $unit, $size);
        $this->params = json_decode(file_get_contents('php://input'), true);
        $this->sheets = $this->params[0];
        $this->title = $this->params[1]['bookTitle'];

    }

    public function build() {

        $this->SetFont('helvetica','',12);

        foreach ($this->sheets as $sheet) {
            $this->buildRow($sheet['title'], $sheet['nationality'], $sheet['director'], $sheet['date'], $sheet['synopsis'], $sheet['image']);
        }
    }

    private function buildRow($titre, $nat, $aut, $date, $syn, $img) {

        $this->SetLeftMargin(0);
        $this->SetRightMargin(0);
        $this->SetTopMargin(0);

        $this->AddPage();

        $this->SetTextColor(255, 255, 255);
        $this->SetFillColor(244, 65, 65);
        $this->Cell(0, 20, $titre, 0, 1, "C", true);

        $this->SetLeftMargin(10);
        $this->SetRightMargin(10);

        $this->SetTextColor(0, 0, 0);
        $this->Ln(10);
        $this->Image("../sources/resources/img/".$img, null, null, 70, 100);
        $this->Text(90, 34, "Titre : ");
        $this->Text(130, 34, utf8_decode($titre));

        $this->Text(90, 44, utf8_decode("Nationalitée : "));
        $this->Text(130, 44, utf8_decode($nat));

        $this->Text(90, 54, "Auteur : ");
        $this->Text(130, 54, utf8_decode($aut));

        $this->Text(90, 64, "Date de sortie : ");
        $this->Text(130, 64, $date);

        $this->Ln(10);
        $this->Cell(0, 10, "Synopsis", 0, 1, "C", false);
        $this->Cell(0, 1, "", 0, 1, "C", true);
        $this->Ln(5);
        $this->MultiCell(0, 8, utf8_decode($syn), 0, 1, false);
        $this->Ln(5);
        $this->Cell(0, 1, "", 0, 1, "C", true);
    }
}

$pdf = new PDF();
$pdf->build();

$build_date = strtotime('now');

$pdf->Output("F", "../sources/resources/books/book_".$build_date.".pdf", true);

echo json_encode(array(
   "message_status" => "book added",
   "validate" => 1,
    "url_book" => "MovieBook/sources/resources/books/book_".$build_date.".pdf"
));
?>