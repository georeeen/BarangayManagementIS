<?php

require('FPDF.php');

class BarangayClearanceReport extends FPDF {
    private $headerData;

    public function setHeaderData($data) {
        $this->headerData = $data; // Set the header data
    }

    function Header() {
        $clearanceNo = $this->headerData['clearanceNo'];
        $orNo = $this->headerData['orNo'];
        
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 5, 'Clearance No. ' . $clearanceNo, 0, 1, 'L');
        $this->Cell(0, 5, 'Official Receipt No. ' . $orNo, 0, 1, 'L');

        $this->Ln(7);

        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 5, 'Barangay Tangos North', 0, 1, 'C');
        $this->Cell(0, 5, 'Navotas', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 13);
        $this->Cell(0, 20, 'BARANGAY CLEARANCE', 0, 1, 'C');
    }
    
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    function GenerateReport($data) {
        $this->AddPage();
        $this->SetMargins(20, 30, 30);

        // Set font properties
        $this->SetFont('Arial', 'B', 10);

        // Output field labels
        $this->SetLeftMargin(40);
        $this->Cell(0, 10, 'TO WHOM IT MAY CONCERN:', 0, 1);

        // Set font properties
        $this->SetFont('Arial', '', 10);

        $this->Ln(5);
        $this->Cell(0, 8, 'This is to certify that ' . $data['name'] . ' with residence and postal address at', 0, 1, 'C');

        $this->SetLeftMargin(40);
        $this->Cell(0, 3, $data['address'] . ' has no derogatory record filled in', 0, 1);
        $this->Cell(0, 8, 'our Barangay Office.', 0, 1);

        $this->Ln(5);

        $this->SetLeftMargin(40);
        $this->Cell(0, 8, 'The above-named individual who is a bonafide resident of this barangay is', 0, 1, 'C');
        $this->Cell(0, 3, 'a person of good moral character, peace-loving and civic minded citizen', 0, 1);


        $this->Ln(5);
        $this->Cell(0, 8, 'This certification/clearance is hereby issued in connection with the             ', 0, 1, 'C');

        $this->SetLeftMargin(40);
        $this->Cell(0, 3, 'subject\'s application for ' . $data['purpose'] . ' and for whatever legal', 0, 1);
        $this->Cell(0, 8, 'purpose it may serve him/her best, and is valid for six (6) from the date issued.', 0, 1);

        $this->Ln(5);
        // Set font properties
        $this->SetFont('Arial', 'B', 10);
        $this->SetLeftMargin(40);
        $this->Cell(0, 10, 'NOT VALID WITHOUT OFFICAL SEAL', 0, 1);

        $this->SetFont('Arial', '', 10);

        $day = date("l", strtotime("today"));
        $date = date("F d, Y");
        
        $this->Cell(0, 10, 'Given this ' . $day . ", " . $date, 0, 1);

        $this->Ln(15);

        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, 'MARGARITA PACRES LIMBANO', 0, 1, 'R');
        $this->SetFont('Arial', '', 10);

        $this->SetRightMargin(40);
        $this->Cell(0, 3, 'Punong Barangay', 0, 1, 'R');

        $this->Ln(5);

        $this->SetLeftMargin(40);
        $this->Cell(0, 10, 'Signature of Applicant', 0, 1, 'L');
        $this->Cell(0, 10, '___________________', 0, 1, 'L');

        $this->Ln(10);
        $this->Cell(0, 8, 'CTC No. ___________', 0, 1, 'L');
        $this->Cell(0, 8, 'Issued at  ____________', 0, 1, 'L');
        $this->Cell(0, 8, 'Issued on ___________', 0, 1, 'L');
    }
    
}


?>
