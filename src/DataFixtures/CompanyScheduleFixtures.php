<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\CompanySchedule;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CompanyScheduleFixtures extends Fixture implements DependentFixtureInterface
{
    private function generateSchedules()
    {
        return [
            [
                'day' => 'Lundi',
                'startMorning' => '08:45',
                'endMorning' => '12:00',
                'startAfternoon' => '14:00',
                'endAfternoon' => '18:00',
            ],
            [
                'day' => 'Mardi',
                'startMorning' => '08:45',
                'endMorning' => '12:00',
                'startAfternoon' => '14:00',
                'endAfternoon' => '18:00',
            ],
            [
                'day' => 'Mercredi',
                'startMorning' => '08:45',
                'endMorning' => '12:00',
                'startAfternoon' => '14:00',
                'endAfternoon' => '18:00',
            ],
            [
                'day' => 'Jeudi',
                'startMorning' => '08:45',
                'endMorning' => '12:00',
                'startAfternoon' => '14:00',
                'endAfternoon' => '18:00',
            ],
            [
                'day' => 'Vendredi',
                'startMorning' => '08:45',
                'endMorning' => '12:00',
                'startAfternoon' => '14:00',
                'endAfternoon' => '18:00',
            ],
            [
                'day' => 'Samedi',
                'startMorning' => '08:45',
                'endMorning' => '12:00',
            ],
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $company = $manager->getRepository(Company::class)->findAll()[0];
        foreach ($this->generateSchedules() as $schedule) {
            $newSchedule = new CompanySchedule();
            $newSchedule->setDay($schedule['day']);
            $newSchedule->setStartMorning(new DateTime($schedule['startMorning']));
            $newSchedule->setEndMorning(new DateTime($schedule['endMorning']));
            if (!empty($schedule['startAfternoon'])) {
                $newSchedule->setStartAfternoon(new DateTime($schedule['startAfternoon']));
            }
            if (!empty($schedule['endAfternoon'])) {
                $newSchedule->setEndAfternoon(new DateTime($schedule['endAfternoon']));
            }
            $newSchedule->setCompany($company);

            $manager->persist($newSchedule);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CompanyFixtures::class,
        ];
    }
}
