<?php

namespace App\DataFixtures;

use App\Entity\Teacher;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeacherFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i<=3; $i++){
            $teacher = new Teacher;
            $teacher->setTeacher_name("Teacher $i")
                    ->setTeacher_age(rand(30,40))
                    ->setTeacher_gender("Male")
                    ->setTeacher_image("")
                    ->setTeacher_email("teacher$i@gmail.com")
                    ->setTeacher_pass("teacher$i");
        }

        $manager->flush();
    }
}
