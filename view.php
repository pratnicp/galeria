<?php

function generate_password_change() {
    echo '<form method="post" action="password.php" class="guestbook_form">';
    echo '<div class="form_input_div">';
    echo '<p><span class="form_input">Obecne hasło: </span><input type="password" name="old_passwd"/></p>';
    echo '<p><span class="form_input">Nowe hasło: </span><input type="password" name="new_passwd1"/></p>';
    echo '<p><span class="form_input">Ponownie nowe hasło: </span><input type="password" name="new_passwd2"/></p>';
    echo '<input type="submit" value="Wyślij"/></div></form>';
}

function generate_message($message, $last_url, $err) {
    echo '<div class="message">';
    echo $message;
    echo "<a href=\"$last_url\"> Powrót </a>";
    echo '</div>';
}

require_once 'classes/classes.php';

function open_HTML() {
    header('Content-Type: text/html; charset = utf-8');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <?php
    }
    
    function close_body_HTML() {
        print'</body>';
        print'</html>';
    }
    
    function print_HTML_head($action) {
        echo '<html xmlns="http://www.w3.org/1999/xhtml">';
        ?>
	<head profile="http://gmpg.org/xfn/11">
    <title>JerzyBudziszewski.pl</title>
    <link rel="shortcut icon" href="graphics/favicon.ico" />
    <link rel="stylesheet" title="default" href="style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="scripts/scripts.js" ></script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="pl-pl" />
    <meta http-equiv="imagetoolbar" content="false" />
    <meta name="author" content="Piotr Prątnicki" />
    <meta name="classification" content="sztuka, art, galeria, gallery"/>
    <meta name="description" content="JerzyBudziszewski.pl - Strona artysty."/>
    <meta name="keywords" content="JerzyBudziszewski.net, sztuka, art, galeria, gallery, zaczeniuk, beksiński, biegas, ecole de paris, halicka, hayden, kierzkowski, mela muter, tarasewicz, tarasin, tatarczyk, terlikowski, pągowska, nowosielski, fangor, malarstwo polskie, malarstwo europejskie, antyki, obrazy, galeria, rzeźby, dziela sztuki, sprzedaz, sztuka współczesna,"/>
    <meta name="mssmarttagspreventparsing" content="true" />
    <meta name="robots" content="index, follow, noarchive" />
    <meta name="revisit-after" content="7 days" />
	<?php
	if ($action=='article'){
	echo '
	<script src="scripts/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/jquery.lazyload.js?v=3" type="text/javascript" charset="utf-8"></script>';
	}
	if ($action=='paintings'){
	echo '<script src="scripts/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/jquery.lazyload.js?v=3" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="scripts/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
	<script src="scripts/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
';
	}
    if ($action=='admin'){
echo '   <script type="text/javascript" src="bbeditor/ed.js"></script>';
echo '<script src="scripts/jquery.js" type="text/javascript"></script>';
echo '<script src="scripts/tablednd.js" type="text/javascript"></script>';
echo '<script type="text/javascript" src="scripts/ajaxfileupload.js"></script>';
    }?>
</head>
    <?php
    echo '<body>';
}

function  print_container($action) {
    echo '<div id="wrap">';
    echo '<div id="top"></div>';
    print_header($action, $_SESSION["sql_conn"]);
    print_content($action, $_SESSION["sql_conn"]);
    print_footer();
    echo '<div id="bottom"></div>';
    echo '</div>';
}

function print_header($action, $conn) {
    ?>
<div id="header">
    <div id="logo"><a href="index.php"><span class="logoGray">jerzy</span>budziszewski<span class="logoGray">.pl</span></a></div>
	    <?php
		if($action != 'admin' && $action != 'message' && $action != 'delete')
		{echo '
	<div id="navigationImages">
		<ul>
		<li><img src="graphics/1.jpg" alt=""/></li>
		<li ><img src="graphics/2.jpg" alt=""/></li>
		<li ><img src="graphics/3.jpg" alt=""/></li>
		<li ><img src="graphics/4.jpg" alt=""/></li>
		<li ><img src="graphics/5.jpg" alt=""/></li>
		<li class="last "><img src="graphics/6.jpg" alt=""/></li>
		</ul>
	</div>';
	print_navigation($action, $conn);
}
     ?>
</div>
    <?php
}

