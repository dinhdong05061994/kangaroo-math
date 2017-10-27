<?php
class Rank_accumulated_points_model extends CI_Model {
     function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  
        $this->load->helper(array('form', 'url'));
    }
    function copy_rank_to_rank_old(){
        $sql = "INSERT INTO `rank_accumulated_points_old_days`(`id`, `lang`, `level`, `iduser`, `order_rank`, `current_total_score`, `rank_day`) (SELECT '', `lang`, `level`, `iduser`, `order_rank`, `current_total_score`, now() FROM `rank_accumulated_points`)";
        return $this->db->query($sql);
    }
    function del_rank(){
        $check = false;
        $sql = "DELETE FROM `rank_accumulated_points`";
        if($this->db->query($sql)){
            $check = true;
        };
        $this->db->query("ALTER TABLE `rank_accumulated_points`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1");
        return $check;   
    }
    function rank_accumulated_points($lang,$level){
        $sql1 = " SELECT a.`total_score_".$lang."` as score FROM `accumulated_points` a INNER JOIN user_registration u ON a.iduser = u.id WHERE u.level = '{$level}' ORDER BY score DESC LIMIT 19,1";
        $limit_score = 0;
        $temp = $this->db->query($sql1)->first_row();
        $limit_score = (count($temp) > 0 ? ($temp->score > 0 ? $temp->score : 0.000001) : 0.000001);
        $sql = "INSERT INTO `rank_accumulated_points`(`lang`,`level`, `iduser`, `order_rank`, `current_total_score`)
            (SELECT '$lang' as lang, u.`level` ,a.`iduser`,  @order := @order + 1 AS order_rank, a.`total_score_".$lang."` as score FROM `accumulated_points` a INNER JOIN user_registration u ON a.iduser = u.id,(SELECT @order := 0) auto_order WHERE u.level = '{$level}' AND a.`total_score_".$lang."` >= {$limit_score} ORDER BY score DESC)";
            
        $this->db->query($sql);

    }
    function getrank($level,$lang){
        $sql = "SELECT user.`fullname`,p.`name`as province_name,rank.* FROM `rank_accumulated_points` rank INNER JOIN user_registration  user ON rank.`iduser` = user.`id` LEFT JOIN province  p ON user.`province_id` = p.`provinceid` WHERE rank.`level` = '{$level}' AND rank.`lang` = '{$lang}' ORDER BY rank.order_rank ASC";
         return $this->db->query($sql)->result();
    }
    
  
} 
?>