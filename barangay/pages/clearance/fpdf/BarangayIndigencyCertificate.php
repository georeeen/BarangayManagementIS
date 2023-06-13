<?php

require('FPDF.php');

class BarangayIndigencyCertificate extends FPDF {
    private $headerData;

    public function setHeaderData($data) {
        $this->headerData = $data; // Set the header data
    }

    function Header() {
        $orNo = $this->headerData['orNo'];
        
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 5, 'Official Receipt No. ' . $orNo, 0, 1, 'L');

        $this->Ln(7);

        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 5, 'Barangay Tangos North', 0, 1, 'C');
        $this->Cell(0, 5, 'Navotas', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 13);
        $this->Cell(0, 20, 'CERTIFICATE OF INDIGENCY', 0, 1, 'C');
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
        $this->Cell(0, 8, 'This is to certify that ' . $data['name'] . ' of legal age, ' . strtolower($data['gender']) . ', ' . strtolower($data['maritalstatus']) . ', ' . $data['nationality'] . ', is', 0, 1, 'C');

        $this->SetLeftMargin(40);
        $this->Cell(0, 3, 'a resident of this barangay is one of the indigents in our barangay.', 0, 1);

        $this->Ln(5);

        $this->SetLeftMargin(40);
        $this->Cell(0, 8, 'This certification is being issued upon the request of the above-named person for', 0, 1, 'C');
        $this->Cell(0, 3, 'whatever legal purpose it may serve her ' . $data['gender'] == "MALE" ? "his best." : "her best.", 0, 1);


        $this->Ln(5);
        $this->Cell(0, 8, 'Issued this ' . date('d') . ' day of' . date('F Y') . ' at the Office of Punong Barangay, ', 0, 1, 'C');

        $this->SetLeftMargin(40);
        $this->Cell(0, 3, 'Barangay Tangos North, Navotas City, Philippines', 0, 1);

        $this->Ln(15);

        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, 'MARGARITA PACRES LIMBANO', 0, 1, 'R');
        $this->SetFont('Arial', '', 10);

        $this->SetRightMargin(40);
        $this->Cell(0, 3, 'Punong Barangay', 0, 1, 'R');

        $this->Ln(5);

        $this->SetLeftMargin(40);
        $this->Cell(0, 10, 'NB: No Seal Available', 0, 1, 'L');

    }
    
}


?>
