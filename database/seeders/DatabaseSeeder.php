<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $basePrices = $this->seedProducts();
        $this->seedMarkets();
        $this->seedUsers();
        $this->seedPrices($basePrices);
    }

    // ─── Products (52 Authentic items) ──────────
    private function seedProducts(): array
    {
        $products = [
            // Rice (1-6)
            ['মিনিকেট চাল', 'Miniket Rice', 'rice', 'kg', 'wheat', 'Fine-grain premium rice', 68],
            ['নাজিরশাইল চাল', 'Nazirshail Rice', 'rice', 'kg', 'wheat', 'Aromatic long-grain rice', 72],
            ['চিনিগুড়া চাল', 'Chinigura Rice', 'rice', 'kg', 'wheat', 'Small-grain aromatic rice', 120],
            ['বিআর-২৮ চাল', 'BR-28 Rice', 'rice', 'kg', 'wheat', 'High-yield variety', 55],
            ['বিআর-২৯ চাল', 'BR-29 Rice', 'rice', 'kg', 'wheat', 'Affordable coarse-grain rice', 52],
            ['মোটা চাল (স্বর্ণা)', 'Swarna Rice', 'rice', 'kg', 'wheat', 'Coarse Rice for daily consumption', 48],
            // Lentils (7-11)
            ['মসুর ডাল (চিকন)', 'Red Lentil (Fine)', 'lentils', 'kg', 'shopping-bag', 'High-protein fine red lentils', 135],
            ['মসুর ডাল (মোটা)', 'Red Lentil (Coarse)', 'lentils', 'kg', 'shopping-bag', 'Coarse red lentils', 110],
            ['মুগ ডাল', 'Mung Lentil', 'lentils', 'kg', 'shopping-bag', 'Light mung bean dal', 140],
            ['ছোলার ডাল', 'Chickpea Lentil', 'lentils', 'kg', 'shopping-bag', 'Nutritious split chickpeas', 115],
            ['অ্যাংকর ডাল', 'Anchor Lentil', 'lentils', 'kg', 'shopping-bag', 'Affordable dal for snacks', 70],
            // Vegetables (12-28)
            ['পেঁয়াজ (দেশি)', 'Onion (Local)', 'vegetables', 'kg', 'carrot', 'Local onions', 60],
            ['পেঁয়াজ (ইন্ডিয়ান)', 'Onion (Indian)', 'vegetables', 'kg', 'carrot', 'Large Indian imported onions', 50],
            ['আলু (ডায়মন্ড)', 'Potato (Diamond)', 'vegetables', 'kg', 'carrot', 'Versatile white potatoes', 35],
            ['আলু (বগুড়া)', 'Potato (Bogra)', 'vegetables', 'kg', 'carrot', 'Red Bogra potatoes', 45],
            ['কাঁচা মরিচ', 'Green Chilli', 'vegetables', 'kg', 'flame', 'Fresh green chillies', 100],
            ['টমেটো', 'Tomato', 'vegetables', 'kg', 'apple', 'Fresh tomatoes', 50],
            ['বেগুন (লম্বা)', 'Brinjal (Long)', 'vegetables', 'kg', 'carrot', 'Long purple eggplant', 45],
            ['বেগুন (গোল)', 'Brinjal (Round)', 'vegetables', 'kg', 'carrot', 'Round eggplant for fritters', 55],
            ['রসুন (দেশি)', 'Garlic (Local)', 'vegetables', 'kg', 'carrot', 'Local garlic cloves', 200],
            ['রসুন (আমদানি)', 'Garlic (Imported)', 'vegetables', 'kg', 'carrot', 'Large imported garlic', 180],
            ['আদা', 'Ginger', 'vegetables', 'kg', 'carrot', 'Fresh ginger root', 220],
            ['করলা', 'Bitter Gourd', 'vegetables', 'kg', 'carrot', 'Fresh bitter gourd', 60],
            ['লাউ', 'Bottle Gourd', 'vegetables', 'piece', 'carrot', 'Fresh bottle gourd', 50],
            ['শসা', 'Cucumber', 'vegetables', 'kg', 'carrot', 'Fresh local cucumber', 40],
            ['গাজর', 'Carrot', 'vegetables', 'kg', 'carrot', 'Fresh orange carrots', 45],
            ['ধনে পাতা', 'Coriander Leaves', 'vegetables', 'kg', 'leaf', 'Fresh coriander', 120],
            ['লেবু', 'Lemon', 'vegetables', 'hali', 'apple', 'Local lemons (4 pcs)', 20],
            // Fish (29-37)
            ['ইলিশ', 'Hilsa Fish', 'fish', 'kg', 'fish', 'National fish of Bangladesh', 1200],
            ['রুই (দেশি)', 'Rohu Fish', 'fish', 'kg', 'fish', 'Freshwater carp', 350],
            ['কাতল', 'Catla Fish', 'fish', 'kg', 'fish', 'Large freshwater carp', 380],
            ['মৃগেল', 'Mrigal Fish', 'fish', 'kg', 'fish', 'Common carp', 220],
            ['পাঙ্গাস', 'Pangasius Fish', 'fish', 'kg', 'fish', 'Farmed catfish', 180],
            ['তেলাপিয়া', 'Tilapia Fish', 'fish', 'kg', 'fish', 'Farmed tilapia', 160],
            ['শিং মাছ', 'Stinging Catfish', 'fish', 'kg', 'fish', 'High nutrient stinging catfish', 450],
            ['চিংড়ি (গলদা)', 'Prawn (Galda)', 'fish', 'kg', 'bug', 'Giant freshwater prawn', 800],
            ['চিংড়ি (গুঁড়া)', 'Small Shrimp', 'fish', 'kg', 'bug', 'Small river shrimp', 400],
            // Meat (38-42)
            ['গরুর মাংস', 'Beef', 'meat', 'kg', 'drumstick', 'Fresh beef', 750],
            ['খাসির মাংস', 'Mutton', 'meat', 'kg', 'drumstick', 'Goat meat', 1100],
            ['ব্রয়লার মুরগি', 'Broiler Chicken', 'meat', 'kg', 'bird', 'Farm-raised broiler chicken', 180],
            ['সোনালী মুরগি', 'Sonali Chicken', 'meat', 'kg', 'bird', 'Sonali crossbreed chicken', 320],
            ['দেশি মুরগি', 'Deshi Chicken', 'meat', 'kg', 'bird', 'Free-range local chicken', 550],
            // Eggs, Dairy, Oil, Others (43-52)
            ['মুরগির ডিম (ফার্ম)', 'Farm Egg', 'eggs', 'hali', 'egg', 'Farm chicken eggs (4 pcs)', 45],
            ['হাঁসের ডিম', 'Duck Egg', 'eggs', 'hali', 'egg', 'Fresh duck eggs (4 pcs)', 70],
            ['তরল দুধ (প্যাকেট)', 'Packet Milk', 'dairy', 'liter', 'milk', 'Pasteurized liquid milk', 90],
            ['গুঁড়া দুধ (ডানো/ডিপ্লোমা)', 'Powder Milk', 'dairy', 'kg', 'milk', 'Full cream powder milk', 850],
            ['সয়াবিন তেল (লুজ)', 'Soybean Oil (Loose)', 'oil', 'liter', 'droplet', 'Loose soybean oil', 155],
            ['সয়াবিন তেল (বোতল)', 'Soybean Oil (Bottled)', 'oil', 'liter', 'droplet', 'Bottled soybean oil', 168],
            ['সরিষার তেল (ঘানি)', 'Mustard Oil (Ghani)', 'oil', 'liter', 'droplet', 'Pure Ghani mustard oil', 250],
            ['চিনি (সাদা)', 'Sugar (White)', 'sugar', 'kg', 'coffee', 'Refined white sugar', 135],
            ['চিনি (লাল)', 'Sugar (Brown)', 'sugar', 'kg', 'coffee', 'Unrefined brown sugar', 150],
            ['লবণ (প্যাকেট)', 'Salt (Packet)', 'others', 'kg', 'blinds', 'Iodized table salt', 35],
            ['আটা (প্যাকেট)', 'Flour (Atta)', 'others', 'kg', 'wheat', 'Packed whole wheat flour', 55],
            ['ময়দা (প্যাকেট)', 'Flour (Maida)', 'others', 'kg', 'wheat', 'Packed refined flour', 65],
        ];

        $basePrices = [];
        $insertData = [];

        foreach ($products as $i => $p) {
            $insertData[] = [
                'id' => $i + 1,
                'name' => $p[0],
                'name_en' => $p[1],
                'category' => $p[2],
                'unit' => $p[3],
                'icon' => $p[4],
                'description' => $p[5],
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $basePrices[$i + 1] = $p[6];
        }

        DB::table('products')->insert($insertData);
        return $basePrices;
    }

    // ─── 128 Authentic Markets (Exactly 2 real major markets per 64 Districts) ───────
    private function seedMarkets(): void
    {
        $districts = [
            // DHAKA DIVISION (13)
            ['Dhaka', 'Dhaka', [
                ['কাওরান বাজার', 'Kawran Bazar', 'Kawran Bazar, Dhaka', 'wholesale', 23.7513, 90.3934],
                ['যাত্রাবাড়ী আড়ত', 'Jatrabari Arat', 'Jatrabari, Dhaka', 'wholesale', 23.7126, 90.4357]
            ]],
            ['Gazipur', 'Dhaka', [
                ['চৌরাস্তা কাঁচা বাজার', 'Chourasta Kacha Bazar', 'Gazipur Chourasta', 'retail', 23.9889, 90.3800],
                ['টঙ্গী বাজার', 'Tongi Bazar', 'Tongi, Gazipur', 'wholesale', 23.8827, 90.4005]
            ]],
            ['Narayanganj', 'Dhaka', [
                ['নিতাইগঞ্জ বাজার', 'Nitaiganj Bazar', 'Nitaiganj, Narayanganj', 'wholesale', 23.6120, 90.5050],
                ['দ্বিগুবাবুর বাজার', 'Digubabur Bazar', 'Sadar, Narayanganj', 'retail', 23.6238, 90.5000]
            ]],
            ['Tangail', 'Dhaka', [
                ['পার্ক বাজার', 'Park Bazar', 'Tangail Sadar', 'retail', 24.2513, 89.9167],
                ['বটতলা বাজার', 'Bottola Bazar', 'Tangail Sadar', 'wholesale', 24.2480, 89.9200]
            ]],
            ['Kishoreganj', 'Dhaka', [
                ['ভৈরব বাজার', 'Bhairab Bazar', 'Bhairab, Kishoreganj', 'wholesale', 24.0436, 90.9859],
                ['বড় বাজার', 'Boro Bazar', 'Kishoreganj Sadar', 'retail', 24.4344, 90.7818]
            ]],
            ['Manikganj', 'Dhaka', [
                ['মানিকগঞ্জ বাসস্ট্যান্ড বাজার', 'Bus Stand Bazar', 'Manikganj Sadar', 'retail', 23.8644, 90.0047],
                ['ঘিওর হাত', 'Ghior Hat', 'Ghior, Manikganj', 'wholesale', 23.8200, 89.9000]
            ]],
            ['Munshiganj', 'Dhaka', [
                ['মুক্তারপুর বাজার', 'Mukterpur Bazar', 'Munshiganj Sadar', 'retail', 23.5684, 90.5332],
                ['লৌহজং বাজার', 'Lauhajang Bazar', 'Lauhajang, Munshiganj', 'wholesale', 23.3850, 90.2780]
            ]],
            ['Rajbari', 'Dhaka', [
                ['রাজবাড়ী বড় বাজার', 'Rajbari Boro Bazar', 'Rajbari Sadar', 'wholesale', 23.7578, 89.6450],
                ['গোয়ালন্দ খালের বাজার', 'Goalanda Bazar', 'Goalanda, Rajbari', 'retail', 23.8410, 89.7565]
            ]],
            ['Madaripur', 'Dhaka', [
                ['পুরান বাজার', 'Puran Bazar', 'Madaripur Sadar', 'retail', 23.1656, 90.1983],
                ['টেকেরহাট বাজার', 'Tekerhat Bazar', 'Rajoir, Madaripur', 'wholesale', 23.2355, 90.0322]
            ]],
            ['Gopalganj', 'Dhaka', [
                ['গোপালগঞ্জ বড় বাজার', 'Gopalganj Boro Bazar', 'Gopalganj Sadar', 'wholesale', 23.0050, 89.8250],
                ['টুঙ্গিপাড়া বাজার', 'Tungipara Bazar', 'Tungipara, Gopalganj', 'retail', 22.9056, 89.8890]
            ]],
            ['Faridpur', 'Dhaka', [
                ['চক বাজার', 'Chawk Bazar', 'Faridpur Sadar', 'retail', 23.6061, 89.8406],
                ['টেপাখোলা বাজার', 'Tepakhola Bazar', 'Faridpur', 'wholesale', 23.6210, 89.8320]
            ]],
            ['Shariatpur', 'Dhaka', [
                ['আংগারিয়া বাজার', 'Angaria Bazar', 'Shariatpur Sadar', 'wholesale', 23.2100, 90.3550],
                ['নড়িয়া বাজার', 'Naria Bazar', 'Naria, Shariatpur', 'retail', 23.2840, 90.4180]
            ]],
            ['Narsingdi', 'Dhaka', [
                ['ভেলানগর বাজার', 'Velanagar Bazar', 'Narsingdi Sadar', 'retail', 23.9189, 90.7107],
                ['শেখেরচর বাবুরহাট', 'Baburhat Wholesale Bazar', 'Narsingdi', 'wholesale', 23.9290, 90.7020]
            ]],

            // CHITTAGONG DIVISION (11)
            ['Chittagong', 'Chittagong', [
                ['খাতুনগঞ্জ', 'Khatunganj', 'Kotwali, Chittagong', 'wholesale', 22.3338, 91.8398],
                ['রিয়াজউদ্দিন বাজার', 'Riazuddin Bazar', 'Chittagong City', 'retail', 22.3364, 91.8267]
            ]],
            ['Cox\'s Bazar', 'Chittagong', [
                ['কস্তুরাঘাট ফিশ মার্কেট', 'Kasturaghat Fish Market', 'Cox\'s Bazar Sadar', 'wholesale', 21.4426, 91.9790],
                ['বড় বাজার', 'Boro Bazar', 'Cox\'s Bazar City', 'retail', 21.4397, 91.9774]
            ]],
            ['Comilla', 'Chittagong', [
                ['রানীবাজার', 'Ranibazar', 'Comilla City', 'retail', 23.4619, 91.1850],
                ['রাজগঞ্জ বাজার', 'Rajganj Bazar', 'Comilla Sadar', 'wholesale', 23.4600, 91.1820]
            ]],
            ['Noakhali', 'Chittagong', [
                ['চৌমুহনী বাজার', 'Choumuhani Bazar', 'Begumganj, Noakhali', 'wholesale', 22.9463, 91.1093],
                ['সোনাপুর বাজার', 'Sonapur Bazar', 'Noakhali Sadar', 'retail', 22.8250, 91.0965]
            ]],
            ['Feni', 'Chittagong', [
                ['ট্রাংক রোড বাজার', 'Trunk Road Bazar', 'Feni Sadar', 'retail', 23.0159, 91.3976],
                ['মহিপাল কাঁচা বাজার', 'Mohipal Kacha Bazar', 'Feni City', 'wholesale', 23.0235, 91.3854]
            ]],
            ['Brahmanbaria', 'Chittagong', [
                ['জগৎ বাজার', 'Jagat Bazar', 'Brahmanbaria Sadar', 'retail', 23.9744, 91.1121],
                ['আখাউড়া রেলওয়ে বাজার', 'Akhaura Railway Market', 'Akhaura', 'wholesale', 23.8680, 91.2050]
            ]],
            ['Chandpur', 'Chittagong', [
                ['পালবাজার', 'Palbazar', 'Chandpur City', 'wholesale', 23.2321, 90.6433],
                ['নতুন বাজার', 'Notun Bazar', 'Chandpur Sadar', 'retail', 23.2270, 90.6480]
            ]],
            ['Lakshmipur', 'Chittagong', [
                ['রায়পুর বাজার', 'Raipur Bazar', 'Raipur, Lakshmipur', 'wholesale', 23.0370, 90.7680],
                ['দক্ষিণ তেমুহনী', 'Dakhin Temuhani', 'Lakshmipur Sadar', 'retail', 22.9430, 90.8250]
            ]],
            ['Khagrachari', 'Chittagong', [
                ['খাগড়াছড়ি সদর বাজার', 'Sadar Bazar', 'Khagrachari', 'retail', 23.1118, 91.9930],
                ['দিঘীনালা বাজার', 'Dighinala Bazar', 'Dighinala, Khagrachari', 'wholesale', 23.2500, 92.0500]
            ]],
            ['Rangamati', 'Chittagong', [
                ['বনরূপা বাজার', 'Bonrupa Bazar', 'Rangamati', 'retail', 22.6570, 92.1790],
                ['রিজার্ভ বাজার', 'Reserve Bazar', 'Rangamati Sadar', 'wholesale', 22.6450, 92.1950]
            ]],
            ['Bandarban', 'Chittagong', [
                ['বান্দরবান বাজার', 'Bandarban Bazar', 'Bandarban', 'wholesale', 22.1930, 92.2150],
                ['রুমা বাজার', 'Ruma Bazar', 'Ruma, Bandarban', 'retail', 22.0500, 92.4500]
            ]],

            // RAJSHAHI DIVISION (8)
            ['Rajshahi', 'Rajshahi', [
                ['সাহেব বাজার', 'Saheb Bazar', 'Rajshahi City', 'retail', 24.3686, 88.6011],
                ['মাস্টারপাড়া আড়ত', 'Masterpara Arat', 'Rajshahi', 'wholesale', 24.3680, 88.6050]
            ]],
            ['Bogra', 'Rajshahi', [
                ['রাজাবাজার', 'Rajabazar', 'Bogra City', 'retail', 24.8480, 89.3770],
                ['মহাস্থানগড় হাট', 'Mahasthangarh Hat', 'Bogra', 'wholesale', 24.9602, 89.3496]
            ]],
            ['Pabna', 'Rajshahi', [
                ['পাবনা বড় বাজার', 'Pabna Boro Bazar', 'Pabna Sadar', 'wholesale', 24.0080, 89.2430],
                ['ঈশ্বরদী বাজার', 'Ishwardi Bazar', 'Ishwardi, Pabna', 'retail', 24.1200, 89.0600]
            ]],
            ['Sirajganj', 'Rajshahi', [
                ['এস.এস. রোড বাজার', 'SS Road Bazar', 'Sirajganj City', 'retail', 24.4520, 89.7040],
                ['উল্লাপাড়া বাজার', 'Ullapara Bazar', 'Ullapara, Sirajganj', 'wholesale', 24.3160, 89.5630]
            ]],
            ['Naogaon', 'Rajshahi', [
                ['কাঁচাবাজার ଆড়ত', 'Raw Market Arat', 'Naogaon Sadar', 'wholesale', 24.8090, 88.9320],
                ['নিয়ামতপুর বাজার', 'Niamatpur Bazar', 'Niamatpur', 'retail', 24.8500, 88.6500]
            ]],
            ['Natore', 'Rajshahi', [
                ['নীচাবাজার', 'Nichabazar', 'Natore Sadar', 'retail', 24.4170, 88.9800],
                ['বনপাড়া হাট', 'Bonpara Hat', 'Baraigram, Natore', 'wholesale', 24.2800, 89.0900]
            ]],
            ['Chapainawabganj', 'Rajshahi', [
                ['শিবগঞ্জ ম্যাঙ্গো মার্কেট', 'Shibganj Mango Market', 'Shibganj', 'wholesale', 24.6850, 88.1630],
                ['নিউ মার্কেট কাঁচাবাজার', 'New Market', 'Sadar', 'retail', 24.5940, 88.2700]
            ]],
            ['Joypurhat', 'Rajshahi', [
                ['জয়পুরহাট বড় বাজার', 'Boro Bazar', 'Joypurhat Sadar', 'wholesale', 25.1000, 89.0200],
                ['পাঁচবিবি বাজার', 'Panchbibi Bazar', 'Panchbibi', 'retail', 25.2000, 89.0100]
            ]],

            // KHULNA DIVISION (10)
            ['Khulna', 'Khulna', [
                ['বড় বাজার', 'Boro Bazar', 'Khulna City', 'wholesale', 22.8137, 89.5694],
                ['রূপসা পাইকারি বাজার', 'Rupsha Market', 'Khulna', 'retail', 22.8021, 89.5777]
            ]],
            ['Jessore', 'Khulna', [
                ['বড় বাজার চৌরাস্তা', 'Boro Bazar Chourasta', 'Jessore City', 'retail', 23.1670, 89.2130],
                ['নওয়াপাড়া বাজার', 'Noapara Market', 'Abhaynagar, Jessore', 'wholesale', 23.0230, 89.4180]
            ]],
            ['Satkhira', 'Khulna', [
                ['সুলতানপুর বড় বাজার', 'Sultanpur Boro Bazar', 'Satkhira Sadar', 'wholesale', 22.7160, 89.0740],
                ['কালীগঞ্জ বাজার', 'Kaliganj Bazar', 'Kaliganj, Satkhira', 'retail', 22.4500, 89.0350]
            ]],
            ['Meherpur', 'Khulna', [
                ['মেহেরপুর বড় বাজার', 'Meherpur Boro Bazar', 'Meherpur', 'wholesale', 23.7650, 88.6300],
                ['গাংনী বাজার', 'Gangni Bazar', 'Gangni, Meherpur', 'retail', 23.8200, 88.7500]
            ]],
            ['Narail', 'Khulna', [
                ['রূপগঞ্জ বাজার', 'Rupganj Bazar', 'Narail Sadar', 'retail', 23.1700, 89.4980],
                ['কালিয়া বাজার', 'Kalia Bazar', 'Kalia, Narail', 'wholesale', 23.0300, 89.6100]
            ]],
            ['Chuadanga', 'Khulna', [
                ['চুয়াডাঙ্গা বড় বাজার', 'Chuadanga Boro Bazar', 'Chuadanga', 'wholesale', 23.6390, 88.8500],
                ['আলমডাঙ্গা বাজার', 'Alamdanga Bazar', 'Alamdanga', 'retail', 23.7500, 88.9450]
            ]],
            ['Kushtia', 'Khulna', [
                ['মিউনিসিপ্যাল মার্কেট', 'Municipal Market', 'Kushtia', 'retail', 23.9050, 89.1230],
                ['পোড়াদহ হাট', 'Poradah Hat', 'Mirpur, Kushtia', 'wholesale', 23.8500, 89.0200]
            ]],
            ['Magura', 'Khulna', [
                ['ভায়না মোড় বাজার', 'Vayna Mor Bazar', 'Magura', 'retail', 23.4860, 89.4200],
                ['খামারপাড়া হাট', 'Khamarpara Hat', 'Magura Sadar', 'wholesale', 23.4900, 89.4400]
            ]],
            ['Bagerhat', 'Khulna', [
                ['ফলপট্টি বাজার', 'Folpotti Bazar', 'Bagerhat Sadar', 'wholesale', 22.6580, 89.7900],
                ['ফকিরহাট বাজার', 'Fakirhat Bazar', 'Fakirhat', 'retail', 22.7800, 89.6500]
            ]],
            ['Jhenaidah', 'Khulna', [
                ['ঝিনাইদহ কাঁচাবাজার', 'Jhenaidah Kacha Bazar', 'Jhenaidah', 'retail', 23.5420, 89.1750],
                ['কোটচাঁদপুর বাজার', 'Kotchandpur Bazar', 'Kotchandpur', 'wholesale', 23.4000, 89.0200]
            ]],

            // BARISHAL DIVISION (6)
            ['Barishal', 'Barishal', [
                ['পোর্ট রোড মৎস্য বাজার', 'Port Road Market', 'Barishal City', 'wholesale', 22.6965, 90.3703],
                ['চৌমাথা বাজার', 'Choumatha Bazar', 'Barishal', 'retail', 22.7095, 90.3541]
            ]],
            ['Patuakhali', 'Barishal', [
                ['হেতালিয়া বাঁধ বাজার', 'Hetalia Bāndh Bazar', 'Patuakhali', 'retail', 22.3550, 90.3200],
                ['কলাপাড়া বাজার', 'Kalapara Bazar', 'Kalapara', 'wholesale', 21.9800, 90.2400]
            ]],
            ['Bhola', 'Barishal', [
                ['নতুন বাজার', 'Notun Bazar', 'Bhola Sadar', 'retail', 22.6900, 90.6500],
                ['চরফ্যাশন বাজার', 'Charfesson Bazar', 'Charfesson', 'wholesale', 22.1800, 90.7500]
            ]],
            ['Pirojpur', 'Barishal', [
                ['স্বরূপকাঠি বাজার', 'Swarupkathi Bazar', 'Nesarabad', 'wholesale', 22.7400, 90.1100],
                ['মাছ বাজার', 'Mach Bazar', 'Pirojpur Sadar', 'retail', 22.5800, 89.9700]
            ]],
            ['Barguna', 'Barishal', [
                ['বরগুনা বাজার', 'Barguna Bazar', 'Barguna', 'wholesale', 22.1550, 90.1150],
                ['আমতলী বাজার', 'Amtali Bazar', 'Amtali', 'retail', 22.1280, 90.2300]
            ]],
            ['Jhalokati', 'Barishal', [
                ['ঝালকাঠি বড় বাজার', 'Jhalokati Boro Bazar', 'Jhalokati', 'wholesale', 22.6450, 90.2000],
                ['নলছিটি বাজার', 'Nalchity Bazar', 'Nalchity', 'retail', 22.6200, 90.2700]
            ]],

            // SYLHET DIVISION (4)
            ['Sylhet', 'Sylhet', [
                ['বন্দরবাজার', 'Bandarbazar', 'Sylhet City', 'retail', 24.8913, 91.8687],
                ['কালিঘাট', 'Kalighat', 'Sylhet', 'wholesale', 24.8876, 91.8708]
            ]],
            ['Moulvibazar', 'Sylhet', [
                ['পশ্চিম বাজার', 'Pashchim Bazar', 'Moulvibazar', 'wholesale', 24.4840, 91.7650],
                ['শ্রীমঙ্গল বাজার', 'Sreemangal Bazar', 'Sreemangal', 'retail', 24.3100, 91.7300]
            ]],
            ['Habiganj', 'Sylhet', [
                ['শায়েস্তাগঞ্জ বাজার', 'Shayestaganj Bazar', 'Shayestaganj', 'wholesale', 24.3000, 91.4500],
                ['চৌধুরী বাজার', 'Chowdhury Bazar', 'Habiganj Sadar', 'retail', 24.3800, 91.4100]
            ]],
            ['Sunamganj', 'Sylhet', [
                ['জগন্নাথপুর বাজার', 'Jagannathpur Bazar', 'Jagannathpur', 'retail', 24.7600, 91.5300],
                ['ছাতক বাজার', 'Chhatak Bazar', 'Chhatak', 'wholesale', 25.0400, 91.6700]
            ]],

            // RANGPUR DIVISION (8)
            ['Rangpur', 'Rangpur', [
                ['সিটি বাজার', 'City Bazar', 'Rangpur City', 'retail', 25.7538, 89.2443],
                ['টার্মিনাল বাজার', 'Terminal Bazar', 'Rangpur', 'wholesale', 25.7326, 89.2558]
            ]],
            ['Dinajpur', 'Rangpur', [
                ['বাহাদুর বাজার', 'Bahadur Bazar', 'Dinajpur City', 'retail', 25.6260, 88.6360],
                ['হিলি স্থলবন্দর মার্কেট', 'Hili Landport Bazar', 'Hakimpur', 'wholesale', 25.2850, 89.0100]
            ]],
            ['Gaibandha', 'Rangpur', [
                ['পৌর বাজার', 'Pourashava Bazar', 'Gaibandha Sadar', 'retail', 25.3280, 89.5410],
                ['গোবিন্দগঞ্জ বাজার', 'Gobindaganj Bazar', 'Gobindaganj', 'wholesale', 25.1380, 89.3900]
            ]],
            ['Kurigram', 'Rangpur', [
                ['কুড়িগ্রাম বাজার', 'Kurigram Bazar', 'Kurigram Sadar', 'retail', 25.8070, 89.6290],
                ['নাগেশ্বরী বাজার', 'Nageshwari Bazar', 'Nageshwari', 'wholesale', 25.9900, 89.7000]
            ]],
            ['Lalmonirhat', 'Rangpur', [
                ['গোশালা বাজার', 'Goshala Bazar', 'Lalmonirhat', 'retail', 25.9120, 89.4440],
                ['পাটগ্রাম বাজার', 'Patgram Bazar', 'Patgram', 'wholesale', 26.3500, 89.0100]
            ]],
            ['Nilphamari', 'Rangpur', [
                ['সৈয়দপুর বাজার', 'Saidpur Bazar', 'Saidpur', 'wholesale', 25.7766, 88.8953],
                ['নীলফামারী বড় বাজার', 'Boro Bazar', 'Nilphamari', 'retail', 25.9350, 88.8500]
            ]],
            ['Panchagarh', 'Rangpur', [
                ['পঞ্চগড় বাজার', 'Panchagarh Bazar', 'Panchagarh', 'retail', 26.3350, 88.5550],
                ['তেঁতুলিয়া বাজার', 'Tetulia Bazar', 'Tetulia', 'wholesale', 26.4750, 88.3300]
            ]],
            ['Thakurgaon', 'Rangpur', [
                ['ঠাকুরগাঁও বাজার', 'Thakurgaon Bazar', 'Thakurgaon', 'retail', 26.0300, 88.4550],
                ['পীরগঞ্জ বাজার', 'Pirganj Bazar', 'Pirganj', 'wholesale', 25.8500, 88.3500]
            ]],

            // MYMENSINGH DIVISION (4)
            ['Mymensingh', 'Mymensingh', [
                ['মেছুয়া বাজার', 'Mechua Bazar', 'Mymensingh City', 'wholesale', 24.7571, 90.4103],
                ['নতুন বাজার', 'Notun Bazar', 'Mymensingh', 'retail', 24.7601, 90.4077]
            ]],
            ['Netrokona', 'Mymensingh', [
                ['বড় বাজার', 'Boro Bazar', 'Netrokona', 'retail', 24.8760, 90.7290],
                ['কেন্দুয়া বাজার', 'Kendua Bazar', 'Kendua', 'wholesale', 24.6400, 90.8400]
            ]],
            ['Jamalpur', 'Mymensingh', [
                ['জামালপুর বাজার', 'Jamalpur Bazar', 'Jamalpur', 'retail', 24.9300, 89.9400],
                ['সরিষাবাড়ী বাজার', 'Sarishabari Bazar', 'Sarishabari', 'wholesale', 24.7300, 89.8300]
            ]],
            ['Sherpur', 'Mymensingh', [
                ['নয়ানি বাজার', 'Noyani Bazar', 'Sherpur', 'retail', 25.0180, 90.0150],
                ['শ্রীবরদী বাজার', 'Sreebardi Bazar', 'Sreebardi', 'wholesale', 25.1300, 89.8900]
            ]]
        ];

        $marketId = 1;
        $insertData = [];

        foreach ($districts as $d) {
            $distName = $d[0];
            $divName = $d[1];
            foreach ($d[2] as $m) {
                $insertData[] = [
                    'id' => $marketId++,
                    'name' => $m[0],
                    'name_en' => $m[1],
                    'location' => $m[2],
                    'district' => $distName,
                    'division' => $divName,
                    'latitude' => $m[4],
                    'longitude' => $m[5],
                    'rating' => rand(38, 48) / 10,
                    'verified' => 1,
                    'type' => $m[3],
                    'total_prices' => rand(150, 400),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('markets')->insert($insertData);
    }

    private function seedUsers(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Oynndrila Singh Purkayestha',
            'email' => 'admin@pricewatch.bd',
            'password' => 'admin123',
            'role' => 'admin',
            'contributions' => 500,
            'avatar' => 'O',
            'join_date' => '2025-01-01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedPrices(array $basePrices): void
    {
        $marketIds = DB::table('markets')->pluck('id')->toArray();
        $insertData = [];

        foreach ($basePrices as $productId => $basePrice) {
            foreach ($marketIds as $marketId) {
                // Determine a slight base modifier for this market
                $marketModifier = (rand(95, 105) / 100); 
                $marketBasePrice = $basePrice * $marketModifier;

                $trendDirection = (rand(0, 100) > 50) ? 1 : -1;
                
                // Keep 5 days of data points to ensure peak performance (52 * 128 * 5 = ~33,000 DB rows)
                for ($day = 0; $day < 5; $day++) {
                    $date = now()->subDays(4 - $day)->format('Y-m-d');
                    $fluctuation = ($marketBasePrice * rand(-2, 2)) / 100;
                    $trendAdjust = $trendDirection * ($day * $marketBasePrice * 0.003); 
                    $price = round(max(1, $marketBasePrice + $fluctuation + $trendAdjust), 2);

                    $insertData[] = [
                        'product_id' => $productId,
                        'market_id' => $marketId,
                        'price' => $price,
                        'submitted_by' => 'system',
                        'date' => $date,
                        'verified' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    if (count($insertData) >= 1000) {
                        DB::table('price_entries')->insert($insertData);
                        $insertData = [];
                    }
                }
            }
        }

        if (!empty($insertData)) {
            DB::table('price_entries')->insert($insertData);
        }
    }
}