function print_navigation($action, $conn) {
    echo '<div id="navigation">';
    echo '<ul>';
    $menu_id = 0;
    if($action == 'paintings' || $action == 'techniques'){
		$menu_id = 6;
		}
		elseif($action == 'article') {
        $article_id = get_int_parameter('article');
        switch ($article_id) {
            case 1:
                $menu_id = 1;
                break;
            case 2:
                $menu_id = 2;
                break;
            case 3:
                $menu_id = 3;
                break;
            case 4:
                $menu_id = 4;
                break;
			case 5:
                $menu_id = 5;
                break;
        }
    }		
	elseif($action == NULL)
		$menu_id = 6;
	$active1 = "";
	$active2 = "";
	$active3 = "";
	$active4 = "";
	$active5 = "";
	$active6 = "";
			if($menu_id == '1')
				$active1 = "class=\"active\"";
			if($menu_id == '2')
				$active2 = "class=\"active\"";
			if($menu_id == '3')
				$active3 = "class=\"active\"";
			if($menu_id == '4')
				$active4 = "class=\"active\"";
			if($menu_id == '5')
				$active5 = "class=\"last active\"";
			else
				$active5 = "class=\"last\"";
			if($menu_id == '6')
				$active6 = "class=\"active\"";
			echo "<li $active6><a href=\"./index.php?action=techniques\">TWÓRCZOŚĆ</a></li>";
			echo "<li $active1><a href=\"./index.php?action=article&amp;article=1\">BIOGRAFIA</a></li>";
			echo "<li $active2><a href=\"./index.php?action=article&amp;article=2\">WYSTAWY</a></li>";
			echo "<li $active3><a href=\"./index.php?action=article&amp;article=3\">ARCHIWUM</a></li>";
			echo "<li $active4><a href=\"./index.php?action=article&amp;article=4\">O STRONIE</a></li>";
			echo "<li $active5><a href=\"./index.php?action=article&amp;article=5\">KONTAKT</a></li>";
    echo '</ul></div>';
}

function print_content($action, $conn) {
    print'<div id="page_content">';
    generate_content($action, $conn);
    print'<div class="clear"></div>';
    print'</div>';
}

function generate_content($action, $conn) {
    switch ($action) {
        case 'techniques':
            generate_techniques($conn);
            break;
        case 'paintings':
            $technique_id = get_int_parameter('technique');
            generate_paintings($technique_id, $conn);
            break;
        case 'article':
            $article_id = get_int_parameter('article');
            generate_article($article_id, $conn);
            break;
        case 'admin':
            if ($_SESSION['name'] != 'admin') {
                generate_login();
                break;
            }
            $object = get_string_parameter('object');
            admin_object($object, $conn);
            break;
        case 'delete':
            if ($_SESSION['name'] != 'admin') {
                generate_login();
                break;
            }
            $object = get_string_parameter('object');
            $id = get_int_parameter('id');
            delete_object($object, $id, $conn);
            break;
        case 'message':
            show_message();
            break;

        default:
            generate_techniques($conn);
            break;
    }
}

function print_footer() {
    echo '<div id="footer">';
    echo '<p>';
    echo '00-515 Warszawa, ul. Żurawia 26, tel./fax 22 622 69 90, <a href="mailto:info@jerzybudziszewski.pl">info@jerzybudziszewski.pl</a> | Copyright &copy; JerzyBudziszewski.pl 2012 ';
    echo '</p>';
    echo '</div>';
?>
<!-- (C) 2004 stat.pl - ver 1.0 / 11 -->
<script type="text/javascript">
<!--
document.writeln('<'+'scr'+'ipt type="text/javascript" src="http://home.hit.stat.pl/_'+(new Date()).getTime()+'/script.js?id=ciU7K88tHIiujYfuvCk4lrPo7zXKfBtOaeyYuMDxHSj.L7"></'+'scr'+'ipt>');
//-->
</script>
<?php
}

function generate_login() {
    ?>
<h1>Logowanie</h1>
<form action="login.php" method="post">
    <table>
        <tbody>
            <tr>
                <td>Login:</td><td><input type="text" name="login"/></td>
            </tr>
            <tr>
                <td>Hasło:</td><td><input type="password" name="password"/></td>
            </tr>
            <tr><td></td><td><input type="submit" value="Zaloguj"/></td></tr>
        </tbody>
    </table>
</form>
    <?php
}

function show_message() {
//    session_start();

    $url = isset($_SESSION["last_url"])?$_SESSION["last_url"]:generate_link("index.php");
    $message = isset($_SESSION["message"])?$_SESSION["message"]:"";
    echo "<div class='message'>$message <a href=\"$url\">powrót</a></div>";
}

function generate_techniques($conn) {
    echo '<div id="sideNavigation"><ul>';
    $techniques = Technique::load($conn, 'status=1', 'id');
    for ($index = 0; $index < count($techniques); $index++) {
        echo '<li>';
        $technique = $techniques[$index];
        $name = $technique->get_name();
        $link = generate_link("index.php?action=paintings&amp;technique=" . $technique->get_id());
        echo "<a href=\"$link\">$name</a>";
        echo '</li>';
    }
    echo '</ul></div>';
}

