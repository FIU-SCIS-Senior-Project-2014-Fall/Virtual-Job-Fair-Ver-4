<?php

namespace stackOverflow;

class StackOverflow
{
    public static $url = "http://careers.stackoverflow.com/jobs/feed?location=Miami%2c+Florida&range=300&distanceUnits=Miles";
    
    public static function getJobCount()
    {
        $url = StackOverflow::$url;
        try {$xml = simplexml_load_file($url);}
        catch(Exception $e){print_r($e);}
        $count = $xml->channel->totalResuls;
        return $count;
    }
    
//    public static function getJobs()
//    {   
//        $url = StackOverflow::$url;        
//        try {$xml = simplexml_load_file($url);}
//        catch(Exception $e){print_r($e);}
//        //$count = $xml->channel->totalResuls;
//        foreach($xml->channel->item as $item)
//        {
//            $title = $item->title;
//            
//        
//            $link = $item->link;
//            $description = $item->description;
//            $skills = $item->category;
//            $position = strstr($title,"at",true);            
//            $tempStr = substr($title, strpos($title,"at")+1);
//            $company = substr($tempStr,1, strpos($tempStr, " (")-1);
//            $opening = $item->pubDate;
//            $source = "Stack Overflow Careers";
//            //print_r("Skills needed: ");
//            foreach($item->category as $skill)
//            {   
//                print_r($skill." ");
//            }
//            print_r('<br>');
//            print_r("Title:".$title.'<br>'
//                    ."Position: ".$position.'<br>'
//                    ."Skills: ".$skills.'<br>'
//                    ."Company: ".$company.'<br>'
//                    ."Description:".$description.'<br>'
//                    ."Link: ".$link.'<br>'
//                    ."Opening:".$opening.'<hr/>');
//        }     
//    }
    public static function getJobResults()
    {
        $url = StackOverflow::$url;
        //$location = urlencode($location);
        //$keywords = urlencode($keywords);
        $xml = simplexml_load_file($url);
        $jobsCollection = Array();
        $currItem = 1;
        foreach($xml->channel->item as $item)
        {
            $currJob = new Job();                                     
            $title = $item->title;       
            $description = $item->description;
            $skills = $item->category;
            $position = strstr($title,"at",true);            
            $tempStr = substr($title, strpos($title,"at")+1);
            $company = substr($tempStr,1, strpos($tempStr, " (")-1);
            $currJob->title = $position;
            $currJob->companyName = $company;
            $currJob->jobURL = (string)$item->link;
            $currJob->posted = (string)$item->pubDate;
            $currJob->description = $description;
            $source = "Stack Overflow Careers";
            //print_r("Skills needed: ");
            foreach($item->category as $skill)
            {
                $currJob->skills .= ucwords((string)$skill)." ";
                //print_r($currJob->skills." ");
            }
            //print_r($currJob->skills." ");
            $jobsCollection[$currItem] = $currJob;            
            $currItem++;
//            print_r('<br>');
//            print_r("Title:".$title.'<br>'
//                    ."Position: ".$position.'<br>'
//                    ."Skills: ".$skills.'<br>'
//                    ."Company: ".$company.'<br>'
//                    ."Description:".$description.'<br>'
//                    ."Link: ".$link.'<br>'
//                    ."Opening:".$opening.'<hr/>');
        }
        //        foreach ($jobsCollection as $j)
//            {
//                print_r($j);
//            }
        
        return $jobsCollection;
    }  
}
class Job
{
    
    public $title = "";
    public $companyName = "";
    public $city = "Miami";
    public $state = "Florida";
    public $skills = "";
    public $description = "";
    public $type = "";
    public $posted = "";
    public $jobURL = "";
    
    public function getCompanyName($maxLength = null) 
    {
        if($this->companyName != null && $maxLength != null && strlen($this->companyName) > $maxLength) {
            return substr($this->companyName, 0, $maxLength-3)."...";
        } else {
            return $this->companyName;
        }
    }
    
    public function getJobDescription() 
    {
        return $this->description;
    }
}
 ?>

