<?php

class Vocab {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get courses 
    public function getCourses(){
            $this->db->query('  SELECT *
                            FROM course
                            ORDER BY id ASC
                            ');

        $results = $this->db->resultSet();

        return $results;
    }
    // Get subjects
    public function getSubjects(){
            $this->db->query('  SELECT *
                            FROM subject
                            ORDER BY id ASC
                            ');

        $results = $this->db->resultSet();

        return $results;
    }

    // Get subjects of Course
    public function getSubjectsOfCourse($id){
        $this->db->query('  SELECT *
                            FROM subjects
                            WHERE :course_id = :id
                            ORDER BY id ASC
                            ');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();

        return $results;
    }

    // Get Vocabs of Subject
    public function getVocabsOfSubject($id){
        $this->db->query('  SELECT *
                            FROM vocabulary
                            WHERE class_id = :class_id
                            ORDER BY id ASC
                            ');
        $this->db->bind(':class_id', $id);
        $results = $this->db->resultSet();

        return $results;
    }

    // Get course with subjects
    public function getCourseWithSubjects(){
        $this->db->query('SELECT 
                            subject.name,
                            subject.course_id,
                            course.name as courseName,
                            subject.id as subjectId
                            FROM subject
                            LEFT OUTER JOIN course
                            ON subject.course_id = course.id
                            ORDER BY subject.id ASC
                            ');

        $results = $this->db->resultSet();

        return $results;
    }    
    
    // Start the user's progress
    public function startProgress($subject_id){
        $vocabs = $this->getVocabsOfSubject($subject_id);
        $subject = ORM::for_table('subject')->where('id', $subject_id)->find_one();
        $course_id = $subject->course_id;
        foreach($vocabs as $vocab) {
            $this->db->query("INSERT INTO progress (user_id, word_id, word, word_en, word_tr, subject_id, course_id, level, status) VALUES(:user_id, :word_id, :word, :worden, :wordtr, :subject_id, :course_id, :level, :status)");
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $this->db->bind(':word_id', $vocab->id);
            $this->db->bind(':word', $vocab->word);
            $this->db->bind(':worden', $vocab->worden);
            $this->db->bind(':wordtr', $vocab->wordtr);
            $this->db->bind(':subject_id', $subject_id);
            $this->db->bind(':course_id', $course_id);
            $this->db->bind(':level', '0');
            $this->db->bind(':status', 'passive');
            $this->db->execute();
        }
   }

   // Check if in progress
   public function wordProgress($subject_id){
        $this->db->query('  SELECT *
                            FROM progress
                            WHERE subject_id = :subject_id
                            AND user_id = :user_id
                            ');
        $this->db->bind(':subject_id', $subject_id);
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->execute();
        $results = $this->db->resultSet();
        return $results;
   }

    // Add bulk vocab
    public function addBulkVocab($data, $subject_id){
        $this->db->query("INSERT INTO vocabulary (class_id, word, wordtr, worden, type) VALUES(:class_id, :word, :wordtr, :worden, :type)");
        $this->db->bind(':class_id', $subject_id);
        $this->db->bind(':word', $data[0]);
        $this->db->bind(':wordtr', $data[2]);
        $this->db->bind(':worden', $data[1]);
        $this->db->bind(':type', $data[3]);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
   }

}