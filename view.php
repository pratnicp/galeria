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
    <title>Artgaleria.net</title>
    <link rel="shortcut icon" href="graphics/favicon.ico" />
    <link rel="stylesheet" title="default" href="style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="scripts/scripts.js" ></script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="pl-pl" />
    <meta http-equiv="imagetoolbar" content="false" />
    <meta name="author" content="Wojciech Terlikowski" />
    <meta name="classification" content="sztuka, art, galeria, gallery"/>
    <meta name="description" content="Artgaleria.net - Odkrycia w sztuce. Prezentacja Galerii Sztuki."/>
    <meta name="keywords" content="Artgaleria.net, sztuka, art, galeria, gallery, zaczeniuk, beksiński, biegas, ecole de paris, halicka, hayden, kierzkowski, mela muter, tarasewicz, tarasin, tatarczyk, terlikowski, pągowska, nowosielski, fangor, malarstwo polskie, malarstwo europejskie, antyki, obrazy, galeria, rzeźby, dziela sztuki, sprzedaz, sztuka współczesna,"/>
    <meta name="mssmarttagspreventparsing" content="true" />
    <meta name="robots" content="index, follow, noarchive" />
    <meta name="revisit-after" content="7 days" />
    <script type="text/javascript" src="bbeditor/ed.js"></script>
</head>
    <?php
    echo '<body>';
}

function  print_container($action) {
    echo '<div id="wrap">';
    echo '<div id="top"></div>';
    print_header();
    print_navigation($action, $_SESSION["sql_conn"]);
    print_content($action, $_SESSION["sql_conn"]);
    print_footer();
    echo '<div id="bottom"></div>';
    echo '</div>';
}

function print_header() {
    ?>

<div id="header">
    <a href="http://www.artgaleria.net/index.php">
        <img src="logo.jpeg" alt="Artgaleria.net" class="banner" width="750" height="95"/>
    </a>
</div>
    <?php
}

function print_navigation($action, $conn) {
    echo '<div id="navigation">';
    echo '<ul>';
    $menu_items = Menu::load($conn, 'level=0', 'id');
    /* @var $item Menu */
    foreach ($menu_items as $item) {
        $link = generate_href($item->get_action());
        $name = $item->get_description();
        echo "<li><a $link>$name</a></li>";
    }
    echo '</ul></div>';
}

function print_content($action, $conn) {
    print'<div id="page_content">';
    generate_content($action, $conn);
    print'</div>';
}

function generate_content($action, $conn) {
    switch ($action) {
        case 'artists':
            generate_artists($conn);
            break;
        case 'paintings':
            $artist_id = get_int_parameter('artist');
            generate_paintings($artist_id, $conn);
            break;
        case 'biography':
            $artist_id = get_int_parameter('artist');
            generate_biography($artist_id, $conn);
            break;
        case 'form':
            $painture_id = get_int_parameter('painting');
            generate_form($painture_id, $conn);
            break;
        case 'article':
            $article_id = get_int_parameter('article');
            generate_article($article_id, $conn);
            break;
//        case 'save':
//            $object = get_string_parameter('object');
//            save_object($object, $conn);
//            break;
        case 'admin':
            if ($_SESSION['name'] != 'admin') {
                generate_login();
                break;
            }
            $object = get_string_parameter('object');
            admin_object($object, $conn);
            break;
        case 'report':
            if ($_SESSION['name'] != 'admin') {
                generate_login();
                break;
            }
            $object = get_string_parameter('object');
            report($object, $conn);
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
            generate_artists($conn);
            break;
    }
}

function print_footer() {
    echo '<div id="footer">';
    echo '<p>';
    echo 'Copyright &copy; <a href="http://www.artgaleria.net">Artgaleria.net</a> 2010 | 00-515 Warszawa, ul. Żurawia 26, tel./fax 22 622 69 90, <a href="mailto:art@artgaleria.net">art@artgaleria.net</a>';
    echo '</p>';
    echo '</div>';
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
    echo "<span>$message <a href=\"$url\">powrót</a></span>";
}

