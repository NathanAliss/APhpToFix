<?php

class Article {
    //atribut
    private $titre;
    private $dpost;
    private $content;
    private $image;
    
    //création
    public function __construct($titre,$dpost,$content,$image){
        $this->titre=$titre;
        $this->dpost=$dpost;
        $this->content=$content;
        $this->image=$image;
    }
    //methode
    public function generate(){
        echo ("")
    }/*generateur d'article en HTML*/
    
    //gatter
    
    //setter
    
    //destruct
    public function __destruct();
}

?>