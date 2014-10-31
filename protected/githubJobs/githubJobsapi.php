<?php

/**
 * Class githubJobsapi
 * @package githubJobs
 * source: http://jobs.github.com/api
 */
class githubJobsapi{
    const API_URL = "http://jobs.github.com/positions.json?";
    public static $perPage = 25;
    public static $pageNum = 0;
    
    public static function getJobs($keywords, $location)
    {
        $location = urlencode($location);
        $keywords = urldecode($keywords);
        $url = "http://jobs.github.com/positions.json?callback=myFunc";
        $json = file_get_contents($url);
        $data = json_decode($json);
        echo $data->data[0]->title;
    }
    
}
?>

