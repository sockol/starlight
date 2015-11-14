<?php



function get_breadcrumb()
{
    
    global $post;
    
    $trail      = '';
    $page_title = get_the_title($post->ID);
    
    if ($post->post_parent) {
        $parent_id = $post->post_parent;
        
        while ($parent_id) {
            $page          = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a> » ';
            $parent_id     = $page->post_parent;
        }
        
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            $trail .= $crumb . '/';
    }
    
    $trail .= $page_title;
    $trail .= '';
    
    return $trail;
}

function cut_characters($text, $limit = 20)
{
    
    $after = '';
    if (strlen($text) > $limit)
        $after = '...';
    $text = mb_substr($text, 0, $limit, 'UTF-8') . $after;
    
    return $text;
}
function cut_words($text, $limit = 20)
{
    
    $text  = strip_tags($text);
    $text  = explode(" ", $text);
    $count = count($text);
    $after = '';
    if ($count > $limit)
        $after = '...';
    $temp = '';
    $c    = 0;
    foreach ($text as $key => $value) {
        $temp = $temp . ' ' . $value;
        if ($c == $limit)
            break;
        $c++;
    }
    $text = $temp . $after;
    return $text;
}

function pagination($wp_query, $paged)
{
    
    $prev  = get_previous_posts_link('«', $wp_query->max_num_pages);
    $next  = get_next_posts_link('»', $wp_query->max_num_pages);
    $total = $wp_query->found_posts;
    $total = floor($total / 10) + 1;
    echo '<ul class="pagination-links">';
    echo '<li>' . $prev . '</li>  ';
    echo '<li>';
    echo $paged . ' из ' . $total;
    echo '</li>';
    echo '<li>' . $next . '</li>';
    echo '</ul>';
} 

add_filter('query_vars', 'parameter_queryvars');
function parameter_queryvars($qvars)
{
    $qvars[] = 'quote';
    $qvars[] = 'land'; 
    $qvars[] = 'home-type'; 
    $qvars[] = 'facade';  

    return $qvars;
}

function get_image($id, $size = 'large')
{
    $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), $size);
    
    return $img[0];
}
function the_image($id, $size = 'large')
{
    echo get_image($id, $size);
}

function populateMap($dbug = FALSE){

    $markers = array();  
    // top
    $markers["A"][1]  = array(47,48,87,88,127);
    $markers["A"][2]  = array(50,51,90,91,93,130,131);
    $markers["A"][3]  = array(53,54,94,133,134);
    $markers["A"][4]  = array(55,56,57,95,96,97,135,136,137);
    $markers["A"][5]  = array(58,59,60,98,99,100,138,139,140);
    $markers["A"][6]  = array(62,102,103,142,143);
    $markers["A"][7]  = array(106,184,145,146,147,185,186,226,227,187);  
    
    // middle
    $markers["A"][8]  = array(292,293,332,333,372,373);
    $markers["A"][9]  = array(294,334,374,295,296,335,336,375,376);
    $markers["A"][10] = array(532,411,412,451,452,491,492);
    $markers["A"][11] = array(413,414,415,453,454,455,493,494,495,534);
    $markers["A"][12] = array(416,417,418,456,457,458,496,497,498,536,537,538);

    // bottom
    $markers["A"][13] = array(645,646,647,685,686,687,725, 726, 727, 765, 766, 767);
    $markers["A"][14] = array(648,649,650,688,689,690,728, 729, 730, 768, 769, 770);
    $markers["A"][15] = array(651,652,653,691,692,693,731, 732, 733, 771, 772, 773);
    $markers["A"][16] = array(654,655,656,694,695,696,734, 735, 736, 774, 775, 776);
    $markers["A"][17] = array(657,658,659,697,698,699,737, 738, 739, 777, 778, 779);
    $markers["A"][18] = array(660,661,662,700,701,702,740, 741, 742, 780, 781, 782);


    $markers["B"][1] = array(408,409,448,449,488,489);
    $markers["B"][2] = array(419,420,421,459,460,461,499,500,501,539,540,541);

    $markers["C"][1] = array(83,84,85,121,122,123,124,161,162,163);
    $markers["C"][2] = array(703,704,705,706,707,666,667,743,744,745,746,747);

    $markers["D"][1] = array(288,289,290,327,328,329,330,367,368,369,370);
    $markers["D"][2] = array(298,299,300,337,338,339,340,377,378,379,380);

    $markers["E"][1] = array(587,588,589,520,627,628,629,630,668,669,670);

    $markers["F"][1] = array(240, 241, 242, 243, 280, 281);
    $markers["F"][2] = array(282, 283, 320, 321, 322, 323);
    $markers["F"][3] = array(360, 361, 362, 363, 400, 401);
    $markers["F"][4] = array(402, 403, 440, 441, 442, 443);
    $markers["F"][5] = array(480, 481, 482, 483, 520, 521);
    $markers["F"][6] = array(522, 523, 560, 561, 562, 563, 600, 601, 602, 603);

    $keys = array("A","B","C","D","E","F");
    
    $centers = array(87,90,94,57,60,103,146, 292,294, 532, 413, 416,  645,648,651,654,657,660);
 
    for($r=0;$r<20;$r++){
        $bound = 40;
        echo '<div>';
        for($c=0;$c<$bound;$c++){

            $val = $r*$bound+$c; 
            
            $found = FALSE;

            foreach ($keys as $v) {

                if(!$found)
                    foreach ($markers[$v] as $key => $value) {
                        
                        if($cell = showCell($v.$key, $val, $markers[$v][$key], $dbug, $centers)){

                            $found = TRUE; 
                            echo $cell;  
                        }
                    } 
                else
                    break;
            }

            if(!$found){
                if(!$dbug)
                    $val = '';
                echo '<div class="cell">'.$val.'</div>';
            }
        }
        echo '</div>';
    }
}

function showCell($class,$val,$arr,$dbug,$centers=array()){

    if( in_array($val,$arr) ){ 

        $id = 'id="'.$class.'"';
        if(!$dbug)
            $val = '';
        if($dbug)
            $style = 'style="background:#000;"';
        return '<div class="cell '.$class.'" '.$id.' '.$style.'>'.$val.'</div>';
    }else{
        return FALSE; 
    }
} 

?>