function generate_artists($conn) {
    echo '<table id="artists"><tbody>';
    $artists = Artist::load($conn, 'active=1', 'surname');
    $artists_column = ceil(count($artists) / 2);
    for ($index = 0; $index < $artists_column; $index++) {
        echo '<tr>';
        /* @var $artist Artist */
        $artist_left = $artists[$index];
        $name_left = $artist_left->get_name() . " " . $artist_left->get_surname();
        $link_left = generate_link("index.php?action=paintings&amp;artist=" . $artist_left->get_id() . "&amp;store=default");
        echo '<td class="artist-empty"></td>';
        echo "<td><a href=\"$link_left\">$name_left</a></td>";
        if (($index + $artists_column) < count($artists)) {
            $artist_right = $artists[$index + $artists_column];
            $name_right = $artist_right->get_name() . " " . $artist_right->get_surname();
            $link_right = generate_link("index.php?action=paintings&amp;artist=" . $artist_right->get_id() . "&amp;store=default");
            echo "<td><a href=\"$link_right\">$name_right</a></td>";
        } else {
            echo "<td></td>";
        }
        echo '</tr>';
    }
    echo '</tbody></table>';
}

function generate_paintings($artist_id, $conn) {
    /* @var $artist Artist */
    $artist = Artist::load_one($conn, "id=$artist_id");
    echo "<p id=\"artist\"><span>" . $artist->get_name() . " " . $artist->get_surname() . "</span> ";
    $link = generate_link("index.php?action=biography&amp;artist=$artist_id");
    echo $artist->get_born() . " <a href=\"$link\">biografia</a></p>";

    $gallery = true;
    $store = get_string_parameter('store');
    switch ($store) {
        case 'auction':
            $paintings_new = Painting::load($conn, "artist_id=$artist_id and gallery=0 and auction_date>=curdate()", "auction_date");
            $paintings_old = Painting::load($conn, "artist_id=$artist_id and gallery=0 and auction_date<curdate()", "auction_date");
            $paintings = array_merge($paintings_new, $paintings_old);
            $gallery = false;
            break;
        case 'default':

            $paintings = Painting::load($conn, "artist_id=$artist_id and gallery=1", "paintings_order");
            if (count($paintings) == 0) {
                $paintings_new = Painting::load($conn, "artist_id=$artist_id and gallery=0 and auction_date>=curdate()", "auction_date");
                $paintings_old = Painting::load($conn, "artist_id=$artist_id and gallery=0 and auction_date<curdate()", "auction_date");
                $paintings = array_merge($paintings_new, $paintings_old);
                $gallery = false;
            }
            break;
        case 'gallery':
        default:
            $paintings = Painting::load($conn, "artist_id=$artist_id and gallery=1", "auction_date");
            $gallery = true;
    }

    generate_subnavigation($artist_id, $gallery);
    echo "<table><tbody>";
    foreach ($paintings as $painting) {
        echo '<tr>';
        $form_link = generate_link("index.php?action=form&amp;painting=" . $painting->get_id());
        echo '<td class="narrow">';
        if ($painting->get_photo() != null) {
            if ($painting->get_pdf_file() != null) {
                $file_link = generate_link("files/" . $painting->get_pdf_file());
            } else {
                $file_link = false;
            }
            $image_link = generate_link("images/" . $painting->get_photo());
            if ($file_link) {
                echo "<a href=\"$file_link\">";
            }
            echo "<img src=\"$image_link\" alt=\"" . $painting->get_name() . "\" />";
            if ($file_link) {
                echo '</a>';
            }
        } else {
            $image_link = generate_link("graphics/art.png");
            echo "<a href=\"$form_link\"><img src=\"$image_link\" alt=\"" . $painting->get_name() . "\" /></a>";
        }
        echo '</td><td>';
        echo "<h2>" . $painting->get_name() . "</h2>";
        echo "<p> " . decode_BBCode($painting->get_info()) . "<br/> <a href=\"$form_link\">więcej</a> </p>";
        if (!$gallery) {
            echo "<p>Data aukcji: " . $painting->get_auction_date();
            if (!is_null_or_empty($painting->get_estimated_price())) {
                echo ", estymata " . $painting->get_estimated_price();
            }
            echo "</p>";

            if ($painting->get_status() == 1) {
                echo '<p>Sprzedany ';
                if (!is_null_or_empty($painting->get_price())) {
                    echo "za " . $painting->get_price();
                }
                echo '</p>';
            }
        }
        echo '</td></tr>';
    }
    echo '</tbody></table>';
}

