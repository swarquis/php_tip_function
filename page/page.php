//分页
//vertical select option page
function page($name,$date1,$date2){	
    $where = filter($name,$date1,$date2);
	$tmppage = getCurrentPage();
	//总记录数
	$link = getCon();
	$sql1 = "SELECT COUNT(*) as totalrows FROM ".TABLE." ".$where;
	$res = mysqli_query($link,$sql1);
	if($res && mysqli_num_rows($res)==1){
		while($row = mysqli_fetch_assoc($res)){
			$totalRows = $row['totalrows'];
		}
	}else{
		$totalRows = 0;
	}
	
	$totalPages = ceil($totalRows/(int)PAGESIZE);

	$currentPage = empty($tmppage)?1:(int)$tmppage;
	
	$str .= "<a href='index.php?page=1'>首页</a>";
	if($currentPage > 1){
		$str .= "<a href='index.php?page=".($currentPage-1)."'>上一页</a>";
	}else{
		$str .= "上一页";
	}
	
	$str .= '<select  id="changePage" >';
	for($p = 1; $p <= $totalPages; $p++){
		$selected = ($p===$currentPage)?"selected":"";
		$str .= '<option value="'.$p.'" '.$selected.'>第'.$p.'页';
	}
	$str .= '</select>';
	if($currentPage > $totalPages){
		$str .= "<a href='index.php?page=".($currentPage+1)."'>下一页</a>";
	}else{
		$str .= "下一页";
	}
	
	$str .= "<a href='index.php?page={$totalPages}'>尾页</a>";
	$str .= "<br/><span>当前第".$currentPage."页/共".$totalPages."页</span><br/>";
	echo $str;
}

//horizontal list page
function page1($name,$date1,$date2){	
    $where = filter($name,$date1,$date2);
	$tmppage = getCurrentPage();
	//总记录数
	$link = getCon();
	$sql1 = "SELECT COUNT(*) as totalrows FROM ".TABLE." ".$where;
	$res = mysqli_query($link,$sql1);
	if($res && mysqli_num_rows($res)==1){
		while($row = mysqli_fetch_assoc($res)){
			$totalRows = $row['totalrows'];
		}
	}else{
		$totalRows = 0;
	}
	
	$totalPages = ceil($totalRows/(int)PAGESIZE);
	
	$currentPage = empty($tmppage)?1:(int)$tmppage;
	/*if($currentPage>$totalPages || $currentPage<1 || !is_numeric($currentPage)){
		$currentPage = 1;
	}*/
	$offset = ($currentPage-1)*(int)PAGESIZE;
	
	$start = $currentPage-4;
	if($start < 1){
		$start = 1;

	}
	
	$end = $currentPage+5;
	if($currentPage < 5){
		$end = 10;
	}

	$str .= '';
	$str .= '<select id="changepage" name="page" >';
	for($i = 1; $i <= $totalPages; $i++){
		$str .= '<option value="'.$i.'">第'.$i.'页';
	}
	$str .= '</select>';

	if($end > $totalPages){
		$end = $totalPages;
		$start = $end-9;
	}
	echo "<a href='index.php?page=1'>首页</a>";
	for($p=$start;$p<=$end;$p++){

		if($p == $currentPage){
			echo $p;
		}else{

			echo "<a href='index.php?page={$p}' >{$p}</a>";
		}
		

	}
	echo "<a href='index.php?page={$totalPages}'>尾页</a>";
	echo "<br/><span>当前第".$currentPage."页/共".$totalPages."页</span><br/>";

}