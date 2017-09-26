<?php 
$data = customer_list ($conn) ?>
<table class="list_table">
	<tr class="list_heading">
		<td class="id_col">STT</td>
		<td>Tên khách hàng</td>
        <td>Số điện thoại </td>
        <td>Địa chỉ</td>
        <td>Email</td>
       
		
		
	</tr>
    <?php 
    $stt = 0;
    foreach ($data as  $value) {
        $stt = $stt + 1;
    ?>
	<tr class="list_data">
        <td class="aligncenter"><?php echo $stt; ?></td>
        <td class="list_td aligncenter"><?php echo $value ['name'] ?></td>
         <td class ="list_td_aligncenter"> <?php echo $value ['phone'] ?></td>
        <td class ="list_td_aligncenter"> <?php echo $value ['address'] ?></td>
        <td class ="list_td_aligncenter"> <?php echo $value ['email'] ?></td>
    

        
        
       
    </tr> <?php } ?>
</table>