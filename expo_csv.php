<?php
if(isset($_POST["submit"]))
{
$host="localhost"; // Host name.
$db_user="root"; //mysql user
$db_password="root"; //mysql pass
$db='demo'; // Database name.
$conn=mysql_connect($host,$db_user,$db_password) or die (mysql_error());
mysql_select_db($db) or die (mysql_error());


echo $filename=$_FILES["file"]["name"];
$ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));

//we check,file must be have csv extention
if($ext=="csv")
{
  $file = fopen($filename, "r");
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
            $sql = "INSERT into tableName(name,email,address) values('$emapData[0]','$emapData[1]','$emapData[2]')";
            mysql_query($sql);
         }
         fclose($file);
         echo "CSV File has been successfully Imported.";
}
else {
    echo "Error: Please Upload only CSV File";
}


}
?>