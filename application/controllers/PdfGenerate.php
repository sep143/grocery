<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class PdfGenerate extends CI_Controller{
    function __construct()
    { 
        parent::__construct();
        
        $this->load->library('pdf');
        //$this->load->model('PdfGenerate_model', 'Pdf_model');
    } 
    
    function index($ency) {
        // set some language-dependent strings (optional)
        $pdf = new Pdf('P','A4', TRUE, 'UTF-8', false);
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
       // set document information
       $pdf->SetCreator(PDF_CREATOR);
       $pdf->SetAuthor('Nicola Asuni');
       $pdf->SetTitle('YellowVdo');
       $pdf->SetSubject('TCPDF Tutorial');
       $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

       //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
       $pdf->setFooterData(array(0,64,0), array(0,64,128));

       // set header and footer fonts
       $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
       $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

       // set default monospaced font
       $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

       // set margins
       //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
       //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
       $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

       // set auto page breaks
       $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

       // set image scale factor
       $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

       // set some language-dependent strings (optional)
       if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
           require_once(dirname(__FILE__).'/lang/eng.php');
           $pdf->setLanguageArray($l);
       }
           //$pdf->AddPage('P', 'A4');
           $pdf->AddPage();

           //$pdf->Cell(0, 0, 'A4 PORTRAIT', 1, 1, 'C');
           // $subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';
           $html = '<table WIDTH="600" height="100%" cellspacing="0">
                                <tr><td></td></tr>
                                <tr>
                                    <td width="400">&nbsp;&nbsp;&nbsp;<img src="image/app_logo.png" style="width:auto; height:100px;"></td>
                                    <td width="200" align="center"><h3><b>Invoice</b></h3>
                                       <table border="0" cellspacing="2" cellpadding="0" align="left" style="font-size:13px;">
                                        <tbody align="">
                                            <tr><td>Invoice No.</td><td> : invoice#001 </td></tr>
                                            <tr><td>Invoice Date</td><td> : date</td></tr>
                                            <tr><td colspan="2">ABN- 33118735308</td><td></td></tr>
                                            <!--<tr><td>Payment Mode</td><td> : </td></tr>-->
                                        </tbody>
                                    </table> 
                                    </td>
                                </tr>
                            </table>&nbsp;<br><br>
                            <table border="1" cellspacing="0" cellpadding="5">
                                <thead>
                                    <tr style="background-color:gray; color:white;" align="">
                                        <th>Our Info : </th>
                                        <th>Customer : </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="color:#565656; font-weight: lighter; font-size: 13px;">
                                        <td><h4 >HAABSOFT Corporation</h4>
                                            <p>78 Hickford St, 
                                            Reservoir VIC 3073, 
                                            <br>Australia</p>
                                            <lable>Email : haabsoft@gmail.com</lable>
                                            
                                        </td>
                                        <td><h4>Owner Name : Full name</h4>
                                            <p>address : AddressEnter</p>
                                            <lable>Email : EmailUsername</lable>
                                            <lable><br>Mobile : +91789456123</lable>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>&nbsp;<br><br>
                            <table width="670" border="0" cellspacing="0" cellpadding="5" style="background-color:#f4f4f4">
                                <thead>
                                    <tr style="background-color:gray; color:white;" align="">
                                        <th width="365">Description</th>
                                        <th width="90">Price</th>
                                        <th width="90">TAX</th>
                                        <!--<th width="80">Discount</th>-->
                                        <th width="120">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="color:#272727; font-weight: lighter; font-size: 13px;">
                                        <td width="365">Bus name<br><small style="font-size:10px;">caption line</small></td>
                                        <td width="90">100.00</td>
                                        <td width="90">02.00</td>
                                        <!--<td width="80">0.00</td>-->
                                        <td width="120">102.00</td>
                                    </tr>
                                </tbody>
                            </table>&nbsp;<br>
                            <table style="border: 1px solid #ccc8c8">
                                <tr>
                                    <td></td>
                                    <td>
                                        <table cellspacing="0" cellpadding="4" style="background-color:#f4f4f4; color:#272727; font-weight: lighter; font-size: 13px;">
                                            <tbody>
                                                <tr>
                                                    <td>Summary : </td><td></td>
                                                </tr>
                                                <tr>
                                                    <td>Sub Total :</td><td>100.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Tax :</td><td>02.00</td>
                                                </tr>
                                                <!--<tr>
                                                    <td>Discount :</td><td>0.00</td>
                                                </tr>-->
                                                <tr style="background-color:gray; color:white; ">
                                                    <td>Total Amount :</td><td>102.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table style="color:#272727; font-weight: lighter; font-size: 13px;">
                                <tr>
                                    <td></td>
                                    <td align="center">
                                        <h4>Authorized person</h4>
                                        <img src="image/app_logo.png" style="width:auto; height:70px; opacity: 0.2; opacity: inherit;">
                                        <lable><br>(Yellow Vdo)</lable>
                                        <lable><br>Sales Person</lable>
                                    </td>
                                </tr>
                            </table><hr>
                            <table style="color:#565656; font-weight: lighter; font-size: 13px;">
                                <tr>
                                    <td>
                                        <p><b>Terms:<br>Payment Due On Receipt<br>1. Prices And Payment</b>
                                        Payments are to be made in U.S funds. Unless otherwise specified all invoices are due net 30 days from
                                        date of Shipment.
                                        </p>
                                    </td>
                                </tr>
                            </table>';

           $pdf->WriteHTML($html, true, false, true, false, '');
           // Print some HTML Cells

       //$html = '<span color="red">Term & Condition</span> ';

       $pdf->SetFillColor(255,255,0);
//       $pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);
//       $pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 1, true, 'C', true);
//       $pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'R', true);
//           ob_clean();
           ob_end_clean();
           $pdf->Output('check.pdf', 'I'); 
        
    }
    
    /*
     * old html design code only
     * $html = '<table WIDTH="600" height="100%" cellspacing="0">
                                <tr><td></td></tr>
                                <tr>
                                    <td width="400">&nbsp;&nbsp;&nbsp;<img src="image/app_logo.png" style="width:auto; height:100px;"></td>
                                    <td width="200" align="center"><h3><b>Invoice</b></h3>
                                       <table border="0" cellspacing="2" cellpadding="0" align="left" style="font-size:13px;">
                                        <tbody align="">
                                            <tr><td>Invoice No.</td><td> : invoice#'.$data_use->ID.' </td></tr>
                                            <tr><td>Invoice Date</td><td> : '.date('d-M-Y', strtotime($data_use->CreatedDT)).'</td></tr>
                                            <tr><td colspan="2">ABN- 33118735308</td><td></td></tr>
                                            <!--<tr><td>Payment Mode</td><td> : </td></tr>-->
                                        </tbody>
                                    </table> 
                                    </td>
                                </tr>
                            </table>&nbsp;<br><br>
                            <table border="1" cellspacing="0" cellpadding="5">
                                <thead>
                                    <tr style="background-color:gray; color:white;" align="">
                                        <th>Our Info : </th>
                                        <th>Customer : </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="color:#565656; font-weight: lighter; font-size: 13px;">
                                        <td><h4 >HAABSOFT Corporation</h4>
                                            <p>78 Hickford St, 
                                            Reservoir VIC 3073, 
                                            <br>Australia</p>
                                            <lable>Email : haabsoft@gmail.com</lable>
                                            
                                        </td>
                                        <td><h4>Owner Name : '.$advertiser->FirstName .' '.$advertiser->LastName.'</h4>
                                            <p>address : '.$advertiser->LandmarkAddress.','.$advertiser->Address.'</p>
                                            <lable>Email : '.$advertiser->UserName.'</lable>
                                            <lable><br>Mobile : '.$advertiser->Phone.'</lable>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>&nbsp;<br><br>
                            <table width="670" border="0" cellspacing="0" cellpadding="5" style="background-color:#f4f4f4">
                                <thead>
                                    <tr style="background-color:gray; color:white;" align="">
                                        <th width="365">Description</th>
                                        <th width="90">Price</th>
                                        <th width="90">TAX</th>
                                        <!--<th width="80">Discount</th>-->
                                        <th width="120">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="color:#272727; font-weight: lighter; font-size: 13px;">
                                        <td width="365">'.$ads_data->BusinessName.'<br><small style="font-size:10px;">'.$ads_data->CaptionLine.'</small></td>
                                        <td width="90">'.$data_use->Amt.'</td>
                                        <td width="90">'.$data_use->Tax.'</td>
                                        <!--<td width="80">0.00</td>-->
                                        <td width="120">'.$data_use->TotalAmt.'</td>
                                    </tr>
                                </tbody>
                            </table>&nbsp;<br>
                            <table style="border: 1px solid #ccc8c8">
                                <tr>
                                    <td></td>
                                    <td>
                                        <table cellspacing="0" cellpadding="4" style="background-color:#f4f4f4; color:#272727; font-weight: lighter; font-size: 13px;">
                                            <tbody>
                                                <tr>
                                                    <td>Summary : </td><td></td>
                                                </tr>
                                                <tr>
                                                    <td>Sub Total :</td><td>'.$data_use->TotalAmt.'</td>
                                                </tr>
                                                <tr>
                                                    <td>Tax :</td><td>'.$data_use->Tax.'</td>
                                                </tr>
                                                <!--<tr>
                                                    <td>Discount :</td><td>0.00</td>
                                                </tr>-->
                                                <tr style="background-color:gray; color:white; ">
                                                    <td>Total Amount :</td><td>'.$data_use->TotalAmt.'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table style="color:#272727; font-weight: lighter; font-size: 13px;">
                                <tr>
                                    <td></td>
                                    <td align="center">
                                        <h4>Authorized person</h4>
                                        <img src="image/app_logo.png" style="width:auto; height:70px; opacity: 0.2; opacity: inherit;">
                                        <lable><br>(Yellow Vdo)</lable>
                                        <lable><br>Sales Person</lable>
                                    </td>
                                </tr>
                            </table><hr>
                            <table style="color:#565656; font-weight: lighter; font-size: 13px;">
                                <tr>
                                    <td>
                                        <p><b>Terms:<br>Payment Due On Receipt<br>1. Prices And Payment</b>
                                        Payments are to be made in U.S funds. Unless otherwise specified all invoices are due net 30 days from
                                        date of Shipment.
                                        </p>
                                    </td>
                                </tr>
                            </table>';
     */
}