function generate_paintings($technique_id, $conn) {
    $technique = Technique::load_one($conn, "id=$technique_id");
    echo "<p id=\"technique\"><span>" . $technique->get_name() . "</span></p><hr style=\"height:2px; background-color:black;\"/>";
    $paintings = Painting::load($conn, "technique_id=$technique_id and status=1", "order_id, id desc");
	if(Count($paintings)=='0')
		echo "<h3>Brak obrazów</h3>";

    echo "<table class=\"align_left gallery clearfix\" id=\"infinite_scroll\"><tbody>";
    foreach ($paintings as $painting) {
        echo '<tr>';
        echo '<td class="narrow align_top">';
        if ($painting->get_photo() != null) {
            $thumbnail_link = generate_link("images/" . $painting->get_photo().'.jpeg');
			$image_link = generate_link("images/" . $painting->get_photo().'big.jpeg');
            echo "<a href=\"$image_link\" rel=\"prettyPhoto\" title=\"" .$painting->get_name(). "\"><img src=\"$thumbnail_link\" alt=\" \" /></a>";
        } else {
            $image_link = generate_link("graphics/art.png");
            echo "<a href=\"\"><img src=\"$image_link\" alt=\"" . $painting->get_name() . "\" /></a>";
        }
        echo '</td><td class="align_top">';
        echo "<h1 class=\"paintingName\">" . $painting->get_name() . "</h1>";
		echo "<p> <br/>" . $painting->get_dimensions() . "</p>";
        echo '</td></tr>';
    }
    echo '</tbody></table>';
	echo '<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
          $("img").lazyload();
  $("area[rel^=\'prettyPhoto\']").prettyPhoto();
  $(".gallery:first a[rel^=\'prettyPhoto\']").prettyPhoto({animation_speed:\'normal\',theme:\'dark_square\',slideshow:3000, autoplay_slideshow: false,social_tools:\'\'});
  
});
</script>
';
}

function generate_article($article_id, $conn) {
    /* @var $article Article */
    $article = Article::load_one($conn, "id=$article_id");
    display_article($article->get_name(), $article->get_content());
}

function display_article($title, $content) {

    echo "<h1>$title</h1>";
    echo "<div id=\"article_content\">" . decode_BBCode($content) . "</div>";
	echo '  <script type="text/javascript" charset="utf-8">
      $(function() {
          $("img").lazyload();
      });
  </script>';
}

function generate_admin_subnavigation($techniques) {
    $gallery_link = generate_link("index.php?action=admin&amp;object=techniques");
    $action_link = generate_link("index.php?action=admin&amp;object=articles");

    echo '<div id="subnavigation"><ul>';
    echo "<li><a href=\"$gallery_link\"" . ($techniques?'class="active"':'') . ">Techniki i obrazy</a></li>";
    echo "<li><a href=\"$action_link\"" . ($techniques?'':'class="active"') . ">Artykuły</a></li>";
    echo '</ul>';
    echo '</div>';
}

function admin_object($object, $conn) {
    switch ($object) {
        case 'article':
            generate_admin_subnavigation(false);
            $article_id = get_int_parameter('id');
            $article = Article::load_one($conn, "id=$article_id");
			if($article_id == 1)
				echo "<h1> Biografia </h1>";
			elseif($article_id == 4)
				echo "<h1> O stronie </h1>";
            else
				echo "<h1>" . $article->get_name() . "</h1>";
            $article->create_form(generate_link("save.php?object=article"), true);
            break;
        case 'technique':
            generate_admin_subnavigation(true);
            $technique_id = get_int_parameter('id');
            $technique = null;
            $new = ($technique_id == NULL || ($technique = Technique::load_one($conn, "id=$technique_id")) === false);
            if ($new) {
                $technique = new Technique(array());
            }
            echo "<h1>" . $technique->get_name() . "</h1>";
			$defaultVisible = false;
			if($technique_id == null)
				$defaultVisible = true;
            $technique->create_form(generate_link("save.php?object=technique"), true, $conn, $defaultVisible);
            if (!$new) {
                echo '<h1>Obrazy</h1>';
                list_paintings($conn, $technique_id, true, true);
            }
            break;
        case 'painting':
            generate_admin_subnavigation(true);
            $painting_id = get_int_parameter('id');
            $new = ($painting_id == NULL || ($painting = Painting::load_one($conn, "id=$painting_id")) == false);
            if ($new) {
                $painting = new Painting(array());
                $technique_id = get_int_parameter('technique_id');
                $painting->set_technique_id($technique_id);
            }
            echo "<h1>" . $painting->get_name() . "</h1>";
			$defaultVisible = false;
			if($painting_id == null)
				$defaultVisible = true;
            $painting->create_form(generate_link("save.php?object=painting"), true,$conn, $defaultVisible);
            break;
        case 'articles':
            generate_admin_subnavigation(false);
            echo "<h1>Artykuły</h1>";
            $articles = Article::load($conn);
            list_articles($articles, false, false);
            break;
        case 'techniques':
            generate_admin_subnavigation(true);
            list_techniques($conn, true, true);
            break;
        default:
            generate_admin_subnavigation(true);
            list_techniques($conn, true, true);
    }
}

