<?php
//file chứa template đầu ra (this is the template for our output)
//Nhận dữ liệu trực tiếp từ View
/*
	*	@package joomla component
	*	component/com_dutoan/site/views/dutoan/tmpl/default.php
	*	@license	GNU/GPL
*/
//không cho phép truy cập trực tiếp
defined('_JEXEC') or die('Restricted Access');
$sql = "SELECT * FROM jos_dutoan";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
?><div style="padding-left:30px;">
<form method="post" action="">
<table>
    <tr>
        <td>Chiều dài tầng trệt:</td>
        <td><input name="daitret" type="text"  />&nbsp;(m)<span style="color:Red;">(*)</span>
        </td></tr>
	<tr>	<td>Chiều rộng tầng trệt:</td>
        <td><input name="rongtret" type="text"  />&nbsp;(m)<span style="color:Red;">(*)</span>
        </td></tr>
	<tr>	<td>Chiều dài tầng lầu:</td>
        <td><input name="dailau" type="text"  />&nbsp;(m)
        </td>
	<tr>	<td>Chiều rộng tầng lầu:</td>
        <td><input name="ronglau" type="text"  />&nbsp;(m)
        </td>
    </tr>
	    <tr>
        <td>Loại thi công:</td>
		
        <td>
			<script language=javascript>
				function formshowhide(id)
				{
					if(id == "phantho")
					{
						document.getElementById('hoanthien').style.display = "none";
					}
					else
					{
						document.getElementById('hoanthien').style.display = "block";
					}
				}
			</script>
			<label><input type="radio" name="ShowHide" value="<?php echo $row['phantho']?>" checked="checked" onClick="formshowhide('phantho')">Phần thô</label>
			<label><input type="radio" name="ShowHide" value="<?php echo $row['hoanthien']?>" onClick="formshowhide('hoanthien')">Hoàn thiện</label>
			<tr>
			<td colspan="2">
			<div id="hoanthien" style="display:none;">Loại vật liệu:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="vatlieu" >
				<option value="<?php echo $row['trungbinh']?>">Trung bình</option>
				<option value="<?php echo $row['tot']?>">Tốt</option>
				<option value="<?php echo $row['caocap']?>">Cao cấp</option>
			</select>
			</div>
			</td></tr>
        </td>

    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Xem kết quả"  /></td>
    </tr>
</table>
</form>
<?php 
    if(isset($_POST["submit"])){
	$dientich=$_POST['daitret']*$_POST['rongtret']+$_POST['dailau']*$_POST['ronglau'];
	$phantho=$row['phantho'];
	$loaithicong=$_POST['ShowHide'];
	$vatlieu=$_POST['vatlieu'];
	$dutoan=$row['giatien_m2']*$dientich+$phantho;
	if ($loaithicong<>$row['phantho']) $dutoan+=$vatlieu;
	?>
CHÀO QUÍ KHÁCH<br>
Diện tích: <span style="color:Red;"><?php echo $dientich?></span> (m<sup>2</sup>)<br>
Loại thi công: <?php if ($loaithicong==$row['phantho']) echo "Phần thô"; else echo "Hoàn thiện"; ?><br>
<?php if ($loaithicong<>$row['phantho']){ ?>
Loại dịch vụ: <?php if ($vatlieu==$row['trungbinh']) echo "Trung bình"; elseif ($vatlieu==$row['tot']) echo "Tốt"; else echo "Cao Cấp"; ?><br>
<?php } ?>
Giá tham khảo: <span style="color:Red;"><?php echo number_format($dutoan,0,',',',')?> VNĐ</span>
<br><br><br>
<i>
Đơn giá trên chỉ mang tính chất tham khảo.<br>
Đơn giá có thể thay đổi: <br>
    - Diện tích<br>
    - Vị trí<br>
    - Thời điểm</i><br></div>
<?php }
?>