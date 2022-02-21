<?php
class Vocabs extends Controller {
    public function __construct(){
        $this->vocabModel = $this->model('Vocab');
        if(!isLoggedIn()) {
            redirect('users/login');
        }
    }
    
    public function index() {
        //$courses = $this->vocabModel->getCourses();
        $courses = ORM::for_table('course')->find_many();
        //var_dump($courses);
        //$subjects = $this->vocabModel->getCourseWithSubjects();
        $subjects = ORM::for_table('subject')
        
                                            //->select('course.name','courseName')
                                            //->select_many(array('course.name' => 'courseName'),array('subject.id' => 'subjectId'), 'subject.name', 'subject.course_id')
                                            ->select_many(array('courseName' => 'course.name'), array('subjectId' => 'subject.id'), 'subject.name', 'subject.course_id')
                                            ->join('course', array('subject.course_id', '=', 'course.id'))
                                            ->find_many();
        
        $data = [
            'title' => 'Learn',
            'description' => 'Simple app for users sharing posts',
            'courses' => $courses,
            'subjects' => $subjects
        ];
        $this->view('vocabs/index', $data);
    }

    public function test($id = null) {
        if($id == null) {
            redirect('vocabs');
        }
        // Check for Post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $p = isset($_GET['p']) ? $_GET['p'] : 0;
            // Init data
            $data = [
                'post'  => $_POST,
                'id'    => $id,
                'answers' => findQuestions($_POST),
                'p'     => $p
            ];
            evaluate($_POST);
            $this->view('vocabs/test', $data);
        } else {
        $courses = $this->vocabModel->getCourses();
        $subjects = $this->vocabModel->getCourseWithSubjects();
        $p = isset($_GET['p']) ? $_GET['p'] : 0;
        //$id = isset($_GET['id']) ? $_GET['id'] : '';
        !$this->vocabModel->wordProgress($id) ? $this->vocabModel->startProgress($id) : '';
        $progress = ORM::for_table('progress')
                        ->where('subject_id', $id)
                        ->where('user_id', $_SESSION['user_id'])
                        ->where_in('status', array('active', 'passive'))
                        ->order_by_asc('level')
                        ->find_array();
        /* $passive = ORM::for_table('progress')
                        ->where('subject_id', $id)
                        ->where('user_id', $_SESSION['user_id'])
                        ->where('status', 'passive')
                        ->find_array(); */
        //$passive2 = array_map(function($passive) {return $passive->as_array();} , $passive);
        //shuffle($progress);
        $roundQuestions = array_slice($progress, 0, 4);
        
        $passive = array_filter($progress, function($word){
                        if ($word['status'] != 'passive') {
                            return false;
                        }
                        return true; 
                    });
        shuffle($passive);

        $data = [
            'title' => 'Learn New Words',
            'id' => $id,
            //'words' => $words,
            'progress' => $progress,
            'passive' => $passive,
            //'passive2' => $passive2,
            'rquestions' => $roundQuestions,
            'p' => $p
        ];
        $this->view('vocabs/test', $data);
        }
    }

    public function orm(){
        $data =  ORM::for_table('vocabulary')->find_many();
        prettify($data);
    }
}