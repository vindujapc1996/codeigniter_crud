<?php
class Student extends CI_controller {
     
    public function __construct()
    {
       parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Student_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');

    }
 
 //------------------------------------view function----------------------------------------------------
     public function index()                                  //this is the view function
    {
        $students = $this->Student_model->all();
        $data = array('students' => $students);
        $this->load->view('list', $data);                    //list is the blade page
    }

//-------------------------------------------------------------------------------------------------

 //-------------------------------add data--------------------------------------------------------------------------
 public function insert()
{
    $this->load->view('insert'); // Load the "insert" view. This loads the HTML form to enter student data.

    if ($this->input->post('submit')) // Check if the form is submitted (when the user clicks the "Submit" button).
    {
        $this->load->library('form_validation');

        // Define validation rules for form fields
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('mark', 'Mark', 'required|numeric');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('place', 'Place', 'required');

        // Define image validation rules
        $this->form_validation->set_rules('image', 'Image', 'callback_validate_image');

        if ($this->form_validation->run() === FALSE) {
            // Form validation failed, display the form with validation errors
            $this->load->view('insert');
        } else {
            // Form validation passed, process the form submission
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|xlsx|xls|pdf|csv|doc|docx|odt|txt|mp4|mp3';
            $config['max_size'] = 1024 * 1024;
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $data['image'] = $upload_data['file_name'];

                $qualification = $this->input->post('qualification');
                $qualification_str = implode(', ', $qualification);

                $data['name'] = $this->input->post('name');
                $data['subject'] = $this->input->post('subject');
                $data['mark'] = $this->input->post('mark');
                $data['gender'] = $this->input->post('gender');
                $data['dob'] = $this->input->post('dob');
                $data['place'] = $this->input->post('place');
                $data['qualification'] = $qualification_str; // Save the qualifications as a comma-separated string

                $response = $this->Student_model->savedata($data);

                if ($response == true) {
                    $this->session->set_flashdata('success', 'Successfully added');
                    redirect('index.php/Student/index');
                } else {
                    $this->session->set_flashdata('error', 'Error');
                }
            }
        }
    }
}

public function validate_image($image)
{
    $config['upload_path'] = './assets/uploads/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|xlsx|xls|pdf|csv|doc|docx|odt|txt|mp4|mp3';
    $config['max_size'] = 1048; // 2MB

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('image')) {
        $this->form_validation->set_message('validate_image', 'Please upload a valid image fil e (JPG, PNG, JPEG) within 2MB.');
        return false;
    } else {
        return true;
    }
}

 //----------------------------------------------------------------------------------------------------------------   

//-------------------------------------------edit section----------------------------------------------------
    public function edit($id)
    {
        $student = $this->Student_model->getstudent($id);       //calling a method from  Student_model. and trying to retrieve the details of a specific student from the database using their ID. This data is stored in the $student variable.
        $data['student'] = $student;                  // creating an array called $data and assigning the retrieved student data (stored in the $student variable) to the key 'student' in the $data array.
        $this->load->view('edit', $data);
    }

        //   public function update($id)
        //   {
        //     print_r($_POST);die();
        //   }
        public function update($id)
        {
            // Check if the form is submitted
            if ($this->input->post('update')) {
                
                // Retrieve the form data
                $data['name'] = $this->input->post('name');
                $data['subject'] = $this->input->post('subject');
                $data['mark'] = $this->input->post('mark');
                $data['gender'] = $this->input->post('gender'); 
                $data['dob'] = $this->input->post('dob');
                $qualification = $this->input->post('qualification');
                $qualification_str = implode(', ', $qualification);
                $data['qualification'] = $qualification_str; // Save the qualifications as a comma-separated string


                if (!empty($_FILES['image']['name'])) {
                    $config['upload_path'] = './assets/uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|xlsx|xls|pdf|csv|doc|docx|odt|txt|mp4|mp3';
                    $config['max_size'] = 1024 * 1024;
                    $config['encrypt_name'] = TRUE;
                    $config['remove_spaces'] = TRUE;
                    $this->load->library('upload', $config);
                
                    if ($this->upload->do_upload('image')) {
                        $upload_data = $this->upload->data();
                    } else {
                        // Print the upload error
                        echo $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                        redirect('index.php/Student/index');
                    }
                    $data['image'] = $upload_data['file_name'];

                }
                        

        
                // Call the update method in your Student_model
                $response = $this->Student_model->update($id, $data);
        
                if ($response === true) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Record updated successfully.</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Error updating the record.</div>');
                }
        
                redirect('index.php/Student/index');
            }
        }
//---------------------------------------------------------------------------------------------------------------        
        
//---------------------------delete function----------------------------------------------------------------------    
     public function delete($id)
      {
    $this->Student_model->delete('students',$id);
    $this->session->set_flashdata('message', '<div class="alert alert-success">Record has been deleted successfully.</div>');

    redirect(base_url('index.php/Student/index'));
     }
//----------------------------------------------------------------------------------------------------------     
     }
?>
