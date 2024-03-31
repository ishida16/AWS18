<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function view(Post $post)
    {
        
        return view('posts.view')->with(['posts' => $post->getByLimit()]);
    }
    
    public function tomail(PostRequest $request, Post $post)
    //public function tomail(Post $post)
    {
        //return $post->get();//$postの中身を戻り値にする。
        $input = $request['post'];
	    $post->fill($input);
	    $post->output = $post->post_mail();
	    $post->save();
        return view('posts.tomail')->with(['posts' => $post->getByLimit()]);
    }
    /*
    public function tomail_api(PostRequest $request)
    //public function tomail(Post $post)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->mail = $request->input('mail');
        $post->output = $request->input('output');
	    //$post->output = $post->post_mail();
	    $post->created_at = now();
	    //$post->save();
        
        return response()->json(Post::all());
    }
    
    public function input(PostRequest $request, Post $post)
    //public function input2(Post $post)
    {
        // GET通信するURL
        $url = 'https://httpbin.org/post';
        
        $input = $request['post'];
	    $post->fill($input);
	    
        $title = $post->title;
        $mail = $post->mail;
        $body = $post->output;
        $param = ['mail'=>$mail, 'title'=>$title, 'body'=>$body];
        $data = json_encode($param);
        //$data = $body;
        $headers = [
            'Content-Type: application/json',
            'Accept-Charset: UTF-8',
          ];
        //cURLセッションを初期化する
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        //URLの情報を取得する
        $res =  curl_exec($ch);
        
        //$quest = json_decode($res->getBody(), true);
        $quest = json_decode($res, true);
        //$quest = $res;
        
        // index bladeに取得したデータを渡す
        return view('posts.view_api')->with([
            'quest' => $quest['data'],
        ]);
    }
    
    public function input2(PostRequest $request, Post $post)
    //public function input2(Post $post)
    {
        // GET通信するURL
        //$url = 'https://8f809cc3b327475aa8b5433c676151cd.vfs.cloud9.ap-northeast-1.amazonaws.com/api/posts';
        $url = 'https://127.0.0.1/api/posts';
        
        $input = $request['post'];
	    $post->fill($input);
	    
        $title = $post->title;
        $mail = $post->mail;
        $body = $post->output;
        $param = ['mail'=>$mail, 'title'=>$title, 'body'=>$body];
        $data = json_encode($param);
        //$data = $body;
        $headers = [
            'Content-Type: application/json',
            'Accept-Charset: UTF-8',
          ];
        //cURLセッションを初期化する
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        //URLの情報を取得する
        $res =  curl_exec($ch);
        if($res == '')
            $quest = 'No data';
        else    
            $quest = $res;
            //$quest = json_decode($res, true);
        
        // index bladeに取得したデータを渡す
        return view('posts.view_api')->with([
            'quest' => $quest,
        ]);
        
    }
    */
    
    public function oput()
    {
        $res = file_get_contents('php://input');
        // リクエストデータを加工
        $data = json_decode($res, true);
        if(!is_array($data)){ 
            return response('Json error', 200)
            ->header('Content-Type', 'text/plain');
        }
        
        $post = new Post();
        $post->mail = $data['mail'];
        $post->title = $data['title'];
        $post->output = $data['body'];
        $post->created_at = now();
        $post->output = $post->post_mail();
	    $post->save();
        
        $param = json_encode($post);
        
        return response($param, 200)
            ->header('Content-Type', 'text/plain');
    }
    /*
    public function oput2()
    {
        
        return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');
        
        //return 'Hello World';
    }
    */
}
