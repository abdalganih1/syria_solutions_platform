<?php
// app/Models/Comment.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'author_account_id',
        'problem_id',
        'parent_comment_id',
        'total_votes',
    ];
    public function author()
    {
        return $this->belongsTo(Account::class, 'author_account_id');
    }
    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
    // Parent comment (if it's a reply)
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }
    // Replies to this comment
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }
    public function votes()
    {
        return $this->hasMany(CommentVote::class);
    }
    // Check if this comment has been adopted as a solution
    public function adoptedSolution()
    {
        return $this->hasOne(Solution::class);
    }
}