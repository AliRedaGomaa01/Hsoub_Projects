<?php


namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Email::factory(1000)->create();
        // \App\Models\Email::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'test',
            'email' => 'a@a.c',
            'password' => "test123"
        ]);

        \App\Models\Project::factory()->create([
            'image' => "Yasmeen.jpg",
            'slug' => Str::random(10),
            "nameEn" => 'Yasmeen',
            "headerEn" => "A new standard for a peaceful sophisticated and innovative lifestyle.",
            'descriptionEn' => 'A modern exclusive city offering a sophisticated new take on living, Yasmeen City will surprise and enchant with stunning architecture enhanced by lush green space. At once peaceful, comfortable and convenient.
Yasmeen City is far more than a place to live, it’s a healthy place to belong. Experience living in full bloom.',
            "nameAr" => 'ياسمين',
            "headerAr" => "المعيار الجديد لنمط حياة متطور ومبتكر وآمن. العيش بازدهار كامل",
            'descriptionAr' => 'مدينة حصرية وعصرية توفر صورة حياتية جديدة وفخمة، حيث تُبهرك مدينة الياسمين وتسحرك بتصميمها العمراني الذي يتعزز ألقه بفضل المساحات الخضراء الخصبة. وعلى الرغم من أنها تجمع بين أسباب الصفاء النفسي، والراحة والمتعة، فهي ليست مجرد مكان للسكن، وإنما أجواء صحية متكاملة. جرب متعة الحياة بكامل رونقها.
تُعد مدينة الياسمين منطقة متعددة الاستخدامات، تجمع بين مختلف المباني السكنية، والفنادق، والمرافق الحديثة، حيث يلتقي الجمال بالبصيرة الثاقبة.',
        ]);

        \App\Models\Project::factory()->create([
            'image' => "Simaisma.jpg",
            'slug' => Str::random(10),
            "nameEn" => 'Simaisma',
            "headerEn" => "For the ultimate in residential living, stylish, confortable and pratical",
            'descriptionEn' => 'Those Simaisma Villas will completely feel relax. Each Villa comes replete with the style, ﬁttings and features beﬁtting such a modern City. 
Private balconies with wide views are complemented by the stunning interiors, featuring contemporary porcelain tile ﬂooring, walk in closets and acrylic wall piants. This is how Simaisma Villas living should be.',
            "nameAr" => 'سميسمة',
            "headerAr" => "لضمان ارقي مستويات المعيشة، هناك أنواع متميزة من فلل سميسمة",
            'descriptionAr' => 'كل فيلا من هذه الفلل ذات تصميم مبهر و تتمتع بأعلى المواصفات و المميزات التي تناسب فلل سميسمة. 
الشرفات الواسعة الخاصة بكل فيلا و إطلالاتها الخلابة على المدينة ، يكملها التصميم الداخلي المميز بتشطيباته من بلاط البورسلان الراقي للارضيات، و الخزائن الداخلية عصرية التصميم و دهانات الجدران الاكريليكية المختارة بعناية. هكذا يحب أن يكون المفهوم الحقيقي لنمط الحياة في سميسمة فيلا.',
        ]);

        \App\Models\Project::factory()->create([
            'image' => "Marina.jpg",
            'slug' => Str::random(10),
            "nameEn" => 'Marina',
            "headerEn" => "AN ABUNDANCE OF AMENITIES",
            'descriptionEn' => 'Marina 33 features a plethora of amenities and infrastructure that add vibrancy and balance to the tower. These include a spacious lobby, kids’ dedicated areas and a multi-purpose community room with exceptional service guaranteed from the moment you step into the tower.',
            "nameAr" => 'مارينا',
            "headerAr" => "الكثرة من وسائل الراحة",
            'descriptionAr' => 'يحتوي برج المارينا 33 على العديد من المرافق و البنية التحتية التي تضفي حيوية وتوازناً على البرج. فأنه يضم العديد من المرافق المميزة. ردهات واسعة، أماكن مخصصة لألعاب الأطفال وأماكن اجتماعية متعددة الاستخدام على مستوى عالٍ من الخدمة الاستثنائية بكل أركانه.'
        ]);
    }
}
