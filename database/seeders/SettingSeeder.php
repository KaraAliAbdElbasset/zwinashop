<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $settings = [
        [
            'key'                       =>  'site_name',
            'value'                     =>  '7Clics',
        ],
        [
            'key'                       =>  'contact_email',
            'value'                     =>  'contact@7clics.com',
        ],
        [
            'key'                       =>  'default_email_address',
            'value'                     =>  'info@7clics.com',
        ],
        [
            'key'                       =>  'phone_1',
            'value'                     =>  '(xxx) xxxx xx xx xx',
        ],
        [
            'key'                       =>  'phone_2',
            'value'                     =>  '(xxx) xxxx xx xx xx',
        ],
        [
            'key'                       =>  'fax',
            'value'                     =>  '(xxx) xxxx xx xx xx',
        ],
        [
            'key'                       =>  'currency_code',
            'value'                     =>  'DZD',
        ],
        [
            'key'                       =>  'address',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'city',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'country',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'zip_code',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'bio',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_linkedin',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_youtube',
            'value'                     =>  '',
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->settings). ' records');
    }
}
