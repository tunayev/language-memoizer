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

    public function test() {
        $courses = $this->vocabModel->getCourses();
        $subjects = $this->vocabModel->getCourseWithSubjects();
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        //$words = $this->vocabModel->getVocabsOfSubject($id);
        !$this->vocabModel->wordProgress($id) ? $this->vocabModel->startProgress($id) : '';
        //$progress = $this->vocabModel->wordProgress($id);
        $progress = ORM::for_table('progress')
                        ->where('subject_id', $id)
                        ->where('user_id', $_SESSION['user_id'])
                        ->find_array();
        /* $passive = ORM::for_table('progress')
                        ->where('subject_id', $id)
                        ->where('user_id', $_SESSION['user_id'])
                        ->where('status', 'passive')
                        ->find_array(); */
        //$passive2 = array_map(function($passive) {return $passive->as_array();} , $passive);
        shuffle($progress);
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
            'rquestions' => $roundQuestions
        ];
        $this->view('vocabs/test', $data);
    }

    public function orm(){
        $data =  ORM::for_table('vocabulary')->find_many();
        prettify($data);
    }
}