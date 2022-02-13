<?php
class CPadmin extends Controller {
    public function __construct() {
        $this->adminModel = $this->model('admin');
        $this->vocabModel = $this->model('vocab');
        if(!isAdmin()) {
            redirect('pages/index');
        }
    }

    public function index() {
        $data = [
            'title' => 'Admin Panel',
            'description' => 'Here you can edit / add questions'
        ];
        $this->view('cpadmin/index', $data);
    }

    public function bulkVocab() {
        $data = [
        'title' => 'Bulk Add Vocabulary',
        'description' => 'You can add vocabulary here from CSV file',
    ];
        
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $subject_id = $_POST['subjectId'];
        
        $filename=$_FILES["file"]["tmp_name"]; 
        if($_FILES["file"]["size"] > 0)
        {
            $file = fopen($filename, "r");
            /* while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
                $this->vocabModel->addBulkVocab($getData, $subject_id);
            } */
        
            fclose($file);
            flash('bulk_success', 'Words are added'); 
            $this->view('cpadmin/bulkVocab', $data);
        }
    } else {
        $data['subjects'] = $this->vocabModel->getCourseWithSubjects();   
        $this->view('cpadmin/bulkVocab', $data);         
    }    
    }
    
}