function generate_form($painting_id, $conn) {
    $painting = Painting::load_one($conn, "id=$painting_id");
    $artist = Artist::load_one($conn, "id=" . $painting->get_artist_id());

    echo "<h1>" . $artist->get_name() . " " . $artist->get_surname() . " - " . $painting->get_name() . "</h1>";
    echo "<p>Dziękujemy za zainteresowanie. Po podaniu adresu e-mail wyślemy zdjęcie lub uzupełniające dane o dziele.</p>";
    /* @var $user Statistics */
    $user = false;
    if ($_SESSION['email'] != "") {
        $user = Statistics::load_one($conn, "email='" . $_SESSION['email'] . "'");
        if ($user) {
            $user->set_price(null);
            $user->set_notice(null);
        }
    }
    if (!$user) {
        $user = new Statistics(array());
    }
    $user->set_painting_id($painting_id);
    $user->create_form(generate_link("save.php?object=user"), true);
}

function generate_article($article_id, $conn) {
    /* @var $article Article */
    $article = Article::load_one($conn, "id=$article_id");
    display_article($article->get_name(), $article->get_content());
}

function generate_biography($artist_id, $conn) {
    /* @var $article Acticle */
    $artist = Artist::load_one($conn, "id=$artist_id");
    if ($artist->get_photo() != null) {
        $artist_photo = generate_link('images/' . $artist->get_photo());
        echo '<div class="biography-photo"> <img src="' . $artist_photo . '" alt="' . $artist->get_name() . ' ' . $artist->get_surname() . '"/></div>';
    }
    display_article($artist->get_name() . " " . $artist->get_surname(), $artist->get_bigraphy());
}

function display_article($title, $content) {
    echo "<h1>$title</h1>";
    echo "<p>" . decode_BBCode($content) . "</p>";
}

function generate_subnavigation($artist_id, $gallery) {
    $gallery_link = generate_link("index.php?action=paintings&amp;artist=$artist_id&amp;store=gallery");
    $action_link = generate_link("index.php?action=paintings&amp;artist=$artist_id&amp;store=auction");

    echo '<div id="subnavigation"><ul>';
    echo "<li><a href=\"$gallery_link\"" . ($gallery?'class="active"':'') . ">Galeria</a></li>";
    echo "<li><a href=\"$action_link\"" . ($gallery?'':'class="active"') . ">Aukcje</a></li>";
    echo '</ul>';
    echo '</div>';
}

function generate_admin_subnavigation($artists) {
    $gallery_link = generate_link("index.php?action=admin&amp;object=artists");
    $action_link = generate_link("index.php?action=admin&amp;object=articles");

    echo '<div id="subnavigation"><ul>';
    echo "<li><a href=\"$gallery_link\"" . ($artists?'class="active"':'') . ">Artyści</a></li>";
    echo "<li><a href=\"$action_link\"" . ($artists?'':'class="active"') . ">Artykuły i raporty</a></li>";
    echo '</ul>';
    echo '</div>';
}

function admin_object($object, $conn) {
    switch ($object) {
        case 'article':
            generate_admin_subnavigation(false);
            $article_id = get_int_parameter('id');
            $article = Article::load_one($conn, "id=$article_id");
            echo "<h1>" . $article->get_name() . "</h1>";
            $article->create_form(generate_link("save.php?object=article"), true);
            break;
        case 'artist':
            generate_admin_subnavigation(true);
            $artist_id = get_int_parameter('id');
            $artist = null;
            $new = ($artist_id == NULL || ($artist = Artist::load_one($conn, "id=$artist_id")) === false);
            if ($new) {
                $artist = new Artist(array());
            }
            echo "<h1>" . $artist->get_name() . " " . $artist->get_surname() . "</h1>";
            $artist->create_form(generate_link("save.php?object=artist"), true);
            if (!$new) {
                echo '<h1>Obrazy</h1>';
                list_paintings($conn, $artist_id, true, true, true);
            }
            break;
        case 'painting':
            generate_admin_subnavigation(true);
            $painting_id = get_int_parameter('id');
            $new = ($painting_id == NULL || ($painting = Painting::load_one($conn, "id=$painting_id")) == false);
            if ($new) {
                $painting = new Painting(array());
                $artist_id = get_int_parameter('artist_id');
                $painting->set_artist_id($artist_id);
            }
            echo "<h1>" . $painting->get_name() . "</h1>";
            $painting->create_form(generate_link("save.php?object=painting"), true);
            break;
        case 'articles':
            generate_admin_subnavigation(false);
            echo "<h1>Artykuły</h1>";
            $articles = Article::load($conn);
            list_articles($articles, false, false);
            echo '<h1>Raporty</h1>';
            $report_link = generate_link("index.php?action=admin&amp;object=visitors");
            echo '<p><a href="' . $report_link . '">Raporty użytkowników</a></p>';
            break;
        case 'artists':
            generate_admin_subnavigation(true);
            list_artists($conn, true, true);
            break;
        case 'visitors':
            generate_admin_subnavigation(false);
            echo "<h1>Odwiedzający</h1>";
            $visitors = Statistics::load($conn);
            list_visitors($visitors, false, false);
            break;
        default:
            generate_admin_subnavigation(true);
            list_artists($conn, true, true);
    }
}

