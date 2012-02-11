<?php

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

function get_technique_id(){
return $this->data['technique_id']; 
 }

function get_technique_id_descrition(){
return ''; 
 }
function set_technique_id($value){
$this->data['technique_id']=$value; 
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

function get_dimensions(){
return $this->data['dimensions']; 
 }

function get_dimensions_descrition(){
return 'Wymiary'; 
 }
function set_dimensions($value){
$this->data['dimensions']=$value; 
 }


function get_status(){
return $this->data['status']; 
 }

function get_status_descrition(){
return 'Czy widoczny?'; 
 }
function set_status($value){
$this->data['status']=$value; 
 }

function get_order_id(){
return $this->data['price']; 
 }

function get_order_id_descrition(){
return 'Kolejność'; 
 }
function set_order_id($value){
$this->data['order_id']=$value; 
 }

function load($conn, $condition="1", $order="1"){
$fields = 'id ,photo ,name ,dimensions ,status ,technique_id ,order_id';

$rows = load_db_rows('Painting', $fields, $conn, $condition, $order);
$list = array ();
foreach ($rows as $single_row) {
$list[] = new Painting($single_row); 
 }
return $list; 
 }
function load_one($conn, $unique_condition){
$fields = 'id ,photo ,name ,dimensions ,status ,technique_id ,order_id';

$row = load_db_one('Painting', $fields,  $unique_condition, $conn);
return (!$row)?$row: new Painting($row); 
 }
function  __construct($data) {
$this->data = $data; 
 }
function create_form($action, $with_data, $conn, $defaultVisible){

echo "<form action=\"".$action."\" method=\"post\" enctype=\"multipart/form-data\">";
echo '<table><tbody>';
if ($this->get_value('photo',$with_data,false) != null) {
            echo '<tr><td></td><td>';
			$image_link = generate_link("images/" . $this->get_value('photo',$with_data,false).'.jpeg');
            echo "<img src=\"$image_link\" alt=\"" . $this->get_value('name',$with_data,false) . "\" />";
			echo '</td></tr>';
        }
echo '<tr><td></td><td><input type="hidden" name="id" value="'.$this->get_value('id',$with_data,false).'"/></td></tr>';
echo '<tr><td>Zdjęcie</td><td><input type="file" name="photo" value="'.$this->get_value('photo',$with_data,false).'"/></td></tr>';
echo '<tr><td>Tytuł</td><td><input type="text" name="name" value="'.$this->get_value('name',$with_data,false).'"/></td></tr>';
echo '<tr><td>Wymiary</td><td><input type="text" name="dimensions" value="'.$this->get_value('dimensions',$with_data,false).'"/></td></tr>';
echo '<tr><td>Czy widoczny?</td><td><input name="status" type="checkbox" ';
if($defaultVisible ==true) 
	echo 'checked';
else
	echo $this->get_value('status',$with_data,true);
echo '/></td></tr>';
echo '<tr><td>Technika</td><td><select name="technique_id">';
$techniques = Technique::load($conn, '1', 'id');
for ($index = 0; $index < count($techniques); $index++) {
	echo '<option';
	$technique = $techniques[$index];
	$name = $technique->get_name();
	$id = $technique->get_id();
	if($id == $this->get_value('technique_id',$with_data,false))
		echo ' selected';
	echo " value='$id'>$name</option>";
}
echo '</select></td></tr>';
echo '<tr><td></td><td><input type="hidden" name="order_id" value="'.$this->get_value('order_id',$with_data,false).'"/></td></tr>';
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
$form_data['id']=post_int_parameter('id');$form_data['technique_id']=post_int_parameter('technique_id');$form_data['order_id']=post_int_parameter('order_id');$file_types = array('image/jpeg', 'image/pjpeg', 'application/pdf', 'image/pdf'); 
 $form_data['photo'] = check_file_restrictions('photo', $file_types, 3*1024*1024);$form_data['name']=post_string_parameter('name', PARAM_WHATEVER);$checked= post_string_parameter('status', 'on'); 
 $form_data['status']=($checked)?1:0;$form_data['dimensions']=post_string_parameter('dimensions', PARAM_WHATEVER);
return new Painting($form_data); 
 }
function to_string(){
return "Zdjęcie: ". $this->data['photo'] ."\r\nTytuł: ". $this->data['name'] ."\r\nWymiary: ". $this->data['dimensions'];
}
function update($conn, $condition){

$fields['photo']="'".$this->data['photo']."'";
$fields['name']="'".$this->data['name']."'";
$fields['dimensions']="'".$this->data['dimensions']."'";
$fields['status']=($this->data['status'])?1:0;
$fields['technique_id']=$this->data['technique_id'];
$fields['order_id']="'".$this->data['order_id']."'";

update_db('Painting', $fields, $condition, $conn);
 }
function insert($conn){
$fields['photo']="'".$this->data['photo']."'";
$fields['name']="'".$this->data['name']."'";
$fields['dimensions']="'".$this->data['dimensions']."'";
$fields['status']=($this->data['status'])?1:0;
$fields['technique_id']=$this->data['technique_id'];
$fields['order_id']="'".$this->data['order_id']."'";

insert_db('Painting', $fields, $conn);
 }
function delete($conn, $condition){
delete_db_rows(Painting, $condition, $conn);
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
echo '<tr><td>Nagłówek</td><td><input type="text" name="name" value="'.$this->get_value('name',$with_data,false).'"/></td></tr>';
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

class Technique{ 
 private $data;
function get_id(){
return $this->data['id']; 
 }

function set_id($value){
$this->data['id']=$value; 
 }

function get_name(){
return $this->data['name']; 
 }

function get_name_descrition(){
return ''; 
 }
 
function set_name($value){
$this->data['name']=$value; 
 }

 function get_status(){
return $this->data['status']; 
 }

function get_status_descrition(){
return ''; 
 }
 
function set_status($value){
$this->data['status']=$value; 
 }
 
function load($conn, $condition="1", $order="1"){
$fields = 'id, name, status';

$rows = load_db_rows('Technique', $fields, $conn, $condition, $order);
$list = array ();
foreach ($rows as $single_row) {
$list[] = new Technique($single_row); 
 }
return $list; 
 }
function load_one($conn, $unique_condition){
$fields = 'id ,name, status';
$row = load_db_one('Technique', $fields,  $unique_condition, $conn);
return (!$row)?$row: new Technique($row); 
 }
function  __construct($data) {
$this->data = $data; 
 }
function create_form($action, $with_data, $conn, $defaultVisible){
echo "<form action=\"".$action."\" method=\"post\" enctype=\"multipart/form-data\">";
echo '<table><tbody>';
echo '<tr><td></td><td><input type="hidden" name="id" value="'.$this->get_value('id',$with_data,false).'"/></td></tr>';
echo '<tr><td>Nazwa</td><td><input type="text" name="name" value="'.$this->get_value('name',$with_data,false).'"/></td></tr>';
echo '<tr><td>Czy widoczna?</td><td><input type="checkbox" name="status" ';
if($defaultVisible ==true) 
	echo 'checked';
else
	echo $this->get_value('status',$with_data,true);
echo '/></td></tr>';
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
$form_data['id']=post_int_parameter('id');$form_data['name']=post_string_parameter('name', PARAM_WHATEVER);$checked= post_string_parameter('status', 'on'); $form_data['status']=($checked)?1:0;
return new Technique($form_data); 
 }
function to_string(){
return "";
}
function update($conn, $condition){
$fields['name']="'".$this->data['name']."'";
$fields['status']=($this->data['status'])?1:0;

update_db('Technique', $fields, $condition, $conn);
 }
function insert($conn){
$fields['name']="'".$this->data['name']."'";
$fields['status']=($this->data['status'])?1:0;
insert_db('Technique', $fields, $conn);
 }
function delete($conn, $condition){
delete_db_rows(Technique, $condition, $conn);
 }
}
?>
