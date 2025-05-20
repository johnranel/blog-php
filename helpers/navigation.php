<?php
    function loadProperCssFiles($current_site_path) {
        $current_site_path = ($current_site_path === "") ? "index" : $current_site_path;
        return '<link rel="stylesheet" href="./assets/styles/' . $current_site_path . '.css" type="text/css">';
    }

    function navLinks($site_path) {
        $nav_links_name = ["index", ["travel", "blog", "ootd"], "about", "contact", "login", "register"];
        $nav_link_elems = "<ul>";

        for($i = 0; $i < count($nav_links_name); $i++) {
            if(!is_array($nav_links_name[$i])) {
                $nav_link_name = ($nav_links_name[$i] === "index") ? "HOME" : strtoupper($nav_links_name[$i]);
                $nav_link_active = ($site_path === $nav_links_name[$i]) ? 'class="active"' : '';
                $nav_link_elems .= '<li><a href="' . $nav_links_name[$i] . '.php" ' . $nav_link_active . '>' . $nav_link_name . '</a></li>';
            } else {
                $nav_link_elems .= '<li class="dropdown-nav"><span>POSTS</span><ul>';
                $sub_nav_link_names = $nav_links_name[$i];
                for($j = 0; $j < count($sub_nav_link_names); $j++) {
                    $sub_nav_link_active = ($site_path === $sub_nav_link_names[$j]) ? 'class="active"' : '';
                    $nav_link_elems .= '<li><a href="' . $sub_nav_link_names[$j] . '.php" ' . $sub_nav_link_active . '>' . strtoupper($sub_nav_link_names[$j]) . '</a></li>';
                }
                $nav_link_elems .= '</ul></li>';
            }
        }

        $nav_link_elems .= "</ul>";

        return $nav_link_elems;
    }
?>