function list_paintings($conn, $artist_id, $delete, $create, $report) {
    $table_id = "table-sortable";
    make_table_sortable($table_id);
    $paintings_gallery = Painting::load($conn, "artist_id=$artist_id and gallery=1");
    $paintings_auction = Painting::load($conn, "artist_id=$artist_id and gallery=0");

    echo "<table id=\"$table_id\"><tbody>";
    if ($create) {
        $create_link = generate_link("index.php?action=admin&amp;object=painting&amp;artist_id=$artist_id");
        echo "<tr class=\"nodrop nodrag\"><td><a href=\"$create_link\"><strong> Utwórz nowy</strong> </a></td></tr>";
    }
    echo "<tr class=\"nodrop nodrag\"><td><strong> Obrazy na aukcjach</strong> </td></tr>";
    foreach ($paintings_auction as $object) {
        echo '<tr class="nodrop nodrag" id="' . $object->get_id() . '"><td>';
        $edit_link = generate_link("index.php?action=admin&amp;object=painting&amp;id=" . $object->get_id());
        echo "<a href=\"$edit_link\">" . $object->get_name() . "</a>";
        if ($delete) {
            $edit_link = generate_link("index.php?action=delete&amp;object=painting&amp;id=" . $object->get_id());
            echo "</td><td><a href=\"$edit_link\"> usuń </a>";
        }
        if ($report) {
            $report_link = generate_link("index.php?action=report&amp;object=painting&amp;id=" . $object->get_id());
            echo "</td><td><a href=\"$report_link\"> raport </a>";
        }
        echo '</td></tr>';

    }
    echo "<tr class=\"nodrop nodrag\"><td><strong> Obrazy w galerii</strong> </td></tr>";
    foreach ($paintings_gallery as $object) {
        echo '<tr id="' . $object->get_id() . '"><td>';
        $edit_link = generate_link("index.php?action=admin&amp;object=painting&amp;id=" . $object->get_id());
        echo "<a href=\"$edit_link\">" . $object->get_name() . "</a>";
        if ($delete) {
            $edit_link = generate_link("index.php?action=delete&amp;object=painting&amp;id=" . $object->get_id());
            echo "</td><td><a href=\"$edit_link\"> usuń </a>";
        }
        if ($report) {
            $report_link = generate_link("index.php?action=report&amp;object=painting&amp;id=" . $object->get_id());
            echo "</td><td><a href=\"$report_link\"> raport </a>";
        }
        echo '</td></tr>';

    }
    echo '</tbody></table>';
}

function make_table_sortable($table_id) { ?>
    <script src="scripts/jquery.js" type="text/javascript"></script>
    <script src="scripts/tablednd.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
<?php   echo "$('#$table_id').tableDnD({" ?>
    onDrop: function(table, row) {
    	var url="save.php?object=paintingsOrder&"+($.tableDnD.serialize());
       $.get(url);
     } }); });
    </script>
<?php }

function list_articles($articles, $delete, $create) {
    echo '<table><tbody>';
    if ($create) {
        $create_link = generate_link("index.php?action=admin&amp;object=article");
        echo "<tr><td><a href=\"$create_link\"> Utwórz nowy </a></td></tr>";
    }
    foreach ($articles as $object) {
        echo '<tr><td>';
        $edit_link = generate_link("index.php?action=admin&amp;object=article&amp;id=" . $object->get_id());
        echo "<a href=\"$edit_link\">" . $object->get_name() . "</a>";
        if ($delete) {
            $edit_link = generate_link("index.php?action=delete&amp;object=article&amp;id=" . $object->get_id());
            echo "<a href=\"$edit_link\"> usuń </a>";
        }
        echo '</td></tr>';

    }
    echo '</tbody></table>';
}

