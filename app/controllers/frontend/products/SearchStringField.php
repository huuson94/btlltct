<?php

class SearchStringField{
    public function searchField($field, $value){
        return Product::where($field,'LIKE',$value);
    }
}