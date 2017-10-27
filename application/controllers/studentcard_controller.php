<?php
class Studentcard_controller extends CI_Controller
{
	
	
	public function __construct() {
        parent::__construct();
        $this->load->library('ciqrcode');
        $this->load->library('QR_BarCode');
         $this->load->library('Pdf');
         $this->load->helper('download');
         $this->load->model('studentcard2017_model');
    }
    public function showSearchForCard(){
    
        $this->load->view('ikmc2017/findcard');
    }
    public function sendErrorForm(){
        $data['schools'] = $this->studentcard2017_model->get_all_schools();
        $this->load->view('ikmc2017/send_error_report', $data);

    }
    public function saveErrorReport(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d h:i:s', time());
        if(isset($_POST['error_content'])){
            $error_content = $_POST['error_content'];
        }else{
            $error_content = "";
        }
        $data = array(
            'studentname' => $_POST['fullname'],
            'student_birthday' => $_POST['birthday'],
            'student_school_id' => $_POST['school'],
            'student_email' => $_POST['email'],
            'student_phone_number' => $_POST['phone'],
            'classroom' => $_POST['classroom'],
            'sent_date' => $date,
            'error_content' => $error_content
            );
        $this->studentcard2017_model->saveErrorReport($data);
        $this->load->view('ikmc2017/sendErrorSuccess');

    }
    public function loadAllReports(){
        $data['reports'] = $this->studentcard2017_model->get_all_reports();
        $this->load->view('ikmc2017/backend/reportlist', $data);
    }
    public function updateReport(){
        $state=$_POST['state'];
        $id=$_POST['id'];
        if($state==0){
            $state=1;
        }else{
            $state=0;
        }
        $this->studentcard2017_model->update_report_state($id, $state);
        $json = array('state' => true);
        echo json_encode($json);
    }
    public function updateNoteReport(){
        $note = $_POST['note'];
        $id= $_POST['reportid'];
        $data = array(
            'note' => $note
            );
        $this->studentcard2017_model->updateReport($id,$data);
        echo json_encode(array('state'=>true));
    }
    public function deleteReport(){
        $id = $_POST['id'];
        $this->studentcard2017_model->deleteReport($id);
        echo json_encode(array('state' => true));
    }
    public function getallstudents(){
        $data['students'] = $this->studentcard2017_model->get_all_students();
        $this->load->view('ikmc2017/backend/studentlist', $data);
    }
    public function ajaxGetStudent(){
        $studentid = $_POST['studentid'];
        $student = $this->studentcard2017_model->get_student_by_id($studentid);
        echo json_encode($student);
    }
    public function updateStudentData(){
        $newformat = date('Y-m-d',strtotime(str_replace('/', '-', $_POST['birthday'])));
        $data = array(
            'fullname' => $_POST['fullname'],
            'birthday' => $newformat,
            'gender' => $_POST['gender']
            );
        $id = $_POST['studentid'];
        $this->studentcard2017_model->updateStudent($id, $data);
        echo json_encode(array('state'=>true));
    }
    public function Searchforcard(){
        $fullname = $_POST['fullname'];
        $birthday = $_POST['birthday'];
        $newformat = date('Y-m-d',strtotime(str_replace('/', '-', $birthday)));
   

           
        $data['students'] = $this->studentcard2017_model->get_student($fullname,$newformat);
        $this->load->view('ikmc2017/showresultsearchforcard', $data);
    }
       public function export_custom_card($id){
       
  
    $student = $this->studentcard2017_model->get_student_by_id($id);

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('IKMC Organizer');
    $pdf->SetTitle('THE DU THI');
    $pdf->SetSubject('IKMC ID');
    $pdf->SetKeywords('IKMC, PDF, ID, Kangaroo MAth');   
  
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
  
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
  
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
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
  
    // ---------------------------------------------------------    

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('freesans', '', 9, '', true);   
  
    // Add a page
    // This method has several options, check the source code documentation for more information.
    
      ob_start();
    $pdf->AddPage(); 
   
    // set text shadow effect
  

    $html = $this->writeContent($student);
   
   
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
    $pdf->lastPage();
  
  ob_end_clean();
    $pdfname = 'the_du_thi_'.$student['sbd'].'.pdf';
    $pdf->Output($pdfname, 'I');
    
    }
    public function export_empty_card(){
  


    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('IKMC Organizer');
    $pdf->SetTitle('THE DU THI');
    $pdf->SetSubject('IKMC ID');
    $pdf->SetKeywords('IKMC, PDF, ID, Kangaroo MAth');   
  
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
  
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
  
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
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
  
    // ---------------------------------------------------------    

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('freesans', '', 9, '', true);   
  
    // Add a page
    // This method has several options, check the source code documentation for more information.
    
      ob_start();
    for($i=1;$i<101;$i++){
        $number = str_pad($i,4,'0',STR_PAD_LEFT);
        $seri = '07'.$number;
          $pdf->AddPage(); 
   
    // set text shadow effect
  

    $html = $this->writeCustomContent($seri);
   
   
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
    $pdf->lastPage(); 
    }
 
  
  ob_end_clean();
  
    $pdf->Output('THE_DU_PHONG_07.pdf', 'I');
    
    }
    public function export_card(){
        if(isset($_POST['student_id'])){
             $id = $_POST['student_id'];
           
         }else{
            $html_err = '<html><head><meta charset="utf-8"></head>Đã có lỗi xảy ra.<a href="'.base_url().'">Quay về trang chủ</a></html>';
            exit($html_err);
         }
  
    $student = $this->studentcard2017_model->get_student_by_id($id);

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('IKMC Organizer');
    $pdf->SetTitle('THE DU THI');
    $pdf->SetSubject('IKMC ID');
    $pdf->SetKeywords('IKMC, PDF, ID, Kangaroo MAth');   
  
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
  
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
  
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
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
  
    // ---------------------------------------------------------    

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('freesans', '', 9, '', true);   
  
    // Add a page
    // This method has several options, check the source code documentation for more information.
    
      ob_start();
    $pdf->AddPage(); 
   
    // set text shadow effect
  

    $html = $this->writeContent($student);
   
   
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
    $pdf->lastPage();
  
  ob_end_clean();
    $pdfname = 'the_du_thi_'.$student['sbd'].'.pdf';
    $pdf->Output($pdfname, 'I');
    
    }
    
