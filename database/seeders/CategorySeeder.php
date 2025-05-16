<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Islam',
            'General Study and teaching',
            'History & Biography',
            'Prophet Muhammad (SAW)',
            'Prophets (AS)',
            'Islamic literature',
            'Sacred books',
            'Qur’an, Special parts and chapters, Works about the Qur’an',
            'Hadith literature, Traditions, Sunnah',
            'General works on Islam',
            'Dogma (‘Aqa’id)',
            'Theology (Kalaam)',
            'Works against Islam and the Qur’an',
            'Works in defense of Islam',
            'Islamic apologetics',
            'Benevolent work. Social work. Welfare works, etc.',
            'Missionary works of Islam',
            'Relation of Islam to other religions',
            'Islamic sociology',
            'The practice of Islam, the five duties of a Muslim. Pillars of Islam',
            'Jihad (Holy War)',
            'Religious ceremonies, rites, etc.',
            'Special days and seasons, fasts, feasts, festivals, etc.',
            'Relics Shrines, sacred places, etc.',
            'Islamic religious life',
            'Devotional literature',
            'Sufism. Mysticism. Dervishes',
            'Monasticism Branches, sects, etc.',
            'Shiites',
            'Black Muslims',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
