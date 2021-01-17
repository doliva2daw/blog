<?php
    namespace App\Controllers;

        use App\Request;
        use App\Session;
        use App\Controller;

    final class PostController extends Controller{

        public function __construct(Request $request,Session $session){
            parent::__construct($request,$session);
        }
        
        public function profile(){
            $user=$this->session->get('user');
            $data=$this->getDB()->selectWhereWithJoin('post','users',['post.id','post.title'],'user','id',['users.username',$user['username']]);
            $this->render(['user'=>$user,'data'=>$data],'profile');
        }

        public function new(){
            $user=$this->session->get('user');
            $this->render(['user'=>$user],'newpost');
        }
        
        public function add(){
            $title=filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
            $body=stripslashes(filter_input(INPUT_POST,'body'));
            $createdAt=date('Y-m-d');
            $tags=filter_input(INPUT_POST,'tags',FILTER_SANITIZE_STRING);
            
            $value=["id"];
            //$editor=$this->session->get('user');
            $editor=$data=$this->getDB()->selectAll('users',$value);
            
            if($tags!=""){
                $ar_tag=explode(',',$tags);
                }
            $db=$this->getDB();
           // $db->beginTransaction();
            try{
                
                $db->insert('post',
                ['title'=>$title,
                'cont'=>$body,
                //'user'=>$editor[0],
                'user'=>"2",
                'create-date'=>$createdAt]);
                $post=$db->lastInsertId();
               // var_dump($post);
                foreach($ar_tag as $tag){
                    try{
                       // $db->beginTransaction();
                        $db->insert('tags',['tag'=>$tag]);
                        $idtag=$db->lastInsertId();
                       // var_dump($idtag);
                        
                        $db->insert('posts_has_tags',['post_id'=>$post,'tags_id'=>$idtag]);
//$db->commit();
                    }catch(\PDOException $e){
                        echo $e->getMessage();
                    }
                }
                
                header('Location:'.BASE.'user/dashboard');
            }
            catch(\PDOException $e){
        
                header('Location:'.BASE.'post/new');
            }
            
           
               
           
        }
    }