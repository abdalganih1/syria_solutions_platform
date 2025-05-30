<?php
// app/Models/CommentVote.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CommentVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment_id',
        'voter_account_id',
        'vote_value', // +1 or -1
    ];
     protected $casts = [
        'vote_value' => 'integer',
    ];
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    public function voter()
    {
        return $this->belongsTo(Account::class, 'voter_account_id');
    }
}