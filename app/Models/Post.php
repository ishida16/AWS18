<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'mail',
        'title',
        'output',
    ];
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function post_mail()
    {
        $subj = $this->title;
        //$body = "MailBodyよ";
        $body = $this->output;
        $mail = $this->mail;
        $cmd = 'echo '.$body.' | s-nail -:/ -s '.$subj.' -S v15-compat -S mta=smtps://webmaster%40heelife.net:Ryu7sato93to1623-@smtp.lolipop.jp:465 -S from=webmaster@heelife.net '.$mail;
        //$cmd = 'echo '.$body;
        $output = exec($cmd);
        return $output;
    }
    
}
