
<?php

/** set sidebar active */

if(!function_exists('setSidebarActive')){
    function setSidebarActive(array $routes) : ?string
    {
        foreach($routes as $route){
            if(request()->routeIs($route)){
                return 'active';
            }
        }
        return null;
    }
}


/** set youtube thumbnail  */

if(!function_exists('getThumbnail')){
    function getThumbnail(string $url) : ?string
    {
        // https://www.youtube.com/watch?v=yqaLSlPOUxM&ab_channel=LunDev
        $pattern = '/[?&]v=([a-zA-Z0-9_-]{11})/';

        if (preg_match($pattern, $url, $matches)) {
            $youtube_id = $matches[1];
            return "https://img.youtube.com/vi/{$youtube_id}/hqdefault.jpg";
        }
    }
}
