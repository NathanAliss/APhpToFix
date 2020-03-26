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
    public function setTitre($newTitre){
        $this->titre=$newTitre;  
    };
    public function setDate($newDate){
        $this->dpost=$newDate;
    };
    public function setContent($newContent){
        $this->content=$newContent;
    };
    public function setImage($newImage){
        $this->image=$newImage;
    };
    
    //destruct
    public function __destruct();
}

?>