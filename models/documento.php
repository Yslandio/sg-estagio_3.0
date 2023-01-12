<?php

if (isset($_POST["exportar_documento_pdf"])) {
    require_once "../vendor/autoload.php";

    $img_campus_petrolina = "../assets/img/campus_petrolina.png";
    $img_escudo_brasil = "../assets/img/escudo_brasil.png";

    include("../components/documento.php");

    $mpdf = new \Mpdf\Mpdf(['margin_top' => 45, 'margin_bottom' => 25, 'margin_header' => 12]);
    $mpdf->SetHTMLHeader($cabecalho);
    $mpdf->SetHTMLFooter($rodape);
    $mpdf->WriteHTML($html);
    $mpdf->Output("documento.pdf", "I");
}

if (isset($_POST["exportar_documento_doc"])) { // Não está funcionando, não entra na condicional!
    // require_once "../vendor/autoload.php";

    // $img_campus_petrolina = "../assets/img/campus_petrolina.png";
    // $img_escudo_brasil = "../assets/img/escudo_brasil.webp";

    // include("../components/documento.php");

    // $phpWord = new \PhpOffice\PhpWord\PhpWord();
    // $section = $phpWord->addSection();
    // $section->addText(
    //     $html
    //     // file_get_contents("../components/documento.php")
    // );
    // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    // $objWriter->save("documento.docx");
}

header("Location: ../documento.php");