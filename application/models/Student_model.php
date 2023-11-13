<?php
class Student_model extends CI_model
{
 //----------------------------------------------add function------------------------------------------------- 
       public function savedata($data)
       {

        $this->db->insert('students', $data);

     return true;
       }
 //----------------------------------------------------------------------------------------------------------  

//-------------------------------------------------view-------------------------------------------------------       
       public function all()
       {
        $view = $this->db->get('students');
        return $view->result_array();
       }
//--------------------------------------------------------------------------------------------------------


//------------------------------------------------------------edit----------------------------------------

       public function getstudent($id){      //getstudent method in your Student_model is used to retrieve a specific student record from the 'students' table based on student ID.
        $this->db->where('id',$id);       // WHERE condition in the database query. It specifies that you want to select a student record where the 'id' column matches the provided $id parameter. 
        return $this->db->get('students')->row_array();
       }
  

    public function get_student_data($id)
    {
        // Retrieve the student data from the database
        $student_data = $this->db->get_where('students', array('id' => $id))->row_array();

        // Check if the 'qualification' field is not empty
        if (!empty($student_data['qualification'])) {
            // Convert the comma-separated string to an array
            $student_data['qualification'] = explode(', ', $student_data['qualification']);
        } else {
            // If the 'qualification' field is empty, set it as an empty array
            $student_data['qualification'] = array();
        }

        return $student_data;
    }

    



       public function update($id, $data)
       {
           $this->db->where('id', $id);
           $this->db->update('students', $data);
       }
            

 //-----------------------------------------delete------------------------------------------------------------           
    public function delete($data,$id)
    {
      $result=$this->db->delete($data,['id'=>$id]);
      return $result;
    }
 //-----------------------------------------------------------------------------------------------------------   

       


       
    
}
?>
