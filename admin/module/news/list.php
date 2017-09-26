<?php
$data=news_list($conn);
 ?>
<table class="list_table">
            <tr class="list_heading">
                <td class="id_col">STT</td>
                <td>Tiêu Đề</td>
                <td>Tác Giả</td>
                <td>Thời Gian</td>
                <td class="action_col">Quản lý?</td>
            </tr>

            <?php 
            $stt=0;
            foreach($data as $val) {
            $stt=$stt+1; 
            ?>
            <tr class="list_data">
                <td class="aligncenter"><?php echo $stt ?></td>
                <td class="list_td aligncenter"><?php echo $val["title"] ?></td>
                <td class="list_td aligncenter"><?php echo $val["author"] ?></td>
                <td class="list_td aligncenter"><?php settime($val["time_news"]) ?></td>
                <td class="list_td aligncenter">
                    <a href="index.php?p=sua-tin-tuc&nid=<?php echo $val["id"] ?>"><img src="temp/images/edit.png" /></a>&nbsp;&nbsp;&nbsp;
                    <a onclick="return acceptDelete('Bạn có chắc muốn xóa tin này không?')" href="index.php?p=xoa-tin-tuc&nid=<?php echo $val["id"] ?>"><img src="temp/images/delete.png" /></a>
                </td>
            </tr>
            <?php } ?>
        </table>