
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        
        // Sample categories and tags
        $categories = ['Technology', 'Travel', 'Food', 'Lifestyle', 'Business'];
        
        // Create sample posts for each user
        foreach ($users as $user) {
            // Create 3-7 posts per user
            $postCount = rand(3, 7);
            
            for ($i = 0; $i < $postCount; $i++) {
                $isPublished = rand(0, 1);
                $category = $categories[array_rand($categories)];
                $tags = $this->getRandomTags();
                $publishedDate = $isPublished ? Carbon::now()->subDays(rand(1, 30)) : null;
                
                Post::create([
                    'title' => "Sample {$category} Post #{$i} by {$user->name}",
                    'content' => "This is a sample post content for demonstration purposes. It contains multiple paragraphs of text to simulate a real blog post.\n\n" .
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\n\n" .
                                "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    'featured_image' => 'https://picsum.photos/id/' . rand(1, 1000) . '/800/400',
                    'category' => $category,
                    'tags' => $tags,
                    'slug' => "sample-{$category}-post-{$i}-{$user->id}",
                    'author_id' => $user->id,
                    'views' => rand(10, 500),
                    'likes' => rand(5, 100),
                    'dislikes' => rand(0, 20),
                    'is_published' => $isPublished,
                    'published_at' => $publishedDate,
                ]);
            }
        }
    }
    
    /**
     * Get random tags for posts
     *
     * @return array
     */
    private function getRandomTags()
    {
        $allTags = [
            'Laravel', 'PHP', 'JavaScript', 'CSS', 'HTML', 'Vue.js', 'React',
            'Italy', 'France', 'Japan', 'Vacation', 'Adventure',
            'Recipes', 'Vegan', 'Dessert', 'Healthy', 'Quick Meals',
            'Fitness', 'Minimalism', 'Productivity', 'Self-Care',
            'Startup', 'Marketing', 'SEO', 'E-commerce'
        ];
        
        $tagCount = rand(2, 5);
        $selectedIndexes = array_rand($allTags, $tagCount);
        
        if (!is_array($selectedIndexes)) {
            $selectedIndexes = [$selectedIndexes];
        }
        
        $tags = [];
        foreach ($selectedIndexes as $index) {
            $tags[] = $allTags[$index];
        }
        
        return $tags;
    }
}
