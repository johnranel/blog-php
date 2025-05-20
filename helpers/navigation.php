<?php
    function loadProperCssFiles($current_site_path) {
        return '<link rel="stylesheet" href="./assets/styles/' . $current_site_path . '.css" type="text/css">';
    }

    function navLinks($site_path) {
        $nav_links_name = ["index", "travel", "blog", "ootd", "about", "contact"];
        $nav_link_elems = "";

        for($i = 0; $i < count($nav_links_name); $i++) {
            $nav_link_name = ($nav_links_name[$i] === "index") ? "HOME" : strtoupper($nav_links_name[$i]);
            $nav_link_active = ($site_path === $nav_links_name[$i]) ? 'class="active"' : '';
            $nav_link_elems .= '<a href="' . $nav_links_name[$i] . '.php" ' . $nav_link_active . '>' . $nav_link_name . '</a>';
        }

        return $nav_link_elems;
    }
?>