<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MAinMenuSeeder extends Seeder
{
    public function run()
    {
        $menuItems = [
            ['id' => 1, 'menu_name' => "Topics on Allah, Topics include Allah’s Will, Face of Allah, Mercy of Allah, Allah’s Forgiveness, Allah’s Greatest Names, Allah's Light, and more."],
            ['id' => 2, 'menu_name' => "Other Topics Directly Related to Allah, Including Allah's Actions Against Disbelievers, Friends of Allah, Whom Allah Loves, Not Love, His Curse, Who He Guides, Does not Guide, Etc."],
            ['id' => 3, 'menu_name' => "Verses on Prophets SAW, his Companions and General Information on Other Prophets. Note that the Prophetic Stories are in a Separate Menu below."],
            ['id' => 4, 'menu_name' => "Quran Study: Abrogation of Verses, Prohibitions in Quran, Learning and Teachings of Quran, Its Unique Verses, Benefits of Quran Verses and Surahs, and How Quran Used Various Words to Describe, Emphasize, or articulate its Message"],
            ['id' => 5, 'menu_name' => "Quran Verses on the Pillars of Islam, i.e., Faith, Prayer, Zakat, Fasting, Hajj, Etc."],
            ['id' => 6, 'menu_name' => "Marriage, Divorce, Mahr, Husband's Right over Women, Being Kind to Wife, Husband and Wife's Responsibility, Discrimination Between Male and Females, Law of Equality, Law of Inheritance, Etc"],
            ['id' => 7, 'menu_name' => "Activities in Our Daily Life"],
            ['id' => 8, 'menu_name' => "Current Topics"],
            ['id' => 9, 'menu_name' => "Social Evils"],
            ['id' => 10, 'menu_name' => "Special Topics, Current Condition of the Muslims, Transitory Nature of the World and its Traps, Know the Satan and how to save yourself, How Allah uses Checks and Balances to Control Mankind, Kowledge of the Unseen, Etc."],
            ['id' => 11, 'menu_name' => "Verses on Characteristic of Believers, Disbelievers, Mankind, etc., and a look at the various Groups mentioned in the Quran"],
            ['id' => 12, 'menu_name' => "Verses on Religion and Signs of Allah, i.e. Sincerity in Religion, No Compulsion or Freedom of Religion, Freedom of Will, Islam is the Accepted Religion of Allah, List of Signs of Allah, Etc"],
            ['id' => 13, 'menu_name' => "Verses realated to Description of Hell and Heaven, Resurrection, Hereafter, Conditions of People in Hereafter, Various Names, Descriptions, Conditions, Processes and Events of Judgement Day, Timing and Signs of Last Day"],
            ['id' => 14, 'menu_name' => "Virtuous Act of a Believer: Being Just Witness and Fighting for Justice, Pardoning Others, Being Grateful, Being Clean, Helping the Needy, Enjoining Right and Forbidding Evil, , Being Just and Fighting for Justice, Repenting and Reforming Self, Etc"],
            ['id' => 15, 'menu_name' => "All Doas or Supplications Mentioned in the Quran including Asking Others to Pray, or Praying for Others"],
            ['id' => 16, 'menu_name' => "Religious Information or Knowledge"],
            ['id' => 17, 'menu_name' => "Stories of Various Battles (Badr, Uhud, Etc), Rules and strategy in battles, Killing and Rules of Killing, Understanding the Key Verses on Killing that Non-Muslim Focus on, Prisoners, Self Defence"],
            ['id' => 18, 'menu_name' => "Various Conversations Mentioned in the Quran, i.e., Conversation Between Allah and Adam, Conversation Between Allah and Moses, Conversation Between the Inhabitants of Heaven and Hell, etc."],
            ['id' => 19, 'menu_name' => "Verses on the Various Prophet Stories Mentioned in the Quran, i.e., Story of Moses and Pharoah, Story of Joseph, etc"],
            ['id' => 20, 'menu_name' => "Verses on the Various Non Prophet Stories Mentioned in the Quran, i.e., Necklace of Aisha, Story of Habil and Qabil, Companion of Cave, etc"],
            ['id' => 21, 'menu_name' => "Verses on whom the Quran were addressed to, i.e., Addressed to believers, Addressed to Mankind, Addressed to Prophet, etc."],
            ['id' => 22, 'menu_name' => "Miscellenous"]
        ];

        DB::table('main_menus')->insert($menuItems);
    }
}
