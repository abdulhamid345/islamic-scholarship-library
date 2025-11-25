<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ScholarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Seeds the scholars table with prominent Islamic scholars.
     * Each scholar includes name, slug, biography, and years active.
     */
    public function run(): void
    {
        $scholars = [
            [
                'name' => 'Ibn Taymiyyah',
                'biography' => 'Taqi ad-Din Ahmad ibn Taymiyyah (1263-1328 CE) was a medieval Islamic scholar, jurist, and theologian. He is known for his extensive writings on Islamic jurisprudence, theology, and his influence on the Salafi movement.',
                'years_active' => '1263-1328',
            ],
            [
                'name' => 'Imam Al-Ghazali',
                'biography' => 'Abu Hamid al-Ghazali (1058-1111 CE) was a Persian Muslim theologian, jurist, philosopher, and mystic. He is considered one of the most influential scholars in Islamic history, particularly known for his work "Ihya Ulum al-Din" (The Revival of the Religious Sciences).',
                'years_active' => '1058-1111',
            ],
            [
                'name' => 'Ibn Kathir',
                'biography' => 'Abu al-Fida Isma\'il ibn Umar ibn Kathir (1300-1373 CE) was a highly influential historian, exegete, and scholar during the Mamluk era. He is best known for his Quranic commentary "Tafsir Ibn Kathir" and his historical work "Al-Bidayah wa al-Nihayah".',
                'years_active' => '1300-1373',
            ],
            [
                'name' => 'Imam Bukhari',
                'biography' => 'Muhammad ibn Ismail al-Bukhari (810-870 CE) was a Persian Islamic scholar who compiled the hadith collection known as Sahih al-Bukhari, regarded by Sunni Muslims as one of the most authentic hadith collections.',
                'years_active' => '810-870',
            ],
            [
                'name' => 'Imam Muslim',
                'biography' => 'Muslim ibn al-Hajjaj (815-875 CE) was a Persian Islamic scholar, particularly known as a muhaddith. His hadith collection, Sahih Muslim, is one of the six major hadith collections in Sunni Islam.',
                'years_active' => '815-875',
            ],
            [
                'name' => 'Ibn Sina (Avicenna)',
                'biography' => 'Ibn Sina (980-1037 CE), known in the West as Avicenna, was a Persian polymath who is regarded as one of the most significant physicians, astronomers, thinkers, and writers of the Islamic Golden Age. His "Canon of Medicine" was a standard medical text in Europe for centuries.',
                'years_active' => '980-1037',
            ],
            [
                'name' => 'Ibn Rushd (Averroes)',
                'biography' => 'Ibn Rushd (1126-1198 CE), known in the West as Averroes, was an Andalusian polymath and jurist who wrote about many subjects, including philosophy, theology, medicine, astronomy, physics, psychology, mathematics, Islamic jurisprudence and law, and linguistics.',
                'years_active' => '1126-1198',
            ],
            [
                'name' => 'Imam Malik',
                'biography' => 'Malik ibn Anas (711-795 CE) was an Arab Muslim jurist, theologian, and hadith traditionist. He is the founder of the Maliki school of Islamic jurisprudence, one of the four major Sunni schools of law.',
                'years_active' => '711-795',
            ],
            [
                'name' => 'Imam Shafi\'i',
                'biography' => 'Abu Abdullah Muhammad ibn Idris al-Shafi\'i (767-820 CE) was an Arab Muslim theologian, writer, and scholar, who was the first contributor of the principles of Islamic jurisprudence. He founded the Shafi\'i school of Islamic jurisprudence.',
                'years_active' => '767-820',
            ],
            [
                'name' => 'Imam Abu Hanifa',
                'biography' => 'Abu Hanifa (699-767 CE) was a Sunni Muslim theologian and jurist who became the founder of the Hanafi school of Islamic jurisprudence, which remains the most widely practiced school of law in the Sunni tradition.',
                'years_active' => '699-767',
            ],
            [
                'name' => 'Ibn Qayyim al-Jawziyya',
                'biography' => 'Ibn Qayyim al-Jawziyya (1292-1350 CE) was an important medieval Islamic jurist, theologian, and spiritual writer. He was a disciple of Ibn Taymiyyah and is known for his works on Islamic jurisprudence, theology, and spirituality.',
                'years_active' => '1292-1350',
            ],
            [
                'name' => 'Al-Tabari',
                'biography' => 'Muhammad ibn Jarir al-Tabari (839-923 CE) was a Persian historian and scholar from Amol, Tabaristan. Among his most influential works are his Quranic commentary known as Tafsir al-Tabari and his historical chronicle Tarikh al-Rusul wa al-Muluk (History of the Prophets and Kings).',
                'years_active' => '839-923',
            ],
            [
                'name' => 'Ibn Hajar al-Asqalani',
                'biography' => 'Ibn Hajar al-Asqalani (1372-1449 CE) was a medieval Shafi\'i Sunni scholar of Islam whose works are considered authoritative in the fields of hadith and fiqh. He is best known for his commentary on Sahih al-Bukhari, titled "Fath al-Bari".',
                'years_active' => '1372-1449',
            ],
            [
                'name' => 'Al-Nawawi',
                'biography' => 'Muhyi al-Din Abu Zakariyya Yahya ibn Sharaf al-Nawawi (1233-1277 CE) was a Sunni Shafi\'ite jurist and hadith scholar. He authored numerous and lengthy works ranging from hadith, to theology, biography, and jurisprudence.',
                'years_active' => '1233-1277',
            ],
            [
                'name' => 'Ibn Arabi',
                'biography' => 'Ibn Arabi (1165-1240 CE) was an Arab Andalusian Muslim scholar, mystic, poet, and philosopher. He is renowned by practitioners of Sufism as "the greatest master" and is considered a saint. His works include "Fusus al-Hikam" and "Al-Futuhat al-Makkiyya".',
                'years_active' => '1165-1240',
            ],
        ];

        foreach ($scholars as $scholar) {
            DB::table('scholars')->insert([
                'name' => $scholar['name'],
                'slug' => Str::slug($scholar['name']),
                'biography' => $scholar['biography'],
                'years_active' => $scholar['years_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