    public function generateQRcodeData(){
        $string = "Thẻ dự thi IMSO 2017 - IEG Innovative Education Group";
            return $string;
    }
    public function writeContent($student){
     $image_path = base_url()."/ikmc2017_assets/image/imsologo.jpg";
     $vietnam_image_path = base_url()."/ikmc2017_assets/image/vietnam.png";
    $rule_txt = '<h2 style="text-align:center; ">NỘI QUY PHÒNG THI</h2>
<ul style="font-size:12px;line-height:18px; ">
<li>Ngày thi: <strong>25/06/2017</strong>. Thời gian có mặt tại điểm thi: <strong>7:30</strong></li>
<li>Thời gian bắt đầu làm bài: <strong>8h</strong>. Thời gian làm bài môn Toán: <strong>120 phút</strong>. Thời gian làm bài môn Khoa học:<strong> 135 phút.</strong></li>
<li>Thí sinh phải có mặt tại địa điểm thi đúng ngày, giờ quy định. Thí sinh có mặt sau thời gian

bắt đầu làm bài thi không được dự thi.</li>

<li>Xuất trình Thẻ dự thi và Thẻ học sinh (hoặc Bản sao Giấy khai sinh) cho Cán bộ coi thi

(CBCT).</li>

<li>Chỉ được mang bút chì 2B, gọt chì, tẩy chì, bút bi đen, bút bi xanh vào phòng thi.</li>

<li>Nếu thấy có những sai sót hoặc nhầm lẫn về họ, tên, chữ đệm, ngày, tháng, năm sinh... thí

sinh phải báo cáo CBCT để điều chỉnh ngay.</li>

<li>Không được mang vào phòng thi vũ khí, chất gây nổ, gây cháy, bia, rượu, giấy than, bút xóa,

máy tính, compa, tài liệu, thiết bị truyền tin hoặc chứa thông tin có thể lợi dụng để gian lận

trong quá trình làm bài thi.</li>

<li>Trước khi làm bài thi phải ghi đầy đủ số báo danh vào cả giấy thi và giấy

nháp.</li>

<li>Bài làm phải trình bày rõ ràng, sạch sẽ, không nhàu nát, không đánh dấu hoặc làm ký hiệu

riêng.</li>

<li>Phải bảo vệ bài làm của mình và nghiêm cấm mọi hành vi gian lận, không được xem bài của

thí sinh khác, không được trao đổi ý kiến, trao đổi tài liệu khi làm bài.</li>

<li>Phải giữ gìn trật tự chung trong phòng thi.Trường hợp ốm đau bất thường phải báo cáo

để CBCT xử lý.</li>

<li>Khi hết giờ thi, phải ngừng làm bài và nộp bài thi, đề thi, giấy nháp cho CBCT. Trong trường

hợp không làm được bài, thí sinh cũng phải nộp bài thi, đề thi, giấy nháp. Khi nộp bài, thí

sinh phải tự ghi rõ số tờ giấy thi đã nộp và ký tên xác nhận vào bản danh sách theo dõi thí

sinh.</li>

<li>Thí sinh chỉ được ra khỏi phòng thi và khu vực thi sau khi hết thời gian làm bài và sau khi đã

nộp bài làm, đề thi, giấy nháp cho CBCT, trừ trường hợp ốm đau cần cấp cứu do người phụ

trách điểm thi quyết định.</li>
<h3 style="text-align:right; text-transform:uppercase">BTC IMSO VIệt Nam</h3>
</p>';
    $qr = new QR_BarCode();
    $qrData = $this->generateQRcodeData();
    $qr->text($qrData);
         
    $qrname ='imso2017.png';
    $qr->qrCode(200,'qrcode/'.$qrname);
    $qrpath = base_url().'qrcode/'.$qrname;
    // create new PDF document
    
    // Add a page
    // This method has several options, check the source code documentation for more information.
     
     

   
    // set text shadow effect
  
 
 

    $html = '<div style="border:1px solid #333;">
    <div style="display:table">
    <table border="0">
    <tr><td style="padding-left: 100px" width="20%">
    <img src="'.$image_path.'" style="width:120px; height: 90px"></td>
    <td style="text-align:center; padding: 30px;" align="center" valign="middle" width="60%">
    <h2 style="font-size:14px; font-weight:bold;">International Mathematics and Science Olympiad 2017</h2>
    <h2 style="font-size:12px;">Team Vietnam Selection Test - First Round</h2>
    <h2 style=" text-transform:uppercase;font-size:14px; font-weight:bold;">THẻ dự thi</h2>
    </td>
    <td  width="5%"></td>
    <td style="padding-left: 60px; padding-top:50px;" width="15%">
    <br><br>
    <img src="'.$vietnam_image_path.'" style="width:80px; height: 60px; margin-top:130px;"></td>
    </tr>
    </table>
    </div>
    <table border="0" cellspacing="3" cellpadding="4">  

    <tr style="text-align:left;">
                        <td width="30%"><span style="font-style:italic">Họ và tên/Name:</span><br>
                        <span style="font-weight:bold; text-transform:uppercase; ">'.trim($student['fullname']).'</span>
                        </td>
                        <td width="20%"><span style="font-style:italic">SBD/ID Number</span><br>
                        <span style="font-weight:bold; font-size:18px;">'.$student['sbd'].'</span>
                        </td>
                        <td width="30%"><span style="font-style:italic">Phòng thi/Room</span><br>
                        <span style="font-weight:bold; font-size:18px;">'.$student['room'].'</span></td>
                        <td rowspan="3" width="20%"><img src="'.$qrpath.'"></td>
                    </tr>
                    <tr>
                        <td><span style="font-style:italic">Ngày sinh/Birthday:</span> <br>
                        <span style="font-weight:bold">'.$student['birthday'].'</span>
                        </td>
                        <td><span style="font-style:italic">Trường/School:</span><br>
                        <span style="font-weight:bold">'.$student['school'].'</span></td>
                       <td> <span style="font-style:italic">Môn thi/Subject:</span><br>
                        <span style="font-weight:bold">'.$student['subject'].'</span>
                        </td>

                    </tr>
                    <tr>
                        
                        <td width="30%"><span style="font-style:italic">Điểm thi/Venue:</span><br>
                        <span style="font-weight:bold; ">Trường Tiểu học Marie Curie</span></td>
                         <td width="50%"><span style="font-style:italic">Địa chỉ/Address:</span><br>
                        <span style="font-weight:bold; ">Số 1 Trần Văn Lai, Mỹ Đình, Nam Từ Liêm, Hà Nội.</span>
                        </td>
                    </tr>
                    <tr>
                    <td colspan="4" style="text-align:center , font-style:italic"></td>
                        
                    </tr>
</table></div>
<div>
</div>
<div>
'.$rule_txt.'
</div>
';
    return $html;
    }



