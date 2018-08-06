<?php

if(!function_exists('is_active_route')){
    /**
    returns absolute asset path
     */
    function is_active_route($routeName){
        return (Route::currentRouteName()==$routeName);
    }
}
if(!function_exists('assets_url')){
    /**
    returns absolute asset path
     */
    function assets_url($asset=''){
        return base_url() . 'assets/' . $asset;
    }
}

if ( ! function_exists("is_active")){
    /**
    returns 'active' if current page
     */
    function is_active($class){
        $ci =& get_instance();
        if ($class == $ci->router->class){
            return 'active';
        } else {
            return '';
        }
    }
}

if ( ! function_exists("is_secondary_active")){
    /**
    returns 'active' if second segment is equal to given str (cleanup tool)
     */
    function is_secondary_active($str){
        $ci =& get_instance();
        if ($str == $ci->uri->segment(2)){
            return 'active';
        } else {
            return '';
        }
    }
}

if(! function_exists("check_ajax")){
    /**
    Check request is AJAX and not directly linked else redirect to homepage
     */
    function check_ajax(){
        if (!is_ajax() || strpos($_SERVER['HTTP_REFERER'], url()) !== 0){
            redirect( url() );
        }
    }
}

if(! function_exists("is_ajax")){
    /**
    Check request is AJAX and not directly linked
     */
    function is_ajax(){
        if ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'))){
            return true;
        } else {
            return false;
        }
    }
}

if(!function_exists("get_cache")){
    /**
    Get Cached Object
     */
    function get_cache($name, $minutes){
        $path = APPPATH . 'cache/' . $name . '.txt';
        if(file_exists($path)){
            if(filemtime($path) + ($minutes * 60) < time()){
                return false;// expired
            } else {
                return unserialize(file_get_contents($path));
            }
        } else {
            return false;
        }
    }
}

if(!function_exists("set_cache")){
    /**
    Set Cached Object
     */
    function set_cache($name, $object){
        $path = APPPATH . 'cache/' . $name . '.txt';
        file_put_contents($path, serialize($object));
    }
}

