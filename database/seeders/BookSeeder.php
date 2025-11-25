<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Seeds the books table with sample Islamic books.
     * Books are linked to scholars and categories from the database.
     */
    public function run(): void
    {
        // Get all scholars and categories to link books
        $scholars = DB::table('scholars')->get();
        $categories = DB::table('categories')->get();

        if ($scholars->isEmpty() || $categories->isEmpty()) {
            $this->command->warn('Please run ScholarSeeder and CategorySeeder first!');
            return;
        }

        // Create a mapping of scholar names to IDs for easier reference
        $scholarMap = [];
        foreach ($scholars as $scholar) {
            $scholarMap[$scholar->name] = $scholar->id;
        }

        // Create a mapping of category names to IDs
        $categoryMap = [];
        foreach ($categories as $category) {
            $categoryMap[$category->name] = $category->id;
        }

        // Sample books with their associated scholars and categories
        $books = [
            [
                'title' => 'Ihya Ulum al-Din',
                'scholar' => 'Imam Al-Ghazali',
                'category' => 'Devotional literature',
                'description' => 'The Revival of the Religious Sciences - A comprehensive work on Islamic spirituality and practice.',
                'file' => 'ihya-ulum-al-din.pdf',
            ],
            [
                'title' => 'Tafsir Ibn Kathir',
                'scholar' => 'Ibn Kathir',
                'category' => 'Qur\'an, Special parts and chapters, Works about the Qur\'an',
                'description' => 'A comprehensive commentary on the Holy Quran, one of the most widely read tafsirs.',
                'file' => 'tafsir-ibn-kathir.pdf',
            ],
            [
                'title' => 'Sahih al-Bukhari',
                'scholar' => 'Imam Bukhari',
                'category' => 'Hadith literature, Traditions, Sunnah',
                'description' => 'One of the six major hadith collections in Sunni Islam, considered the most authentic.',
                'file' => 'sahih-al-bukhari.pdf',
            ],
            [
                'title' => 'Sahih Muslim',
                'scholar' => 'Imam Muslim',
                'category' => 'Hadith literature, Traditions, Sunnah',
                'description' => 'One of the six major hadith collections in Sunni Islam, second only to Sahih al-Bukhari.',
                'file' => 'sahih-muslim.pdf',
            ],
            [
                'title' => 'Al-Muwatta',
                'scholar' => 'Imam Malik',
                'category' => 'Hadith literature, Traditions, Sunnah',
                'description' => 'The earliest written collection of hadith comprising the legal practices and traditions of the Prophet.',
                'file' => 'al-muwatta.pdf',
            ],
            [
                'title' => 'Al-Risala',
                'scholar' => 'Imam Shafi\'i',
                'category' => 'Theology (Kalaam)',
                'description' => 'A foundational work on the principles of Islamic jurisprudence (usul al-fiqh).',
                'file' => 'al-risala.pdf',
            ],
            [
                'title' => 'Al-Fiqh al-Akbar',
                'scholar' => 'Imam Abu Hanifa',
                'category' => 'Dogma (\'Aqa\'id)',
                'description' => 'A treatise on Islamic creed and theology attributed to Imam Abu Hanifa.',
                'file' => 'al-fiqh-al-akbar.pdf',
            ],
            [
                'title' => 'Majmu\' al-Fatawa',
                'scholar' => 'Ibn Taymiyyah',
                'category' => 'Theology (Kalaam)',
                'description' => 'A collection of fatwas and scholarly opinions by Ibn Taymiyyah on various Islamic topics.',
                'file' => 'majmu-al-fatawa.pdf',
            ],
            [
                'title' => 'Zad al-Ma\'ad',
                'scholar' => 'Ibn Qayyim al-Jawziyya',
                'category' => 'Prophet Muhammad (SAW)',
                'description' => 'Provisions for the Hereafter - A comprehensive guide to the life and practices of Prophet Muhammad.',
                'file' => 'zad-al-maad.pdf',
            ],
            [
                'title' => 'Tafsir al-Tabari',
                'scholar' => 'Al-Tabari',
                'category' => 'Qur\'an, Special parts and chapters, Works about the Qur\'an',
                'description' => 'A comprehensive commentary on the Quran by Al-Tabari, one of the earliest and most extensive tafsirs.',
                'file' => 'tafsir-al-tabari.pdf',
            ],
            [
                'title' => 'Fath al-Bari',
                'scholar' => 'Ibn Hajar al-Asqalani',
                'category' => 'Hadith literature, Traditions, Sunnah',
                'description' => 'A comprehensive commentary on Sahih al-Bukhari, considered one of the most important hadith commentaries.',
                'file' => 'fath-al-bari.pdf',
            ],
            [
                'title' => 'Riyad al-Salihin',
                'scholar' => 'Al-Nawawi',
                'category' => 'Devotional literature',
                'description' => 'The Gardens of the Righteous - A collection of hadiths on ethics, manners, and worship.',
                'file' => 'riyad-al-salihin.pdf',
            ],
            [
                'title' => 'Fusus al-Hikam',
                'scholar' => 'Ibn Arabi',
                'category' => 'Sufism. Mysticism. Dervishes',
                'description' => 'The Bezels of Wisdom - A mystical work on the wisdom of the prophets.',
                'file' => 'fusus-al-hikam.pdf',
            ],
            [
                'title' => 'The Canon of Medicine',
                'scholar' => 'Ibn Sina (Avicenna)',
                'category' => 'General works on Islam',
                'description' => 'A medical encyclopedia that was a standard medical text in Europe and the Islamic world for centuries.',
                'file' => 'canon-of-medicine.pdf',
            ],
            [
                'title' => 'The Incoherence of the Incoherence',
                'scholar' => 'Ibn Rushd (Averroes)',
                'category' => 'Theology (Kalaam)',
                'description' => 'A philosophical work defending Aristotelian philosophy against the attacks of Al-Ghazali.',
                'file' => 'incoherence-of-incoherence.pdf',
            ],
            [
                'title' => 'Tarikh al-Rusul wa al-Muluk',
                'scholar' => 'Al-Tabari',
                'category' => 'History & Biography',
                'description' => 'History of the Prophets and Kings - A comprehensive historical chronicle from creation to the 10th century.',
                'file' => 'tarikh-al-rusul-wa-al-muluk.pdf',
            ],
            [
                'title' => 'Al-Bidayah wa al-Nihayah',
                'scholar' => 'Ibn Kathir',
                'category' => 'History & Biography',
                'description' => 'The Beginning and the End - A comprehensive historical work covering Islamic history.',
                'file' => 'al-bidayah-wa-al-nihayah.pdf',
            ],
            [
                'title' => 'Al-Futuhat al-Makkiyya',
                'scholar' => 'Ibn Arabi',
                'category' => 'Sufism. Mysticism. Dervishes',
                'description' => 'The Meccan Revelations - A major work of Islamic mysticism and philosophy.',
                'file' => 'al-futuhat-al-makkiyya.pdf',
            ],
        ];

        foreach ($books as $book) {
            // Find the scholar and category IDs
            $scholarId = $scholarMap[$book['scholar']] ?? null;
            $categoryId = $categoryMap[$book['category']] ?? null;

            if (!$scholarId || !$categoryId) {
                $this->command->warn("Skipping book '{$book['title']}' - scholar or category not found.");
                continue;
            }

            DB::table('books')->insert([
                'title' => $book['title'],
                'scholar_id' => $scholarId,
                'category_id' => $categoryId,
                'slug' => Str::slug($book['title']),
                'description' => $book['description'],
                'file' => $book['file'],
                'download_count' => rand(0, 1000), // Random download count for seeding
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

