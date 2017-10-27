<?php
class Detect_content_error extends CI_Controller
{
    
    //Ham dung
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('detect_content_error_model'));
        $this->load->library('session');
    }

    public function notAttachedFigure() {
	$id = $this->detect_content_error_model->notAttachedFigureQuestionsOptional();
	echo "Số lượng câu hỏi có thể không kèm ảnh trong câu hỏi tự chọn: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++)
		echo $id[$i]["id"] . "       ";
	echo "</br>";
	
	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</br>";

	$id = $this->detect_content_error_model->notAttachedFigureQuestionsTest();
	echo "Số lượng câu hỏi có thể không kèm ảnh trong câu hỏi năm: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++) {
		echo $id[$i]["year"] . ", " . $id[$i]["lang"] . ", " . $id[$i]["id"]. " ------- ";
		if ($i % 7 == 6)
			echo "</br>";
	}
	echo "</br>";

	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</br>";

	$id = $this->detect_content_error_model->notAttachedFigureQuestionsTest2();
	echo "Số lượng câu hỏi có thể không kèm ảnh trong câu hỏi tuần: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++)
		echo $id[$i]["id"] . "       ";
	echo "</br>";
	
	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</br>";

	$id = $this->detect_content_error_model->notAttachedFigureCompetitionMonth();
	echo "Số lượng câu hỏi có thể không kèm ảnh trong câu hỏi thi tháng: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++)
		echo $id[$i]["id"] . "       ";
	echo "</br>";	
    }

    public function selectionProblem() {
	$id = $this->detect_content_error_model->emptySelectionProblemQuestionOptional();
	echo "Số lượng câu hỏi có thể có vấn đề về đáp án trong câu hỏi tự chọn: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++)
		echo $id[$i]["id"] . "       ";
	echo "</br>";
	
	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</br>";

	$id = $this->detect_content_error_model->emptySelectionProblemQuestionsTest();
	echo "Số lượng câu hỏi có thể có vấn đề đáp án trong câu hỏi năm: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++) {
		echo $id[$i]["year"] . ", " . $id[$i]["lang"] . ", " . $id[$i]["id"]. " ------- ";
		if ($i % 7 == 6)
			echo "</br>";
	}
	echo "</br>";

	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</br>";

	$id = $this->detect_content_error_model->emptySelectionProblemQuestionsTest2();
	echo "Số lượng câu hỏi có thể có vấn đề đáp án trong câu hỏi tuần: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++)
		echo $id[$i]["id"] . "       ";
	echo "</br>";
	
	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</br>";
	
	$id = $this->detect_content_error_model->emptySelectionProblemCompetitionMonth();
	echo "Số lượng câu hỏi có thể có thể có vấn đề trong câu hỏi thi tháng: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++)
		echo $id[$i]["id"] . "       ";
	echo "</br>";

	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</br>";

	$id = $this->detect_content_error_model->similarSelectionProblemQuestionOptional();
	echo "Số lượng câu hỏi có thể có lựa chọn giống nhau trong câu hỏi tự chọn: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++)
		echo $id[$i]["id"] . "       ";
	echo "</br>";
	
	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</br>";

	$id = $this->detect_content_error_model->similarSelectionProblemQuestionsTest();
	echo "Số lượng câu hỏi có thể có lựa chọn giống nhau trong câu hỏi năm: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++) {
		echo $id[$i]["year"] . ", " . $id[$i]["lang"] . ", " . $id[$i]["id"]. " ------- ";
		if ($i % 7 == 6)
			echo "</br>";
	}
	echo "</br>";

	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</br>";

	$id = $this->detect_content_error_model->similarSelectionProblemQuestionsTest2();
	echo "Số lượng câu hỏi có thể có lựa chọn giống nhau trong câu hỏi tuần: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++)
		echo $id[$i]["id"] . "       ";
	echo "</br>";
	
	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</br>";
	
	$id = $this->detect_content_error_model->similarSelectionProblemCompetitionMonth();
	echo "Số lượng câu hỏi có thể có lựa chọn giống nhau trong câu hỏi thi tháng: " . sizeof($id) . "</br>";
	for ($i = 0; $i < sizeof($id); $i++)
		echo $id[$i]["id"] . "       ";
	echo "</br>";

	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</br>";
    }	

}

?>
