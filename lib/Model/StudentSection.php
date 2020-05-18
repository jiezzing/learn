<?php

    App::uses('AppModel', 'Model');

    class StudentSection extends AppModel {

        public $usesTable = 'student_sections';

        // fetch teacher students
        public function fetchStudents($teacherId) {
            $result = $this->find('all', array(
                'joins' => array(
                    array(
                        'alias' => 'User',
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => array(
                            'User.id = StudentSection.student_id'
                        )
                    ),
                    array(
                        'alias' => 'Section',
                        'table' => 'sections',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Section.id = StudentSection.section_id'
                        )
                    ),
                    array(
                        'alias' => 'Status',
                        'table' => 'status',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Status.id = StudentSection.status_id'
                        )
                    ),
                    array(
                        'alias' => 'Level',
                        'table' => 'levels',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Level.id = Section.level_id'
                        )
                    )
                ),
                'conditions' => array(
                    'StudentSection.teacher_id' => $teacherId
                ),
                'fields' => array(
                    'User.id',
                    'User.about',
                    'User.gender',
                    'User.address',
                    'User.email',
                    'User.password',
                    'User.firstname',
                    'User.lastname',
                    'User.middle_initial',
                    'Section.name',
                    'Level.name',
                    'Status.status'
                )
            ));

            return $result;
        }

    }