function list_visitors($visitors) {
    echo '<table><tbody>';
    foreach ($visitors as $object) {
        echo '<tr><td>';
        $vcard_link = generate_link("vcard.php?id=" . $object->get_id());
        echo "<a href=\"$vcard_link\">" . $object->get_name() . "</a></td><td>";
        $report_link = generate_link("index.php?action=report&amp;object=visitor&amp;id=" . $object->get_id());
        echo "<a href=\"$report_link\"> raport </a>";
        echo '</td></tr>';
    }
    echo '</tbody></table>';
}

function list_artists($conn, $delete, $create) {
    echo "<h1>Artyści</h1>";
    echo '<table><tbody>';
    if ($create) {
        $create_link = generate_link("index.php?action=admin&amp;object=artist");
        echo "<tr><td> <a href=\"$create_link\"> Utwórz Nowy </a> </td></tr>";
    }
    $artists = Artist::load($conn, '1', 'surname');
    echo '<tr>';
    for ($index = 0; $index < count($artists); $index++) {
        /* @var $artist Artist */
        $artist = $artists[$index];
        $name = $artist->get_name() . " " . $artist->get_surname();
        $link = generate_link("index.php?action=admin&amp;object=artist&amp;id=" . $artist->get_id());
        echo "<td>";
        echo "<a href=\"$link\">$name</a>";
        if ($delete) {
            $delete_link = generate_link("index.php?action=delete&amp;object=artist&amp;id=" . $artist->get_id());
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
        case 'artist':
            $artist = Artist::load_one($conn, "id=$id");
            unlink("images/" . $artist->get_photo());
            $paintings_list = Painting::load($conn, "artist_id=$id");
            foreach ($paintings_list as $painting) {
                delete_painting($painting, $conn);
            }
            Artist::delete($conn, "id=$id");
            generate_message('Wpis został usunięty', $_SERVER['HTTP_REFERER'], 0);
            break;
        case 'painting':
            $painting = Painting::load_one($conn, "id=$id");
            delete_painting($painting, $conn);
            generate_message('Wpis został usunięty', $_SERVER['HTTP_REFERER'], 0);
            break;
    }
}

function delete_painting($painting, $conn) {
    unlink("images/" . $painting->get_photo());
    unlink("files/" . $painting->get_pdf_file());
    Painting::delete($conn, "id=" . $painting->get_id());
}

function report($object, $conn) {
    generate_admin_subnavigation(false);
    $id = get_int_parameter('id');
    switch ($object) {
        case 'visitor':
            $rows = load_db_rows('user_painting up join Painting p on up.painting_id=p.id join Artist a on p.artist_id=a.id join Statistics s on up.user_id=s.id', 'concat_ws(\' \',a.name , a.surname) as name, p.name as title, up.count as sum, s.name as head', $conn, "up.user_id=$id", 'sum desc');
            echo '<h1>' . $rows[0]['head'] . '</h1>';
            echo '<table><tbody>';
            echo '<thead><th> Artysta </th><th> Tytuł obrazu </th><th>Zainteresowanie</th></thead>';
            break;
        case 'painting':
            $rows = load_db_rows('user_painting up join Statistics s on up.user_id=s.id join Painting p on up.painting_id=p.id join Artist a on p.artist_id=a.id', 's.name as name, s.email as title, up.count as sum, concat_ws(\' \',a.name , a.surname, p.name) as head', $conn, "up.painting_id=$id", 'sum desc');
            echo '<h1>' . $rows[0]['head'] . '</h1>';
            echo '<table><tbody>';
            echo '<thead><th> Nazwisko </th><th> email </th><th> Zainteresowanie</th></thead>';
            break;
        default:
            return;
    }
    foreach ($rows as $row) {
        echo '<tr><td> ' . $row['name'] . '</td><td>' . $row['title'] . '</td><td>' . $row['sum'] . '</td></tr>';
    }
    echo '</tbody></table>';
}

?>
