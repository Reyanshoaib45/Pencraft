<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $posts = Post::all();

        // Add comments to posts
        foreach ($posts as $post) {
            // Only add comments to published posts
            if (!$post->is_published) {
                continue;
            }

            // Add 0-10 comments per post
            $commentCount = rand(0, 10);

            $parentComments = [];

            // Create parent comments
            for ($i = 0; $i < $commentCount; $i++) {
                $randomUser = $users->random();

                $comment = Comment::create([
                    'content' => "This is a sample comment #{$i} on the post by {$randomUser->name}. " .
                               "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                    'post_id' => $post->id,
                    'user_id' => $randomUser->id,
                ]);

                $parentComments[] = $comment;
            }

            // Create replies (nested comments)
            foreach ($parentComments as $parentComment) {
                // 50% chance of having replies
                if (rand(0, 1) == 1) {
                    // 1-3 replies per comment
                    $replyCount = rand(1, 3);

                    for ($j = 0; $j < $replyCount; $j++) {
                        $replyUser = $users->random();

                        Comment::create([
                            'content' => "This is a reply #{$j} to the comment by {$replyUser->name}. " .
                                      "Praesent mauris ante, elementum et, bibendum at, posuere sit amet, nibh.",
                            'post_id' => $post->id,
                            'user_id' => $replyUser->id,
                            'parent_id' => $parentComment->id,
                        ]);
                    }
                }
            }
        }
    }
}
