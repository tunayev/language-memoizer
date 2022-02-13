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
        $progress = $this->vocabModel->wordProgress($id);
        $passive = array_filter($progress, function($obj){
                        if ($obj->status != 'passive') {
                            return false;
                        }
                        return true;
});

        $data = [
            'title' => 'Learn New Words',
            'id' => $id,
            //'words' => $words,
            'progress' => $progress,
            'passive' => $passive
        ];
        $this->view('vocabs/test', $data);
    }

    public function orm(){
        $data =  ORM::for_table('vocabulary')->find_many();
        echo 'asdasd';
    }
}