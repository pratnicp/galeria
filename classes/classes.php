<?php
class Artist{ 
 private $data;
function get_id(){
return $this->data['id']; 
 }

function get_id_descrition(){
return ''; 
 }
function set_id($value){
$this->data['id']=$value; 
 }

function get_surname(){
return $this->data['surname']; 
 }

function get_surname_descrition(){
return 'Nazwisko'; 
 }
function set_surname($value){
$this->data['surname']=$value; 
 }

function get_name(){
return $this->data['name']; 
 }

function get_name_descrition(){
return 'Imię'; 
 }
function set_name($value){
$this->data['name']=$value; 
 }

function get_born(){
return $this->data['born']; 
 }

function get_born_descrition(){
return 'Lata Życia'; 
 }
function set_born($value){
$this->data['born']=$value; 
 }

function get_bigraphy(){
return $this->data['bigraphy']; 
 }

function get_bigraphy_descrition(){
return 'Biografia'; 
 }
function set_bigraphy($value){
$this->data['bigraphy']=$value; 
 }

function get_photo(){
return $this->data['photo']; 
 }

function get_photo_descrition(){
return 'Zdjęcie'; 
 }
function set_photo($value){
$this->data['photo']=$value; 
 }

function get_active(){
return $this->data['active']; 
 }

function get_active_descrition(){
return 'Dostępny'; 
 }
function set_active($value){
$this->data['active']=$value; 
 }

function load($conn, $condition="1", $order="1"){
$fields = 'id ,surname ,name ,born ,bigraphy ,photo ,active ';

$rows = load_db_rows('Artist', $fields, $conn, $condition, $order);
$list = array ();
foreach ($rows as $single_row) {
$list[] = new Artist($single_row); 
 }
return $list; 
 }
function load_one($conn, $unique_condition){
$fields = 'id ,surname ,name ,born ,bigraphy ,photo ,active ';

$row = load_db_one('Artist', $fields,  $unique_condition, $conn);
return (!$row)?$row: new Artist($row); 
 }
function  __construct($data) {
$this->data = $data; 
 }
function create_form($action, $with_data){
echo "<form action=\"".$action."\" method=\"post\" enctype=\"multipart/form-data\">";
echo '<table><tbody>';
echo '<tr><td></td><td><input type="hidden" name="id" value="'.$this->get_value('id',$with_data,false).'"/></td></tr>';
echo '<tr><td>Nazwisko</td><td><input type="text" name="surname" value="'.$this->get_value('surname',$with_data,false).'"/></td></tr>';
echo '<tr><td>Imię</td><td><input type="text" name="name" value="'.$this->get_value('name',$with_data,false).'"/></td></tr>';
echo '<tr><td>Lata Życia</td><td><input type="text" name="born" value="'.$this->get_value('born',$with_data,false).'"/></td></tr>';
echo '<tr><td>Biografia</td><td>';
echo '<div class="bbcode_area"><script>Init(\'bigraphy\',90,40,\'';
echo javascript_escape($this->get_value('bigraphy',$with_data,false));
echo '\') </script></div></td></tr>';
echo '<tr><td>Zdjęcie</td><td><input type="file" name="photo" value="'.$this->get_value('photo',$with_data,false).'"/></td></tr>';
echo '<tr><td>Dostępny</td><td><input name="active" type="checkbox" '.$this->get_value('active',$with_data,true).'/></td></tr>';

echo '<tr><td/><td> <input type="submit"/></td></tr>';
echo '</tbody></table></form>'; 
 }
function get_value($attribute, $fill, $boolean){
if(!$fill){
return ""; 
 }
if($boolean){
if ($this->data["$attribute"]==1){
return "checked";
}else{
return ""; 
 } 
 }
return $this->data["$attribute"]; 
 }
function load_from_form(){
$form_data['id']=post_int_parameter('id');$form_data['surname']=post_string_parameter('surname', PARAM_WHATEVER);$form_data['name']=post_string_parameter('name', PARAM_WHATEVER);$form_data['born']=post_string_parameter('born', PARAM_WHATEVER);$form_data['bigraphy']=post_string_parameter_strip('bigraphy', PARAM_WHATEVER);$file_types = array('image/jpeg', 'image/pjpeg'); 
 $form_data['photo'] = check_file_restrictions('photo', $file_types, 3*1024*1024);$checked= post_string_parameter('active', 'on'); 
 $form_data['active']=($checked)?1:0;
return new Artist($form_data); 
 }
function to_string(){
return "Nazwisko: ". $this->data['surname'] ."\r\nImię: ". $this->data['name'] ."\r\nLata Życia: ". $this->data['born'] ."\r\nBiografia: ". $this->data['bigraphy'] ."\r\nZdjęcie: ". $this->data['photo'] ."\r\nDostępny: ". $this->data['active'] ."\r\n";
}
function update($conn, $condition){
$fields['surname']="'".$this->data['surname']."'";
$fields['name']="'".$this->data['name']."'";
$fields['born']="'".$this->data['born']."'";
$fields['bigraphy']="'".$this->data['bigraphy']."'";
$fields['photo']="'".$this->data['photo']."'";
$fields['active']=($this->data['active'])?1:0;

update_db('Artist', $fields, $condition, $conn);
 }
function insert($conn){
$fields['surname']="'".$this->data['surname']."'";
$fields['name']="'".$this->data['name']."'";
$fields['born']="'".$this->data['born']."'";
$fields['bigraphy']="'".$this->data['bigraphy']."'";
$fields['photo']="'".$this->data['photo']."'";
$fields['active']=($this->data['active'])?1:0;

insert_db('Artist', $fields, $conn);
 }
function delete($conn, $condition){
delete_db_rows(Artist, $condition, $conn);
 }
}
class Painting{ 
 private $data;
function get_id(){
return $this->data['id']; 
 }

function get_id_descrition(){
return ''; 
 }
function set_id($value){
$this->data['id']=$value; 
 }

function get_artist_id(){
return $this->data['artist_id']; 
 }

function get_artist_id_descrition(){
return ''; 
 }
function set_artist_id($value){
$this->data['artist_id']=$value; 
 }

function get_photo(){
return $this->data['photo']; 
 }

function get_photo_descrition(){
return 'Zdjęcie'; 
 }
function set_photo($value){
$this->data['photo']=$value; 
 }

function get_name(){
return $this->data['name']; 
 }

function get_name_descrition(){
return 'Tytuł'; 
 }
function set_name($value){
$this->data['name']=$value; 
 }

function get_info(){
return $this->data['info']; 
 }

function get_info_descrition(){
return 'Informacja'; 
 }
function set_info($value){
$this->data['info']=$value; 
 }

function get_auction_date(){
return $this->data['auction_date']; 
 }

function get_auction_date_descrition(){
return 'Data aukcji'; 
 }
function set_auction_date($value){
$this->data['auction_date']=$value; 
 }

function get_estimated_price(){
return $this->data['estimated_price']; 
 }

function get_estimated_price_descrition(){
return 'Estymowana cena'; 
 }
function set_estimated_price($value){
$this->data['estimated_price']=$value; 
 }

function get_status(){
return $this->data['status']; 
 }

function get_status_descrition(){
return 'Czy sprzedany?'; 
 }
function set_status($value){
$this->data['status']=$value; 
 }

function get_price(){
return $this->data['price']; 
 }

function get_price_descrition(){
return 'Cena'; 
 }
function set_price($value){
$this->data['price']=$value; 
 }

function get_gallery(){
return $this->data['gallery']; 
 }

function get_gallery_descrition(){
return 'W galerii?'; 
 }
function set_gallery($value){
$this->data['gallery']=$value; 
 }

function get_pdf_file(){
return $this->data['pdf_file']; 
 }

function get_pdf_file_descrition(){
return 'Plik PDF'; 
 }
function set_pdf_file($value){
$this->data['pdf_file']=$value; 
 }

function load($conn, $condition="1", $order="1"){
$fields = 'id ,artist_id ,photo ,name ,info ,auction_date ,estimated_price ,status ,price ,gallery ,pdf_file ';

$rows = load_db_rows('Painting', $fields, $conn, $condition, $order);
$list = array ();
foreach ($rows as $single_row) {
$list[] = new Painting($single_row); 
 }
return $list; 
 }
function load_one($conn, $unique_condition){
$fields = 'id ,artist_id ,photo ,name ,info ,auction_date ,estimated_price ,status ,price ,gallery ,pdf_file ';

$row = load_db_one('Painting', $fields,  $unique_condition, $conn);
return (!$row)?$row: new Painting($row); 
 }
function  __construct($data) {
$this->data = $data; 
 }
function create_form($action, $with_data){
echo "<form action=\"".$action."\" method=\"post\" enctype=\"multipart/form-data\">";
echo '<table><tbody>';
echo '<tr><td></td><td><input type="hidden" name="id" value="'.$this->get_value('id',$with_data,false).'"/></td></tr>';
echo '<tr><td></td><td><input type="hidden" name="artist_id" value="'.$this->get_value('artist_id',$with_data,false).'"/></td></tr>';
echo '<tr><td>Zdjęcie</td><td><input type="file" name="photo" value="'.$this->get_value('photo',$with_data,false).'"/></td></tr>';
echo '<tr><td>Tytuł</td><td><input type="text" name="name" value="'.$this->get_value('name',$with_data,false).'"/></td></tr>';
echo '<tr><td>Informacja</td><td>';
echo '<div class="bbcode_area"><script>Init(\'info\',90,40,\'';
echo javascript_escape($this->get_value('info',$with_data,false));
echo '\') </script></div></td></tr>';
echo '<tr><td>Data aukcji</td><td><input type="text" name="auction_date" value="'.$this->get_value('auction_date',$with_data,false).'"/></td></tr>';
echo '<tr><td>Estymowana cena</td><td><input type="text" name="estimated_price" value="'.$this->get_value('estimated_price',$with_data,false).'"/></td></tr>';
echo '<tr><td>Czy sprzedany?</td><td><input name="status" type="checkbox" '.$this->get_value('status',$with_data,true).'/></td></tr>';
echo '<tr><td>Cena</td><td><input type="text" name="price" value="'.$this->get_value('price',$with_data,false).'"/></td></tr>';
echo '<tr><td>W galerii?</td><td><input name="gallery" type="checkbox" '.$this->get_value('gallery',$with_data,true).'/></td></tr>';
echo '<tr><td>Plik PDF</td><td><input type="file" name="pdf_file" value="'.$this->get_value('pdf_file',$with_data,false).'"/></td></tr>';

echo '<tr><td/><td> <input type="submit"/></td></tr>';
echo '</tbody></table></form>'; 
 }
function get_value($attribute, $fill, $boolean){
if(!$fill){
return ""; 
 }
if($boolean){
if ($this->data["$attribute"]==1){
return "checked";
}else{
return ""; 
 } 
 }
return $this->data["$attribute"]; 
 }
function load_from_form(){
$form_data['id']=post_int_parameter('id');$form_data['artist_id']=post_int_parameter('artist_id');$file_types = array('image/jpeg', 'image/pjpeg', 'application/pdf', 'image/pdf'); 
 $form_data['photo'] = check_file_restrictions('photo', $file_types, 3*1024*1024);$form_data['name']=post_string_parameter('name', PARAM_WHATEVER);$form_data['info']=post_string_parameter_strip('info', PARAM_WHATEVER);$form_data['auction_date']=post_string_parameter('auction_date', PARAM_DATETIME);$form_data['estimated_price']=post_string_parameter('estimated_price', PARAM_WHATEVER);$checked= post_string_parameter('status', 'on'); 
 $form_data['status']=($checked)?1:0;$form_data['price']=post_string_parameter('price', PARAM_WHATEVER);$checked= post_string_parameter('gallery', 'on'); 
 $form_data['gallery']=($checked)?1:0;$file_types = array('image/jpeg', 'image/pjpeg', 'application/pdf', 'image/pdf'); 
 $form_data['pdf_file'] = check_file_restrictions('pdf_file', $file_types, 3*1024*1024);
return new Painting($form_data); 
 }
function to_string(){
return "Zdjęcie: ". $this->data['photo'] ."\r\nTytuł: ". $this->data['name'] ."\r\nInformacja: ". $this->data['info'] ."\r\nData aukcji: ". $this->data['auction_date'] ."\r\nEstymowana cena: ". $this->data['estimated_price'] ."\r\nCzy sprzedany?: ". $this->data['status'] ."\r\nCena: ". $this->data['price'] ."\r\nW galerii?: ". $this->data['gallery'] ."\r\nPlik PDF: ". $this->data['pdf_file'] ."\r\n";
}
function update($conn, $condition){
$fields['artist_id']=$this->data['artist_id'];
$fields['photo']="'".$this->data['photo']."'";
$fields['name']="'".$this->data['name']."'";
$fields['info']="'".$this->data['info']."'";
$fields['auction_date']="'".$this->data['auction_date']."'";
$fields['estimated_price']="'".$this->data['estimated_price']."'";
$fields['status']=($this->data['status'])?1:0;
$fields['price']="'".$this->data['price']."'";
$fields['gallery']=($this->data['gallery'])?1:0;
$fields['pdf_file']="'".$this->data['pdf_file']."'";

update_db('Painting', $fields, $condition, $conn);
 }
function insert($conn){
$fields['artist_id']=$this->data['artist_id'];
$fields['photo']="'".$this->data['photo']."'";
$fields['name']="'".$this->data['name']."'";
$fields['info']="'".$this->data['info']."'";
$fields['auction_date']="'".$this->data['auction_date']."'";
$fields['estimated_price']="'".$this->data['estimated_price']."'";
$fields['status']=($this->data['status'])?1:0;
$fields['price']="'".$this->data['price']."'";
$fields['gallery']=($this->data['gallery'])?1:0;
$fields['pdf_file']="'".$this->data['pdf_file']."'";

insert_db('Painting', $fields, $conn);
 }
function delete($conn, $condition){
delete_db_rows(Painting, $condition, $conn);
 }
}
class Statistics{ 
 private $data;
function get_id(){
return $this->data['id']; 
 }

function get_id_descrition(){
return ''; 
 }
function set_id($value){
$this->data['id']=$value; 
 }

function get_name(){
return $this->data['name']; 
 }

function get_name_descrition(){
return 'Imię i nazwisko'; 
 }
function set_name($value){
$this->data['name']=$value; 
 }

function get_address(){
return $this->data['address']; 
 }

function get_address_descrition(){
return 'Adres korespondencyjny'; 
 }
function set_address($value){
$this->data['address']=$value; 
 }

function get_mobile(){
return $this->data['mobile']; 
 }

function get_mobile_descrition(){
return 'Telefon komórkowy'; 
 }
function set_mobile($value){
$this->data['mobile']=$value; 
 }

function get_fax(){
return $this->data['fax']; 
 }

function get_fax_descrition(){
return 'Fax'; 
 }
function set_fax($value){
$this->data['fax']=$value; 
 }

function get_email(){
return $this->data['email']; 
 }

function get_email_descrition(){
return 'e-mail'; 
 }
function set_email($value){
$this->data['email']=$value; 
 }

function get_price(){
return $this->data['price']; 
 }

function get_price_descrition(){
return 'Proponowana cena'; 
 }
function set_price($value){
$this->data['price']=$value; 
 }

function get_notice(){
return $this->data['notice']; 
 }

function get_notice_descrition(){
return 'Zapytanie'; 
 }
function set_notice($value){
$this->data['notice']=$value; 
 }

function get_painting_id(){
return $this->data['painting_id']; 
 }

function get_painting_id_descrition(){
return ''; 
 }
function set_painting_id($value){
$this->data['painting_id']=$value; 
 }

function load($conn, $condition="1", $order="1"){
$fields = 'id ,name ,address ,mobile ,fax ,email ,price ,notice ,painting_id ';

$rows = load_db_rows('Statistics', $fields, $conn, $condition, $order);
$list = array ();
foreach ($rows as $single_row) {
$list[] = new Statistics($single_row); 
 }
return $list; 
 }
function load_one($conn, $unique_condition){
$fields = 'id ,name ,address ,mobile ,fax ,email ,price ,notice ,painting_id ';

$row = load_db_one('Statistics', $fields,  $unique_condition, $conn);
return (!$row)?$row: new Statistics($row); 
 }
function  __construct($data) {
$this->data = $data; 
 }
function create_form($action, $with_data){
echo "<form action=\"".$action."\" name=\"contact_form\" onsubmit=\"return validate_form ();\" method=\"post\" enctype=\"multipart/form-data\">";
echo '<table><tbody>';
echo '<tr><td></td><td><input type="hidden" name="id" value="'.$this->get_value('id',$with_data,false).'"/></td></tr>';
echo '<tr><td class="form-label">Imię i nazwisko</td><td><input type="text" name="name" value="'.$this->get_value('name',$with_data,false).'"/></td></tr>';
echo '<tr><td class="form-label">Adres korespondencyjny</td><td><input type="text" name="address" value="'.$this->get_value('address',$with_data,false).'"/></td></tr>';
echo '<tr><td class="form-label">Telefon komórkowy</td><td><input type="text" name="mobile" value="'.$this->get_value('mobile',$with_data,false).'"/></td></tr>';
echo '<tr><td class="form-label">Fax</td><td><input type="text" name="fax" value="'.$this->get_value('fax',$with_data,false).'"/></td></tr>';
echo '<tr><td class="form-label required">e-mail (wymagany) </td><td><input type="text" name="email" value="'.$this->get_value('email',$with_data,false).'"/></td></tr>';
echo '<tr><td class="form-label">Proponowana cena</td><td><input type="text" name="price" value="'.$this->get_value('price',$with_data,false).'"/></td></tr>';
echo '<tr><td class="form-label">Zapytanie</td><td><textarea rows="10" name="notice" cols="23">'.$this->get_value('notice',$with_data,false).'</textarea></td></tr>';
echo '<tr><td></td><td><input type="hidden" name="painting_id" value="'.$this->get_value('painting_id',$with_data,false).'"/></td></tr>';

echo '<tr><td/><td> <input type="submit"/></td></tr>';
echo '</tbody></table></form>';
 }
function get_value($attribute, $fill, $boolean){
if(!$fill){
return ""; 
 }
if($boolean){
if ($this->data["$attribute"]==1){
return "checked";
}else{
return ""; 
 } 
 }
return $this->data["$attribute"]; 
 }
function load_from_form(){
$form_data['id']=post_int_parameter('id');$form_data['name']=post_string_parameter('name', PARAM_WHATEVER);$form_data['address']=post_string_parameter('address', PARAM_WHATEVER);$form_data['mobile']=post_string_parameter('mobile', PARAM_WHATEVER);$form_data['fax']=post_string_parameter('fax', PARAM_WHATEVER);$form_data['email']=post_string_parameter('email', PARAM_WHATEVER);$form_data['price']=post_string_parameter('price', PARAM_WHATEVER);$form_data['notice']=post_string_parameter_strip('notice', PARAM_WHATEVER);$form_data['painting_id']=post_int_parameter('painting_id');
return new Statistics($form_data); 
 }
function to_string(){
return "Imię i nazwisko: ". $this->data['name'] ."\r\nAdres korespondencyjny: ". $this->data['address'] ."\r\nTelefon komórkowy: ". $this->data['mobile'] ."\r\nFax: ". $this->data['fax'] ."\r\ne-mail: ". $this->data['email'] ."\r\nProponowana cena: ". $this->data['price'] ."\r\nZapytanie: ". $this->data['notice'] ."\r\n";
}
function update($conn, $condition){
$fields['name']="'".$this->data['name']."'";
$fields['address']="'".$this->data['address']."'";
$fields['mobile']="'".$this->data['mobile']."'";
$fields['fax']="'".$this->data['fax']."'";
$fields['email']="'".$this->data['email']."'";
$fields['price']="'".$this->data['price']."'";
$fields['notice']="'".$this->data['notice']."'";
$fields['painting_id']=$this->data['painting_id'];

update_db('Statistics', $fields, $condition, $conn);
 }
function insert($conn){
$fields['name']="'".$this->data['name']."'";
$fields['address']="'".$this->data['address']."'";
$fields['mobile']="'".$this->data['mobile']."'";
$fields['fax']="'".$this->data['fax']."'";
$fields['email']="'".$this->data['email']."'";
$fields['price']="'".$this->data['price']."'";
$fields['notice']="'".$this->data['notice']."'";
$fields['painting_id']=$this->data['painting_id'];

insert_db('Statistics', $fields, $conn);
 }
function delete($conn, $condition){
delete_db_rows(Statistics, $condition, $conn);
 }
}
class Menu{ 
 private $data;
function get_id(){
return $this->data['id']; 
 }

function get_id_descrition(){
return ''; 
 }
function set_id($value){
$this->data['id']=$value; 
 }

function get_level(){
return $this->data['level']; 
 }

function get_level_descrition(){
return ''; 
 }
function set_level($value){
$this->data['level']=$value; 
 }

function get_description(){
return $this->data['description']; 
 }

function get_description_descrition(){
return ''; 
 }
function set_description($value){
$this->data['description']=$value; 
 }

function get_action(){
return $this->data['action']; 
 }

function get_action_descrition(){
return ''; 
 }
function set_action($value){
$this->data['action']=$value; 
 }

function load($conn, $condition="1", $order="1"){
$fields = 'id ,level ,description ,action ';

$rows = load_db_rows('Menu', $fields, $conn, $condition, $order);
$list = array ();
foreach ($rows as $single_row) {
$list[] = new Menu($single_row); 
 }
return $list; 
 }
function load_one($conn, $unique_condition){
$fields = 'id ,level ,description ,action ';

$row = load_db_one('Menu', $fields,  $unique_condition, $conn);
return (!$row)?$row: new Menu($row); 
 }
function  __construct($data) {
$this->data = $data; 
 }
function create_form($action, $with_data){
echo "<form action=\"".$action."\" method=\"post\" enctype=\"multipart/form-data\">";
echo '<table><tbody>';
echo '<tr><td></td><td><input type="hidden" name="id" value="'.$this->get_value('id',$with_data,false).'"/></td></tr>';
echo '<tr><td></td><td><input type="hidden" name="level" value="'.$this->get_value('level',$with_data,false).'"/></td></tr>';
echo '<tr><td></td><td><input type="hidden" name="description" value="'.$this->get_value('description',$with_data,false).'"/></td></tr>';
echo '<tr><td></td><td><input type="hidden" name="action" value="'.$this->get_value('action',$with_data,false).'"/></td></tr>';

echo '<tr><td/><td> <input type="submit"/></td></tr>';
echo '</tbody></table></form>'; 
 }
function get_value($attribute, $fill, $boolean){
if(!$fill){
return ""; 
 }
if($boolean){
if ($this->data["$attribute"]==1){
return "checked";
}else{
return ""; 
 } 
 }
return $this->data["$attribute"]; 
 }
function load_from_form(){
$form_data['id']=post_int_parameter('id');$form_data['level']=post_int_parameter('level');$form_data['description']=post_string_parameter('description', PARAM_WHATEVER);$form_data['action']=post_string_parameter('action', PARAM_WHATEVER);
return new Menu($form_data); 
 }
function to_string(){
return "";
}
function update($conn, $condition){
$fields['level']=$this->data['level'];
$fields['description']="'".$this->data['description']."'";
$fields['action']="'".$this->data['action']."'";

update_db('Menu', $fields, $condition, $conn);
 }
function insert($conn){
$fields['level']=$this->data['level'];
$fields['description']="'".$this->data['description']."'";
$fields['action']="'".$this->data['action']."'";

insert_db('Menu', $fields, $conn);
 }
function delete($conn, $condition){
delete_db_rows(Menu, $condition, $conn);
 }
}
class Article{ 
 private $data;
function get_id(){
return $this->data['id']; 
 }

function get_id_descrition(){
return ''; 
 }
function set_id($value){
$this->data['id']=$value; 
 }

function get_name(){
return $this->data['name']; 
 }

function get_name_descrition(){
return 'Tytuł'; 
 }
function set_name($value){
$this->data['name']=$value; 
 }

function get_content(){
return $this->data['content']; 
 }

function get_content_descrition(){
return 'Treść'; 
 }
function set_content($value){
$this->data['content']=$value; 
 }

function load($conn, $condition="1", $order="1"){
$fields = 'id ,name ,content ';

$rows = load_db_rows('Article', $fields, $conn, $condition, $order);
$list = array ();
foreach ($rows as $single_row) {
$list[] = new Article($single_row); 
 }
return $list; 
 }
function load_one($conn, $unique_condition){
$fields = 'id ,name ,content ';

$row = load_db_one('Article', $fields,  $unique_condition, $conn);
return (!$row)?$row: new Article($row); 
 }
function  __construct($data) {
$this->data = $data; 
 }
function create_form($action, $with_data){
echo "<form action=\"".$action."\" method=\"post\" enctype=\"multipart/form-data\">";
echo '<table><tbody>';
echo '<tr><td></td><td><input type="hidden" name="id" value="'.$this->get_value('id',$with_data,false).'"/></td></tr>';
echo '<tr><td>Tytuł</td><td><input type="text" name="name" value="'.$this->get_value('name',$with_data,false).'"/></td></tr>';
echo '<tr><td>Treść</td><td>';
echo '<div class="bbcode_area"><script>Init(\'content\',90,40,\'';
echo javascript_escape($this->get_value('content',$with_data,false));
echo '\') </script></div></td></tr>';
echo '<tr><td/><td> <input type="submit"/></td></tr>';
echo '</tbody></table></form>'; 
 }
function get_value($attribute, $fill, $boolean){
if(!$fill){
return ""; 
 }
if($boolean){
if ($this->data["$attribute"]==1){
return "checked";
}else{
return ""; 
 } 
 }
return $this->data["$attribute"]; 
 }
function load_from_form(){
$form_data['id']=post_int_parameter('id');$form_data['name']=post_string_parameter('name', PARAM_WHATEVER);$form_data['content']=post_string_parameter_strip('content', PARAM_WHATEVER);
return new Article($form_data); 
 }
function to_string(){
return "Tytuł: ". $this->data['name'] ."\r\nTreść: ". $this->data['content'] ."\r\n";
}
function update($conn, $condition){
$fields['name']="'".$this->data['name']."'";
$fields['content']="'".$this->data['content']."'";

update_db('Article', $fields, $condition, $conn);
 }
function insert($conn){
$fields['name']="'".$this->data['name']."'";
$fields['content']="'".$this->data['content']."'";

insert_db('Article', $fields, $conn);
 }
function delete($conn, $condition){
delete_db_rows(Article, $condition, $conn);
 }
}
?>
