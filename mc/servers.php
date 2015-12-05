<?php
include "includes/header.php";
$server_result = mysql_query("SELECT * FROM servers ORDER BY server_name ASC LIMIT 0, 100");
$server_count = mysql_num_rows($server_result);
if ($server_count == 0){
    echo 'No servers have been added yet.';
} else {
?>
<table>
<tr>
    <td>
        Server Name
    </td>
    <td>
        IP address
    </td>
</tr>
<?php
    while ($server_row = mysql_fetch_assoc($server_result)){
        ?>
        <tr>
            <td>
                <?php echo $server_row['server_name']; ?>
            </td>
            <td>
                <?php echo $server_row['server_ip']; ?>
            </td>
        </tr>
        <?php
    }
}
?>
</table>
<?php
include "includes/footer.php";
?>