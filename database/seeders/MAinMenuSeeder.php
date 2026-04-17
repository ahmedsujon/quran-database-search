<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MAinMenuSeeder extends Seeder
{

    public function run()
    {
        DB::table('main_menus')->truncate();

        $menuItems = [
            ['id' => 1, 'menu_name' => "1. Topics on Allah, i.e., Allah's Will, Face of Allah, Mercy of Allah, Allah's Forgiveness, Allah's Greatest Names, Allah's Light, etc.", 'menu_name_arabic' => "1. مواضيع عن الله  عز وجل  إرادة الله , مغفرة الله , نور الله, أسماء الله الحسنى(31 موضوعا)"],

            ['id' => 2, 'menu_name' => "2. Other Topics Directly Related to Allah, Including Allah's Actions Against Disbelievers, Friends of Allah, Whom Allah's Loves, Not Love, His Curse, Who He Guides, Does not Guide, Etc", 'menu_name_arabic' => "2. مواضيع  أخرى متعلقة  مباشرة بالله  بما في ذلك أفعال الله ضد الكافرين , ومن يحبهم الله , وكيف تنال رحمة الله  ومغفرته  , ومن لا يحبهم , ومن يلعنهم(17 موضوعا)"],

            ['id' => 3, 'menu_name' => "3. Verses on Prophets SAW, his Companions and General Information on Other Prophets. Note that the Prophetic Stories  are in a Separate Menu below", 'menu_name_arabic' => "3. ايات  عن النبي محمد صلى الله عليه وسلم , ومعلومات عامة عن الأنبياء  الاخرين  (يرجى  ملاحظة ان قصص الأنبياء  موجودة  في قائمة منفصلة  ادناه  19 موضوعا)"],

            ['id' => 4, 'menu_name' => "4. Quran Study: Abrogation of Verses, Prohibitions in Quran, Learning and Teachings of Quran, Its Unique Verses, Benefits of Quran Verses and Surahs, and How Quran Used Various Words to Describe, Emphasize, or articulate its Message", 'menu_name_arabic' => "4. دراسة القران  نسخ الايات  المحظورات في القران  تعلم القران وتعليمه  فوائد سور القران(25 موضوعا)"],

            ['id' => 5, 'menu_name' => "5. Quran Verses on the Pillars of Islam, i.e., Faith, Prayer, Zakat, Fasting, Hajj, Etc.", 'menu_name_arabic' => "5. ايات قرانية  عن اركان الإسلام   الصلاة وظوابطها , الصوم وضوابطها , الزكاة وضوابطها , الحج القدر (28 موضوعا)"],

            ['id' => 6, 'menu_name' => "6. Marriage, Divorce, Mahr, Husband's Right over Women, Being Kind to Wife, Husband and Wife's Responsibility, Discrimination Between Male and Females, Law of Equality, Law of Inheritance, Etc", 'menu_name_arabic' => "6. الزواج , الطلاق,  المعاملة بين الأزواج,  الإرث(18 موضوعا)"],

            ['id' => 7, 'menu_name' => "7. Activities in Our Daily Life: Making Intention, Saying Bismillah and Inshallah, Greetings, How to Receive Allah's Mercy and Forgiveness, Interest, Repentance, Hijab, Anger Control, How to be Successful, Eating Food of the People of the Book, Envy, Good Spending Behaviour, Social Behaviour, Riya, Kindness, Begging, Visiting Grave, Drinking, Creation of Will", 'menu_name_arabic' => "7. أنشطة في حياتنا اليومية من الذي يجب ان نتخذه كمعلم دين , التجارة ,الحجاب,  الطعام الحلال , شرب الخمر  ,زيارة القبور , الوصية(55 موضوعا)"],

            ['id' => 8, 'menu_name' => "8. General Topics on Accountability, Friendship, Reminder of genorosity, Idle Talk, Intercession, Ruqya, Jihad, Zikr, Nightly Worship, Halal and Forbidden Food, Parenting, Revenge, Muslim Brotherhood, Obeying People in Authority, Trials in Islam, Losers or Unsuccessful, Expiation for doing Wrong, Lawful Earning, Exercising Patience", 'menu_name_arabic' => "8. مواضيع عامة  المساءلة , اللغو  ,الشفاعة , الرقية الشرعية ,الذكر ,التربية , طاعة اولي الامر(43 موضوعا)"],

            ['id' => 9, 'menu_name' => "9 Social Evils Like Slander, Spreading Rumor, Spying, Adultery. Arrogance, Back Biting, Being Ungrateful, Bribery, Greed, Guarding Tongue, Homosexuals, Liar, Thief, Treachery, Prostitution", 'menu_name_arabic' => "9. الاعمال السيءة  الافتراء , نشر الشائعات , التجسس, الزنا ,المثلية الجنسية (20 موضوعا)"],

            ['id' => 10, 'menu_name' => "10. Special Topics on Current Condition of the Muslims, Transitory Nature of the World, Deception, How to save yourself from Satan, Allah's Checks and Balances to Control Mankind, Kowledge of the Unseen, Status of Chosen Few, Revert, Intention of the Disbelievers Towards Muslim, Dead Benefitting from the Living, Book of Record, Regrets, Martyrs, Etc.", 'menu_name_arabic' => "10. مواضيع  خاصة  حول الوضع الحالي للمسلمين , حكمة الله في توازن هذا العالم  ,مواقف  الكفار تجاه المسلمين ,معرفة  الغيب(34 موضوعا)"],

            ['id' => 11, 'menu_name' => "11. Verses on Characteristic of Believers, Disbelievers, Mankind, etc., and a look at the various Groups mentioned in the Quran", 'menu_name_arabic' => "11. ايات عن صفات  المومنين  وصفات الكافرين   سلوك   المخلوقات الانس  الجن المومنون  الكافر ون  ونظرة عن جميع المجموعات المذكورة في القران(49 موضوعا)"],

            ['id' => 12, 'menu_name' => "12. Verses on Religion and Signs of Allah, i.e. Sincerity in Religion, No Compulsion or Freedom of Religion, Freedom of Will, Islam is the Accepted Religion of Allah, List of Signs of Allah, Etc", 'menu_name_arabic' => "12. ايات  عن الدين   الإخلاص في الدين  الإسلام هو دين الله  المقبول(9 موضوعا)"],

            ['id' => 13, 'menu_name' => "13. Verses realated to Description of Hell and Heaven, Resurrection, Hereafter, Conditions of People in Hereafter, Various Names, Descriptions, Conditions, Processes and Events of Judgement Day, Timing and Signs of Last Day", 'menu_name_arabic' => "13. مختلف الايات  حول وصف النار  والجنة  البعث الاخرة  أحوال الناس في الاخرة  أسماء واحوال يوم القيامة(19 موضوعا)"],

            ['id' => 14, 'menu_name' => "14. Virtuous Act of a Believer: Being Just Witness and Fighting for Justice, Pardoning Others, Being Grateful, Being Clean, Helping the Needy, Enjoining Right and Forbidding Evil, , Being Just and Fighting for Justice, Repenting and Reforming Self, Etc", 'menu_name_arabic' => "14. اعمال المؤمن الصالحة:   الشهادة  العادلة  الجهاد في سبيل الله  الامر بالمعروف النهي عن المنكر العدل التوبة(34 موضوعا)"],

            ['id' => 15, 'menu_name' => "15. All Doas or Supplications Mentioned in the Quran including Asking Others to Pray, or Praying for Others", 'menu_name_arabic' => "15. الدعاء : مختلف  أنواع الادعية التي جاءت في القران الكريم  ضوابط الدعاء  الدعاء الممنوع(16 موضوعا)"],

            ['id' => 16, 'menu_name' => "16. Religious Information or Knowledge: Holy Spirit, Testing Mankind, Blowing of Trumpet, Maintaining Mosque, Whom Allah Punishes, Fortune Teller, Joining Disbeliever's Army, Sustenance and Rizk", 'menu_name_arabic' => "16. معلومات دينية  اختبار البشر ,النفخ في الصور , صيانة المساجد, الأماكن الدينية المختلفة(22 موضوعا)"],

            ['id' => 17, 'menu_name' => "17. Stories of Various Battles (Badr, Uhud, Etc), Rules and strategy in battles, Killing and Rules of Killing, Understanding the Key Verses on Killing that Non-Muslim Focus on, Prisoners, Self Defence", 'menu_name_arabic' => "17. قصص عن مختلف المعارك التي ذكرها القران الكريم  واسبابها  وشروط القتال   اسرى الحرب,(17 موضوعا)"],

            ['id' => 18, 'menu_name' => "18. Various Conversations Mentioned in the Quran, i.e., Conversation Between Allah and Adam, Conversation Between Allah and Moses, Conversation Between the Inhabitants of Heaven and Hell, etc.", 'menu_name_arabic' => "18. مختلف أنواع الحوارات الواردة في القران الكريم(20 موضوعا)"],

            ['id' => 19, 'menu_name' => "19. Verses on the Various Prophet Stories Mentioned in the Quran, i.e., Story of Moses and Pharoah, Story of Joseph, etc", 'menu_name_arabic' => "19. مختلف   قصص الأنبياء  المذكورة  في القران(39 موضوعا)"],

            ['id' => 20, 'menu_name' => "20. Verses on the Various Non Prophet Stories Mentioned in the Quran, i.e., Necklace of Aisha, Story of Habil and Qabil, Companion of Cave, etc", 'menu_name_arabic' => "20. أنواع أخرى من قصص ذكرت في القران  مثال : قصة هابيل وقابيل , قصة  ذو القرنين  ,ياجوج وماجوج  ,أصحاب الكهف(15 موضوعا)"],

            ['id' => 21, 'menu_name' => "21. Verses on whom the Quran were addressed to, i.e., Addressed to believers, Addressed to Mankind, Addressed to Prophet, etc.", 'menu_name_arabic' => "21. مختلف الايات التي ذكرت كل المخاطبات  مثال   مخاطبة الانسان , الجن  ,م النبي , بني إسرائيل  المومنين ,الكفار(11 موضوعا)"],

            ['id' => 22, 'menu_name' => "22. Miscellenous", 'menu_name_arabic' => "22. معلومات  متنوعة  عن الايتام ,  الاجتماعات السرية , تسبيح الطير والحيوانات,(30 موضوعا)"],
        ];

        DB::table('main_menus')->insert($menuItems);
    }
}