 public function writeCustomContent($seri){
     $image_path = base_url()."/ikmc2017_assets/image/imsologo.jpg";
    $rule_txt = '<h2 style="text-align:center; ">NỘI QUY PHÒNG THI</h2>
<ul style="font-size:12px;line-height:18px; ">
<li>Ngày thi: <strong>25/06/2017</strong>. Thời gian có mặt tại điểm thi: <strong>7:30</strong></li>
<li>Thí sinh phải có mặt tại địa điểm thi đúng ngày, giờ quy định. Thí sinh có mặt sau thời gian

bắt đầu làm bài thi không được dự thi.</li>

<li>Xuất trình Thẻ dự thi và Thẻ học sinh (hoặc Bản sao Giấy khai sinh) cho Cán bộ coi thi

(CBCT).</li>

<li>Chỉ được mang bút chì 2B, gọt chì, tẩy chì vào phòng thi, bút bi đen, bút bi xanh.</li>

<li>Nếu thấy có những sai sót hoặc nhầm lẫn về họ, tên, chữ đệm, ngày, tháng, năm sinh... thí

sinh phải báo cáo CBCT để điều chỉnh ngay.</li>

<li>Không được mang vào phòng thi vũ khí, chất gây nổ, gây cháy, bia, rượu, giấy than, bút xóa,

máy tính, compa, tài liệu, thiết bị truyền tin hoặc chứa thông tin có thể lợi dụng để gian lận

trong quá trình làm bài thi.</li>

<li>Trước khi làm bài thi phải ghi đầy đủ số báo danh vào cả giấy thi và giấy

nháp.</li>

<li>Bài làm phải trình bày rõ ràng, sạch sẽ, không nhàu nát, không đánh dấu hoặc làm ký hiệu

riêng.</li>

<li>Phải bảo vệ bài làm của mình và nghiêm cấm mọi hành vi gian lận, không được xem bài của

thí sinh khác, không được trao đổi ý kiến, trao đổi tài liệu khi làm bài.</li>

<li>Phải giữ gìn trật tự chung trong phòng thi.Trường hợp ốm đau bất thường phải báo cáo

để CBCT xử lý.</li>

<li>Khi hết giờ thi, phải ngừng làm bài và nộp bài thi, đề thi, giấy nháp cho CBCT. Trong trường

hợp không làm được bài, thí sinh cũng phải nộp bài thi, đề thi, giấy nháp. Khi nộp bài, thí

sinh phải tự ghi rõ số tờ giấy thi đã nộp và ký tên xác nhận vào bản danh sách theo dõi thí

sinh.</li>

<li>Thí sinh chỉ được ra khỏi phòng thi và khu vực thi sau khi hết thời gian làm bài và sau khi đã

nộp bài làm, đề thi, giấy nháp cho CBCT, trừ trường hợp ốm đau cần cấp cứu do người phụ

trách điểm thi quyết định.</li>
<h3 style="text-align:right; text-transform:uppercase">BTC IMSO VIệt Nam</h3>
</p>';
    
    // create new PDF document
    
    // Add a page
    // This method has several options, check the source code documentation for more information.
     
     

   
    // set text shadow effect
  
 
 

    $html = '<div style="border:1px solid #333;">
    <div style="display:table">
    <table border="0">
    <tr><td style="padding-left: 100px" width="30%">
    <img src="'.$image_path.'" style="width:120px; height: 60px"></td>
    <td style="text-align:center; padding: 30px;" align="center" valign="middle" width="40%">
    <h2 style="font-size:14px; font-weight:bold;">International Kangaroo Math Contest 2017</h2>
    <h2 style=" text-transform:uppercase;font-size:14px; font-weight:bold;">THẻ dự thi</h2>
    </td> 
    <td width="40%" style="margin-left:140px, font-size:11px; font-weight:bold"><span>  </span><span>  </span><span>  </span><span>  </span><span>  </span><span>  </span><span>  </span><span>  </span><span>  </span><span>  </span><span>  </span><span>  </span><span>  </span>No: '.$seri.'</td>
    </tr>
    </table>
    </div>
    <table border="0" cellspacing="3" cellpadding="4">  

    <tr style="text-align:left;">
                        <td width="30%"><span style="font-style:italic">Họ và tên/Name:</span><br>
                        <span style="font-weight:bold; text-transform:uppercase; "></span>
                        </td>
                        <td width="20%"><span style="font-style:italic">SBD/ID Number:</span><br>
                        <span style="font-weight:bold; font-size:18px;"></span>
                        </td>
                        <td width="30%"><span style="font-style:italic">Phòng thi/Room:</span><br>
                        <span style="font-weight:bold; font-size:18px;"></span></td>
                        <td rowspan="3" width="20%"></td>
                    </tr>
                    <tr>
                        <td><span style="font-style:italic">Ngày sinh/Birthday:</span> <br>
                        <span style="font-weight:bold">____/_____/_____</span>
                        </td>
                        <td><span style="font-style:italic">Giới tính/Gender:</span><br>
                        <span style="font-weight:bold"></span></td>
                       <td> <span style="font-style:italic">Cấp độ/Level:</span><br>
                        <span style="font-weight:bold"></span>
                        </td>

                    </tr>
                    <tr>
                        
                        <td width="30%"><span style="font-style:italic">Điểm thi/Venue:</span><br>
                        <span style="font-weight:bold; "></span></td>
                         <td width="50%"><span style="font-style:italic">Địa chỉ/Address:</span><br>
                        <span style="font-weight:bold; "></span>
                        </td>
                    </tr>
                    <tr>
                    <td colspan="4" style="text-align:center , font-style:italic"></td>
                        
                    </tr>
</table></div>
<div>
</div>
<div>
'.$rule_txt.'
</div>
';
    return $html;
    }





public function export_multi_id_card(){

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('IMSO Organizer');
    $pdf->SetTitle('THE DU THI');
    $pdf->SetSubject('IMSO ID');
    $pdf->SetKeywords('IMSO, PDF, ID');   
  
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
  
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
  
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
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
  
    // ---------------------------------------------------------    

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('freesans', '', 9, '', true);
    $image_path = base_url()."/ikmc2017_assets/image/logo.png";//Logo IKMC
    ob_start();
    $students = $this->studentcard2017_model->getImso2017Students();
    $student = $students['0'];
    foreach($students as $student){

    // create new PDF document
    
    // Add a page
    // This method has several options, check the source code documentation for more information.

    $pdf->AddPage();

    $html = $this->writeContent($student);
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    $pdf->lastPage();
    }
   ob_end_clean();
   $filename = FCPATH.'ikmc2017_assets/idcard/idcard_IMSO.pdf';
    $pdf->Output('THE_DU_THI_IMSO.pdf', 'D'); 
    }
public function export_imso_card($sbd){

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('IMSO Organizer');
    $pdf->SetTitle('THE DU THI');
    $pdf->SetSubject('IMSO ID');
    $pdf->SetKeywords('IMSO, PDF, ID');   
  
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
  
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
  
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
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
  
    // ---------------------------------------------------------    

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('freesans', '', 9, '', true);
    $image_path = base_url()."/ikmc2017_assets/image/logo.png";//Logo IKMC
    ob_start();
    $student = $this->studentcard2017_model->getImsoStudent($sbd);
    if(count($student)>0){
          $pdf->AddPage();

   $html = $this->writeContent($student);
   $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
   $pdf->lastPage();
  ob_end_clean();
  $filename = FCPATH.'ikmc2017_assets/idcard/idcard_IMSO.pdf';
   $pdf->Output('THE_DU_THI_IMSO.pdf', 'D');
}else{
    echo "404";
}

 
    }
    }