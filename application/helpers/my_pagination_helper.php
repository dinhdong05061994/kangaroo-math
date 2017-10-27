<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('backend_pagination')){
    function backend_pagination($base_url='',$total='',$perpage=''){
        $config = array();
        $config['base_url'] = $base_url;
        //tong so ban ghi
        $config['total_rows'] = $total;
        $perpage = $config['per_page'] = $perpage;
        //chi ra page hien tai o segment nao
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        // them the html cho phan trang
        $config['full_tag_open'] = ' <div class="pagination">';
        $config['full_tag_close'] = ' </div>';
        $config['first_link'] = ' &laquo; First';
        $config['first_tag_open'] = '';
        $config['first_tag_close'] = '';
        //last
        $config['last_link'] = ' Last &raquo;';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        //next
        $config['next_link'] = ' Next &raquo;';
        $config['next_tag_open'] = '';
        $config['next_tag_close'] = '';
        //prew
        $config['prev_link'] = ' &laquo; Previous';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';

        $config['cur_tag_open'] = '<a href="#" class="number current" title="3">';
        $config['cur_tag_close'] = '</a>';
        
        return $config;
    }
    
}

if(!function_exists('validation_pagination')){
    function validation_pagination($page,$total,$perpage){
        $page = ($page < 1) ? 1 : $page;
        $page = ($page > ceil($total / $perpage)) ? ceil($total / $perpage) : $page;
        return $page;
        
    }
    }