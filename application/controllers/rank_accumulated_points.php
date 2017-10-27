<?php
class Rank_accumulated_points extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('rank_accumulated_points_model'));    
    }
    function top20(){ // đặt vào 12h đêm mỗi ngày
        // sao chép sang bảng lưu trữ xếp hạng cũ
        $move = $this->rank_accumulated_points_model->copy_rank_to_rank_old();
        //Xóa bảng xếp hạng hiện tại để thêm xếp hạng mới
        $del = $this->rank_accumulated_points_model->del_rank();
        //them xep hạng moi
        if(($move == true || $move == 1) && ($del == true || $del == 1)){
            //lớp 1-2:
            $arr_list_accumilated_point_1_vi = $this->rank_accumulated_points_model->rank_accumulated_points('vi',1);  
            $arr_list_accumilated_point_1_en = $this->rank_accumulated_points_model->rank_accumulated_points('en',1); 
            //lớp 3-4:
            $arr_list_accumilated_point_2_vi = $this->rank_accumulated_points_model->rank_accumulated_points('vi',2);  
            $arr_list_accumilated_point_2_en = $this->rank_accumulated_points_model->rank_accumulated_points('en',2); 
            //lớp 5-6:
            $arr_list_accumilated_point_3_vi = $this->rank_accumulated_points_model->rank_accumulated_points('vi',3);  
            $arr_list_accumilated_point_3_en = $this->rank_accumulated_points_model->rank_accumulated_points('en',3); 
            //lớp 5-6:
            $arr_list_accumilated_point_3_vi = $this->rank_accumulated_points_model->rank_accumulated_points('vi',17);  
            $arr_list_accumilated_point_3_en = $this->rank_accumulated_points_model->rank_accumulated_points('en',17); 
        }
        
    }
    
    
    

}
?>