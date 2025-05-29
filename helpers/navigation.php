<?php
    include_once("authentication.php");

    function loadCssFiles($current_site_path) {
        $current_site_path = ($current_site_path === "") ? "index" : $current_site_path;
        $current_site_path = ($current_site_path === "/admin/dashboard" || $current_site_path === "/admin/travel" || $current_site_path === "/admin/blog" || $current_site_path === "/admin/ootd") ? "/admin/dashboard" : $current_site_path;
        return '<link rel="stylesheet" href="' . SITE_URL . '/assets/styles' . $current_site_path . '.css" type="text/css">';
    }

    function loadJsFiles($current_site_path) {
        $scripts = "";
        if($current_site_path === "/admin/dashboard") {
            $scripts .= '<script type="text/javascript" src="' . SITE_URL . '/assets/js/ajax/admin/dashboard.js"></script>';
        }
        if($current_site_path === "/admin/travel" || $current_site_path === "/admin/blog" || $current_site_path === "/admin/ootd") {
            $scripts .= '<script type="text/javascript" src="' . SITE_URL . '/assets/js/modals.js"></script>';
            $scripts .= '<script type="text/javascript" src="' . SITE_URL . '/assets/js/ajax/admin/posts.js"></script>';
        }
        if($current_site_path === "/travel" || $current_site_path === "/blog" || $current_site_path === "/ootd") {
            $scripts .= '<script type="text/javascript" src="' . SITE_URL . '/assets/js/ajax/public/posts.js"></script>';
        }
        if($current_site_path === "/travel-post" || $current_site_path === "/blog-post") {
            $scripts .= '<script type="text/javascript" src="' . SITE_URL . '/assets/js/ajax/public/post_details.js"></script>';
        }
        if($current_site_path === "" || $current_site_path === "/index") {
            $scripts .= '<script type="text/javascript" src="' . SITE_URL . '/assets/js/ajax/public/index.js"></script>';
        }
        return $scripts;
    }

    function navLinks($site_path) {
        $nav_links_name = ["index", ["travel", "blog", "ootd"], "about", "contact"];
        if (isLoggedIn()) {
            array_push($nav_links_name, ["logout"]);
        } else {
            array_push($nav_links_name, "login", "register");
        }
        $nav_link_elems = "<ul>";

        for($i = 0; $i < count($nav_links_name); $i++) {
            if(!is_array($nav_links_name[$i])) {
                $nav_link_name = ($nav_links_name[$i] === "index") ? "HOME" : strtoupper($nav_links_name[$i]);
                $nav_link_active = ($site_path === $nav_links_name[$i]) ? 'class="active"' : '';
                $nav_link_elems .= '<li><a href="/' . $nav_links_name[$i] . '.php" ' . $nav_link_active . '>' . $nav_link_name . '</a></li>';
            } else {
                if($nav_links_name[$i][0] === "travel") {
                    $nav_link_elems .= '<li class="dropdown-nav"><span>POSTS</span><ul>';
                } else {
                    $nav_link_elems .= '<li class="dropdown-nav"><a href="/my_profile.php">MY PROFILE</a><ul>';
                    if(isAdmin()) {
                        $nav_link_elems .= '<li class="dropdown-nav"><a href="/admin/dashboard.php">ADMIN DASHBOARD</a></li>';
                    }
                }
                $sub_nav_link_names = $nav_links_name[$i];
                for($j = 0; $j < count($sub_nav_link_names); $j++) {
                    $sub_nav_link_active = ($site_path === $sub_nav_link_names[$j]) ? 'class="active"' : '';
                    $sub_link = ($sub_nav_link_names[$j] !== "logout") ? $sub_nav_link_names[$j] . ".php" : "controllers/user.php?logout=1";
                    $nav_link_elems .= '<li><a href="/' . $sub_link . '" ' . $sub_nav_link_active . '>' . strtoupper($sub_nav_link_names[$j]) . '</a></li>';
                }
                $nav_link_elems .= '</ul></li>';
            }
        }

        $nav_link_elems .= "</ul>";

        return $nav_link_elems;
    }
?>