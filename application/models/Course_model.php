<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function insert_category($data)
    {
        $this->db->insert('tbl_category',$data);
        return $this->db->insert_id();
        //echo $this->db->last_query();
    }

    function category_count()
    {
        return $this->db->count_all("tbl_category");
    }
    
    function display_category()
    {
        $category = $this->input->post('category_name');
        $id = $this->input->post('category_id');
        $this -> db -> select('*');
        $this -> db -> from('tbl_category');
        $this->db->order_by('category_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_all_category()
    {
        $query = $this->db->get('tbl_category');
        return $query->result();
    }

    function get_category()
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_category');
        $this->db->where('category_status','0');
        $this->db->order_by('category_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function category_details($id)
    {
        $query = $this->db->get_where('tbl_category', array('category_id' => $id));
        return $query->row();
    }

    function delete_category($category_id)
    {
        $this->db->where('category_id',$category_id);
        $this->db->delete('tbl_category');
    }

    function single_category_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }
    
    function update_category($category_id,$data){
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category', $data);
        //echo $this->db->last_query();
    }

    function update_category_status($category_id,$category_status)
    {
        if($category_status==0)
        {
            $new_stat="1";
        }
        elseif($category_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_category SET category_status = '$new_stat' WHERE category_id='$category_id'");
        //echo $this->db->last_query();
    }

    function insert_course($data)
    {
        $this->db->insert('tbl_course',$data);
        //echo $this->db->last_query();
    }

    function display_course()
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_course');
        $this->db->order_by('course_id', 'desc');
        $query = $this->db->get();
        return $query->result() ;
    }

    function get_all_course()
    {
        $this->db->select('tbl_course.*,tbl_category.category_id,tbl_category.category_name')->from('tbl_course');
        $this->db->join('tbl_category','tbl_course.course_category=tbl_category.category_id','left');
        $this->db->order_by('course_id','desc');
        $query = $this->db->get();
        return $query->result();
    }

    function get_course()
    {
        $this -> db -> select('course_name,course_id,course_status');
        $this -> db -> from('tbl_course');
        $this->db->where('course_status','0');
        $this->db->where('course_parent', ' ');
        $this->db->order_by('course_name', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function delete_course($course_id)
    {
        $this->db->where('course_id',$course_id);
        $this->db->delete('tbl_course');
    }

    function single_course_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_course');
        $this->db->where('course_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }

    function update_course($course_id,$data){
        $this->db->where('course_id', $course_id);
        $this->db->update('tbl_course', $data);
        //echo $this->db->last_query();
    }

    function update_course_status($course_id,$course_status)
    {
        if($course_status==0)
        {
            $new_stat="1";
        }
        elseif($course_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_course SET course_status = '$new_stat' WHERE course_id='$course_id'");
    }
   
    function insert_batch($data)
    {
        $this->db->insert('tbl_upcoming_batches',$data);
    }

    function display_batch()
    {
        $this->db->select('tbl_course.course_id,tbl_course.course_name,tbl_upcoming_batches.*')->from('tbl_upcoming_batches');
        $this->db->join('tbl_course','tbl_upcoming_batches.batch_course=tbl_course.course_id','left');
        $this->db->order_by('batch_id','desc');
        $query = $this->db->get();
        return $query->result();
    }

    function delete_batch($batch_id)
    {
        $this->db->where('batch_id',$batch_id);
        $this->db->delete('tbl_upcoming_batches');
    }

    function single_batch_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_upcoming_batches');
        $this->db->where('batch_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }

    function update_batch($batch_id,$data){
        $this->db->where('batch_id', $batch_id);
        $this->db->update('tbl_upcoming_batches', $data);
    }

    function update_batch_status($batch_id,$batch_status)
    {
        if($batch_status==0)
        {
            $new_stat="1";
        }
        elseif($batch_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_upcoming_batches SET batch_status = '$new_stat' WHERE batch_id='$batch_id'");
    }

    function insert_blog($data)
    {
        $this->db->insert('tbl_blog',$data);
    }

    function display_blog()
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_blog');
        $this->db->order_by('blog_id', 'desc');
        $query = $this->db->get();
        return $query->result() ;
    }

    function delete_blog($blog_id)
    {
        $this->db->where('blog_id',$blog_id);
        $this->db->delete('tbl_blog');
    }

    function single_blog_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('blog_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }

    function update_blog($blog_id,$data){
        $this->db->where('blog_id', $blog_id);
        $this->db->update('tbl_blog', $data);
    }

    function update_blog_image($blog_id,$blog_image){
        $query = $this->db->query("UPDATE tbl_blog SET blog_image = '$blog_image' WHERE blog_id='$blog_id'");
    }

    function update_blog_concatimg($blog_id,$blogimage){
        $query = $this->db->query("UPDATE tbl_blog SET blog_image = concat(blog_image,',$blogimage') WHERE blog_id='$blog_id'");
    }

    function delete_blog_image($blog_id,$blog_image){
        $this->db->select('blog_id,blog_image');
        $this->db->from('tbl_blog');
        $this->db->where('blog_id', $blog_id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $related_images = explode(',',$row->blog_image);
            $key = array_search($blog_image,$related_images, true);
            if ($key !== false)
            {
                unset($related_images[$key]);
                $related_images_string = implode(',',$related_images);
                $query = $this->db->query("UPDATE tbl_blog SET blog_image = '$related_images_string' WHERE blog_id='$blog_id'");
            }
        }
    }

    function update_blog_status($blog_id,$blog_status)
    {
        if($blog_status==0)
        {
            $new_stat="1";
        }
        elseif($blog_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_blog SET blog_status = '$new_stat' WHERE blog_id='$blog_id'");
    }

    function insert_testimonial($data)
    {
        $this->db->insert('tbl_testimonial',$data);
    }

    function display_testimonial()
    {
        $this->db->select('tbl_course.course_id,tbl_course.course_name,tbl_testimonial.*')->from('tbl_testimonial');
        $this->db->join('tbl_course','tbl_testimonial.testimonial_course=tbl_course.course_id','left');
        $this->db->order_by('testimonial_id','desc');
        $query = $this->db->get();
        return $query->result();
    }

    function delete_testimonial($testimonial_id)
    {
        $this->db->where('testimonial_id',$testimonial_id);
        $this->db->delete('tbl_testimonial');
    }
    
    function single_testimonial_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_testimonial');
        $this->db->where('testimonial_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }

    function update_testimonial($testimonial_id,$data){
        $this->db->where('testimonial_id', $testimonial_id);
        $this->db->update('tbl_testimonial', $data);
    }

    function update_testimonial_status($testimonial_id,$testimonial_status)
    {
        if($testimonial_status==0)
        {
            $new_stat="1";
        }
        elseif($testimonial_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_testimonial SET testimonial_status = '$new_stat' WHERE testimonial_id='$testimonial_id'");
    }

    function get_all_inquiry()
    {
        $this->db->select('*');
        $this->db->from('tbl_inquiry');
        $this->db->order_by('inquiry_id', 'desc');
        $query = $this->db->get();
        return $query->result() ;
    }

    function get_all_batch_register()
    {
        $query = $this->db->get('tbl_batch_register');
        return $query->result();
    }

    function insert_header_menu($data)
    {
        $this->db->insert('tbl_header_menu',$data);
        //echo $this->db->last_query();
    }

    function display_header_menus(){       
        $this -> db -> select('*');
        $this -> db -> from('tbl_header_menu');
        $this->db->order_by('header_id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function delete_header_menu($id)
    {
        $this->db->where('header_id',$id);
        $this->db->delete('tbl_header_menu');
    }

    function single_header_menu_id($data)
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_header_menu');
        $this->db->where('header_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }

    function update_header_menu($id,$data){
        $this->db->where('header_id', $id);
        $this->db->update('tbl_header_menu', $data);
    }

    function update_header_menu_status($id,$header_menu_status)
    {
        if($header_menu_status==0)
        {
            $new_stat="1";
        }
        elseif($header_menu_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_header_menu SET header_status = '$new_stat' WHERE header_id='$id'");
    }

    function insert_footer_menu($data)
    {
        $this->db->insert('tbl_footer_menu',$data);
        //echo $this->db->last_query();
    }

    function display_footer_menus(){       
        $this -> db -> select('*');
        $this -> db -> from('tbl_footer_menu');
        $this->db->order_by('footer_id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function delete_footer_menu($id)
    {
        $this->db->where('footer_id',$id);
        $this->db->delete('tbl_footer_menu');
    }

    function single_footer_menu_id($data)
    {
        $this -> db -> select('*');
        $this -> db -> from('tbl_footer_menu');
        $this->db->where('footer_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }

    function update_footer_menu($id,$data){
        $this->db->where('footer_id', $id);
        $this->db->update('tbl_footer_menu', $data);
    }

    function update_footer_menu_status($id,$footer_menu_status)
    {
        if($footer_menu_status==0)
        {
            $new_stat="1";
        }
        elseif($footer_menu_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_footer_menu SET footer_status = '$new_stat' WHERE footer_id='$id'");
    }

    function get_course_by_category($category)
    {
        $this -> db -> select('course_category,course_id,course_name, course_slug');
        $this->db->from('tbl_course');
        $this->db->where('course_category', $category);
        $this->db->where('course_status','0');
        $query = $this->db->get();
        return $query->result() ;
    }

    function all_menu(){
        $this->db->select('tbl_menu.*,c1.course_id,c1.course_slug as course_slug1,c1.course_name as course_name1,c2.course_id,c2.course_name as course_name2,c2.course_slug as course_slug2,tbl_category.category_id,tbl_category.category_name')->from('tbl_menu');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_menu.category','left');
        $this->db->join('tbl_course as c1','c1.course_id=tbl_menu.level_one','left');
        $this->db->join('tbl_course as c2', 'c2.course_id = tbl_menu.level_two');
        $this->db->order_by('tbl_category.category_name','asc');
        $query = $this->db->get();
        return $query->result();
    }

}
