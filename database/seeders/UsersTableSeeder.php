<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'first_name' => 'Hout',
            'last_name' => 'Ryna',
            'email' => 'admin@ut.com',
            'password' => Hash::make('password'),
            'gender' => 'Female',
            'nationality' => 'Khmer',
            'phone' => '855-456-7856',
            'address' => '123 Admin St',
            'address2' => 'Suite 456',
            'birthday' => '2001-06-25',
            'role' => 'admin',
            'photo' => 'admin_photo.jpg',
        ]);

        // Khmer names and locations data
        $khmerData = [
            'firstNames' => [
                'សុខា', 'រតនា', 'ដារ៉ា', 'វីរៈ', 'សុវណ្ណ', 
                'ចាន់', 'មុនី', 'បូរី', 'ពិសី', 'ចិន្តា'
            ],
            'lastNames' => [
                'ដារ៉ា', 'សុខ', 'គីម', 'ហេង', 'ឫទ្ធិ', 
                'មៀច', 'ចាន់', 'វ៉ាន់', 'ម៉ារ៉ា', 'រ៉ាវី'
            ],
            'provinces' => [
                'បន្ទាយមានជ័យ', 'បាត់ដំបង', 'កំពង់ចាម', 
                'កំពត', 'កំពង់ធំ', 'កំពង់ឆ្នាំង', 'កំពង់ស្ពឺ', 
                'កណ្ដាល', 'កែប', 'កោះកុង'
            ]
        ];

        // Create student users
        foreach (range(1, 10) as $index) {
            $firstName = $khmerData['firstNames'][array_rand($khmerData['firstNames'])];
            $lastName = $khmerData['lastNames'][array_rand($khmerData['lastNames'])];
            $province = $khmerData['provinces'][array_rand($khmerData['provinces'])];

            User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'english_name' => $this->getEnglishName($firstName, $lastName),
                'email' => strtolower($this->getEnglishName($lastName)) . rand(100, 999) . '@example.com',
                'password' => Hash::make('password123'),
                'gender' => rand(0, 1) ? 'Male' : 'Female',
                'nationality' => 'Khmer',
                'phone' => '012' . rand(1000000, 9999999),
                'address' => $province,
                'birthday' => now()->subYears(rand(18, 25))->format('Y-m-d'),
                'role' => 'student',
                'photo' => 'student_photo.jpg',
            ]);
        }
    }

    /**
     * Get English transliteration of Khmer names.
     *
     * @param string $firstName
     * @param string|null $lastName
     * @return string
     */
    private function getEnglishName(string $firstName, ?string $lastName = null): string
    {
        $khmerToEnglish = [
            'សុខា' => 'Sokha',
            'រតនា' => 'Rathana',
            'ដារ៉ា' => 'Dara',
            'វីរៈ' => 'Vireak',
            // Add more transliterations as needed
        ];

        $englishFirstName = $khmerToEnglish[$firstName] ?? $firstName;
        if ($lastName) {
            $englishLastName = $khmerToEnglish[$lastName] ?? $lastName;
            return "$englishFirstName $englishLastName";
        }

        return $englishFirstName;
    }
}
