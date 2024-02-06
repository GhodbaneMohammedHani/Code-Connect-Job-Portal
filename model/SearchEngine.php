<?php 
class SearchEngine{
    private $searchStrategy;
    public function __construct($searchst)
    {   
        $this->searchStrategy=$searchst;
    }
    public function setSearchStrategy(SearchStrategy $searchst){
        $this->searchStrategy=$searchst;
    }
    public function rechercher(){
        return $this->searchStrategy->chercher();
    }
}
?>