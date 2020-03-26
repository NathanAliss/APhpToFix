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
        echo ('
       <script type="\text/javascript\">
       $(document).ready(fuction(){
        $.(\"#flow\").text( 
        <div class=\"actu-line\">
            <img src=\"test/'+$this->image+'\">
            <div class=\"content\">
                <h2>'+$this->titre+'</h2>
                <p>'+$this->dpost+'</p>
                <p>'+$this->content+'</p>
            </div>
        </div>);
});
        </script>
        ')
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