function list_paintings($conn, $technique_id, $delete, $create) {
    $table_id = "table-sortable";
    make_table_sortable($table_id);
    $paintings_gallery = Painting::load($conn, "technique_id=$technique_id", 'order_id');
    echo "<table id=\"$table_id\" class='table'><tbody>";
    if ($create) {
        $create_link = generate_link("index.php?action=admin&amp;object=painting&amp;technique_id=$technique_id");
        echo "<tr class=\"nodrop nodrag\"><td><a href=\"$create_link\"><strong> Utwórz nowy</strong> </a></td></tr>";
    }
    foreach ($paintings_gallery as $object) {
        echo '<tr id="' . $object->get_id() . '"><td>';
        $edit_link = generate_link("index.php?action=admin&amp;object=painting&amp;id=" . $object->get_id());
        echo "<a href=\"$edit_link\">" . $object->get_name() . "</a>";
        if ($delete) {
            $edit_link = generate_link("index.php?action=delete&amp;object=painting&amp;id=" . $object->get_id());
            echo "</td><td><a href=\"$edit_link\"> usuń </a>";
        }
        echo '</td></tr>';

    }
    echo '</tbody></table>';
}

function make_table_sortable($table_id) { ?>
<script type="text/javascript">
    $(document).ready(function() {
    <?php   echo "$('#$table_id').tableDnD({" ?>
            onDrop: function(table, row) {
                var url="save.php?object=paintingsOrder&"+($.tableDnD.serialize());
                $.get(url);
            } }); });
</script>
    <?php
}

function list_articles($articles, $delete, $create) {
    echo '<table class="table"><tbody>';
	echo '
	<tr><td>
        <a href="index.php?action=admin&amp;object=article&amp;id=1">Biografia</a>
	</td></tr>
	<tr><td>
        <a href="index.php?action=admin&amp;object=article&amp;id=2">Wystawy</a>
	</td></tr>
	<tr><td>
        <a href="index.php?action=admin&amp;object=article&amp;id=3">Archiwum</a>
	</td></tr>
	<tr><td>
        <a href="index.php?action=admin&amp;object=article&amp;id=4">O stronie</a>
	</td></tr>
	<tr><td>
        <a href="index.php?action=admin&amp;object=article&amp;id=5">Kontakt</a>
	</td></tr>	
		';
    echo '</tbody></table>';
}

function list_techniques($conn, $delete, $create) {
    echo "<h1>Techniki</h1>";
    echo '<table class="table"><tbody>';
    if ($create) {
        $create_link = generate_link("index.php?action=admin&amp;object=technique");
        echo "<tr><td> <a href=\"$create_link\"> Utwórz nową </a> </td></tr>";
    }
    $techniques = Technique::load($conn, '1', 'name');
    echo '<tr>';
    for ($index = 0; $index < count($techniques); $index++) {
        $technique = $techniques[$index];
        $name = $technique->get_name();
        $link = generate_link("index.php?action=admin&amp;object=technique&amp;id=" . $technique->get_id());
        echo "<td>";
        echo "<a href=\"$link\">$name</a>";
        if ($delete) {
            $delete_link = generate_link("index.php?action=delete&amp;object=technique&amp;id=" . $technique->get_id());
            echo "</td><td> <a href=\"$delete_link\"> usuń </a>  ";
        }
        echo "</td>";
        if ($index % 2 == 1) {
            echo '</tr><tr>';
        }
    }
    echo '</tr>';
    echo '</tbody></table>';
}

function delete_object($object, $id, $conn) {
    switch ($object) {
        case 'technique':
            $technique = Technique::load_one($conn, "id=$id");
            $paintings_list = Painting::load($conn, "technique_id=$id");
            foreach ($paintings_list as $painting) {
                delete_painting($painting, $conn);
            }
            Technique::delete($conn, "id=$id");
            generate_message('Technika zostałą usunięta', $_SERVER['HTTP_REFERER'], 0);
            break;
        case 'painting':
            $painting = Painting::load_one($conn, "id=$id");
            delete_painting($painting, $conn);
            generate_message('Obraz został usunięty', $_SERVER['HTTP_REFERER'], 0);
            break;
    }
}

function delete_painting($painting, $conn) {
    unlink("images/" . $painting->get_photo().'.jpeg');
    unlink("images/" . $painting->get_photo().'big.jpeg');
    Painting::delete($conn, "id=" . $painting->get_id());
}

?>