if(!function_exists("is_valid_session")){
    /**
    Is session found in DB
     */
    function is_valid_session($session_id, $ip){
        $ci =& get_instance();
        $query = $ci->db->get_where('ci_sessions', array('session_id' => $session_id, 'ip_address' => $ip));
        if($query->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
}

if(!function_exists("tt")){
    /**
    return timthumb absolute URL with extras
     */
    function tt($path, $width="", $height="", $extra=""){
        return url(sprintf("tt?src=%s&w=%s&h=%s%s", urlencode($path), $width, $height, $extra));
    }
}

if(!function_exists("str_snip")){
    /**
    Return substr with trailing ... if longer than given num
     */
    function str_snip($str, $limit=18){
        if(strlen($str) > $limit){
            $str=substr($str, 0, $limit).'...';
        }
        return($str);
    }
}


if( ! function_exists("word_snip")) {

    function word_snip($text, $length) {
        $length = abs((int)$length);
        if(strlen($text) > $length) {
            $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
        }
        return($text);
    }

}

if(!function_exists("add_http")){
    /**
    add http to links missing it.
     */
    function add_http($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }
}

if( ! function_exists("lorem")){
    /**
    Gives you some lorum ipsum width a word count option
     */
    function lorem($words = 25){
        $text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed congue justo sit amet neque accumsan aliquet. Aliquam viverra leo quis massa elementum gravida. Maecenas turpis orci, viverra tempor dapibus a, pulvinar ac tellus. Aenean ultricies, est nec mollis hendrerit, nisl neque porta nulla, vitae malesuada magna nec tortor tincidunt quam. Fusce velit eros, sagittis a tincidunt vel, porta nec nunc. Vivamus ac imperdiet justo. Ut lobortis hendrerit luctus. Proin lacinia elit dolor, at accumsan nisi luctus ut. In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae. Ut fermentum mi eu sollicitudin viverra. Suspendisse consequat ullamcorper odio. Sed tempus egestas libero, id vestibulum eros tincidunt non. Sed pretium id lectus id aliquet. Vestibulum fermentum a lorem at lacinia. Integer at volutpat urna. Pellentesque nec elit eget diam dictum sagittis. Aliquam erat volutpat. Proin semper egestas dapibus. Nulla facilisi. In ultricies placerat vulputate. Pellentesque fringilla dolor ac porttitor consectetur. Nulla facilisi. Pellentesque congue sagittis semper. Etiam ac velit leo. Curabitur laoreet nunc ut justo accumsan, vel imperdiet ante convallis. In hac habitasse platea dictumst. Sed lacus sem, posuere quis malesuada vitae, lobortis ac odio. Duis in sapien vehicula, condimentum quam facilisis, dapibus justo. Nullam eu rutrum odio, a laoreet elit. Pellentesque eu mollis nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed id orci orci. Nunc nibh sem, hendrerit quis ligula sit amet, posuere facilisis lectus. Morbi lectus diam, ullamcorper consectetur congue quis, pretium nec ipsum. Curabitur dolor nunc, egestas a augue nec, venenatis condimentum tortor. Aenean ut justo sed dui ultrices ullamcorper. Maecenas vulputate, elit id euismod feugiat, nunc dui sodales massa, vitae iaculis erat felis in quam. Sed et sapien et sapien consequat condimentum. Pellentesque quis leo lectus. Maecenas interdum in quam quis dapibus. Suspendisse scelerisque vehicula lorem vel consequat. Maecenas tincidunt aliquet ultrices. Nulla dignissim tincidunt aliquam.";
        $word_array = explode(' ', $text);
        if( sizeof($word_array) > $words )
        {
            $word_array = array_slice($word_array, 0, $words);
            $word_array = implode(' ', $word_array);
            $word_array = rtrim($word_array, '.');
            $word_array = rtrim($word_array, ',');
            return $word_array.'.';
        }
        return $text;
    }
}

if( ! function_exists("placeholder")){
    /**
    Gives you a placeholder image, width, height optional text
     */
    function placeholder($width=200, $height=200, $text=""){
        return 'holder.js/'.$width.'x'.$height.'/#f0f0f0:#b9b9b9/auto/text:'.$text;
    }
}

if( ! function_exists("typography")){
    /**
    Gives you wysiwig text, good for wysiwig css test or placeholder html
     */
    function  typography(){
        $str=
            "
			<h1>Header one</h1>
			<h2>Header two</h2>
			<h3>Header three</h3>
			<h4>Header four</h4>
			<h5>Header five</h5>
			<h6>Header six</h6>
			<hr>
			<p>Paragraph</p>
			<p>Paragraph with new lines 1<br>
			Paragraph with new lines 2<br>
			Paragraph with new lines 3<br>
			Paragraph with new lines 4
			</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit <a href=\"#\">link</a>. Duis congue tortor vitae ipsum sagittis nec semper tellus scelerisque. Aenean vulputate orci non tellus iaculis tempus. Etiam enim diam, lobortis eu congue eu, aliquet non metus. Donec eget lectus augue.</p>
			<p>Paragraph with <strong>strong</strong> <a href=\"#\">links</a></p>
			<hr>
			<ul>
				<li>Un-ordered list item</li>
				<li>Un-ordered list item</li>
				<li>Un-ordered list item</li>
			</ul>
			<blockquote>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et consequat enim. Nulla felis diam, tristique vitae blandit non, rutrum sit amet metus. Vivamus ac ipsum eget libero aliquet blandit. Vivamus ac purus velit, eu rhoncus velit. Sed et lacus nec risus ultrices consequat.
			</blockquote>
			<p>Ending Paragraph.</p>
		";
        return($str);
    }
}

if(!function_exists("echo_debug")){
    /**
    If you want to see a string or output on the live site but dont want customers or business owners to see
     */
    function echo_debug($str){

        if(strstr($_SERVER['HTTP_HOST'],'.dev') || $_SERVER['REMOTE_ADDR'] == OFFICE_IPADDRESS){
            echo $str;
            echo '<div style="border:2px solid skyblue;padding:10px;background-color:#EEE">'.$str.'</div>';

        }
    }
}

if(!function_exists("print_debug")){
    /**
    In case someone prefers to use the slightly slower print function rather than echo
     */
    function print_debug($str){
        echo_debug($str);
        return true;
        //it returns true because thats the only difference with using print other than the slightly slower performance :b
    }
}

if( ! function_exists("print_r_debug")){
    /**
    If you want to see an array or object on the live site but dont want customers or business owners to see
     */
    function print_r_debug($object){

        if(strstr($_SERVER['HTTP_HOST'],'.dev') || $_SERVER['REMOTE_ADDR'] == OFFICE_IPADDRESS){
            echo '<pre style="border:2px solid skyblue;padding:10px;background-color:#EEE">'.print_r($object,true).'</pre>';
        }
    }
}
?>