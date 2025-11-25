<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Seeds the categories table with Islamic scholarship categories.
     * Each category includes a name, slug, and optional description.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Islam',
                'description' => 'General works and studies about Islam as a religion and way of life.',
            ],
            [
                'name' => 'General Study and teaching',
                'description' => 'Educational materials and teaching resources about Islamic studies.',
            ],
            [
                'name' => 'History & Biography',
                'description' => 'Historical accounts and biographical works of Islamic figures and events.',
            ],
            [
                'name' => 'Prophet Muhammad (SAW)',
                'description' => 'Works about the life, teachings, and legacy of Prophet Muhammad (peace be upon him).',
            ],
            [
                'name' => 'Prophets (AS)',
                'description' => 'Literature about the prophets mentioned in Islamic tradition.',
            ],
            [
                'name' => 'Islamic literature',
                'description' => 'Literary works with Islamic themes and values.',
            ],
            [
                'name' => 'Sacred books',
                'description' => 'Sacred texts and holy books in Islamic tradition.',
            ],
            [
                'name' => 'Qur\'an, Special parts and chapters, Works about the Qur\'an',
                'description' => 'Quranic studies, tafsir, and works about the Holy Quran.',
            ],
            [
                'name' => 'Hadith literature, Traditions, Sunnah',
                'description' => 'Collections and studies of Hadith and the Sunnah of the Prophet.',
            ],
            [
                'name' => 'General works on Islam',
                'description' => 'Comprehensive works covering various aspects of Islam.',
            ],
            [
                'name' => 'Dogma (\'Aqa\'id)',
                'description' => 'Works on Islamic creed and theological beliefs.',
            ],
            [
                'name' => 'Theology (Kalaam)',
                'description' => 'Islamic theological discussions and philosophical debates.',
            ],
            [
                'name' => 'Works against Islam and the Qur\'an',
                'description' => 'Critical works and responses to criticisms of Islam.',
            ],
            [
                'name' => 'Works in defense of Islam',
                'description' => 'Apologetic works defending Islamic beliefs and practices.',
            ],
            [
                'name' => 'Islamic apologetics',
                'description' => 'Scholarly defenses and explanations of Islamic doctrine.',
            ],
            [
                'name' => 'Benevolent work. Social work. Welfare works, etc.',
                'description' => 'Works on charity, social welfare, and community service in Islam.',
            ],
            [
                'name' => 'Missionary works of Islam',
                'description' => 'Works related to da\'wah and spreading the message of Islam.',
            ],
            [
                'name' => 'Relation of Islam to other religions',
                'description' => 'Comparative religious studies and interfaith dialogue.',
            ],
            [
                'name' => 'Islamic sociology',
                'description' => 'Studies of Islamic society, culture, and social structures.',
            ],
            [
                'name' => 'The practice of Islam, the five duties of a Muslim. Pillars of Islam',
                'description' => 'Works on the five pillars of Islam and Islamic practices.',
            ],
            [
                'name' => 'Jihad (Holy War)',
                'description' => 'Works on the concept of jihad in Islamic tradition.',
            ],
            [
                'name' => 'Religious ceremonies, rites, etc.',
                'description' => 'Works on Islamic rituals, ceremonies, and religious practices.',
            ],
            [
                'name' => 'Special days and seasons, fasts, feasts, festivals, etc.',
                'description' => 'Works about Islamic holidays, fasting, and special occasions.',
            ],
            [
                'name' => 'Relics Shrines, sacred places, etc.',
                'description' => 'Works about holy sites, shrines, and sacred places in Islam.',
            ],
            [
                'name' => 'Islamic religious life',
                'description' => 'Works on living a religious life according to Islamic principles.',
            ],
            [
                'name' => 'Devotional literature',
                'description' => 'Spiritual and devotional works for personal worship and reflection.',
            ],
            [
                'name' => 'Sufism. Mysticism. Dervishes',
                'description' => 'Works on Islamic mysticism, Sufism, and spiritual practices.',
            ],
            [
                'name' => 'Monasticism Branches, sects, etc.',
                'description' => 'Works on different Islamic schools of thought and sects.',
            ],
            [
                'name' => 'Shiites',
                'description' => 'Works related to Shia Islam and its traditions.',
            ],
            [
                'name' => 'Black Muslims',
                'description' => 'Works about the experience of Black Muslims and their contributions.',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
