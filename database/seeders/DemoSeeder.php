<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tag;
use App\Models\Post;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate([
            'email' => 'max@example.com'
        ], [
            'name' => 'Max Mustermann',
        ]);

        $tag1 = Tag::firstOrCreate(['name' => 'Laravel']);
        $tag2 = Tag::firstOrCreate(['name' => 'PHP']);
        $tag3 = Tag::firstOrCreate(['name' => 'Datenbank']);

        $post = Post::create([
            'user_id' => $user->id,
            'title' => 'Erster Testbeitrag',
            'content' => 'Das ist ein Beispieltext für einen Beitrag.'
        ]);
        $post->tags()->sync([$tag1->id, $tag2->id]);
    }
}
