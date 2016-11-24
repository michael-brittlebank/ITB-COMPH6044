<?php

namespace Models;

class Barkbook {
    public static function getBarkbookFriendByName($name){
        $barkbookData = self::getBarkbookData();
        foreach($barkbookData as $friend){
            if (strtolower($friend['name']) === strtolower($name)){
                return $friend;
            }
        }
        return [];
    }

    public static function getBarkbookData(){
        return [
            [
                'name'=>'Basil',
                'age'=>'3 Years Old',
                'breed'=>'Miniature Schnauzer',
                'friendship'=>'Puppy Love',
                'image'=>'basil.jpg',
                'location'=>'Toronto, Canada',
                'url'=>'basil'
            ],
            [
                'name'=>'Kaycee',
                'age'=>'2.5 Years Old',
                'breed'=>'Golden Retriever',
                'friendship'=>'Tom and Jerry',
                'image'=>'kaycee.jpg',
                'location'=>'Wisconsin, USA',
                'url'=>'kaycee'
            ]
        ];
    }
}