<?php
/**
 * User: ZhuKaihao
 * Date: 16/4/11
 * Time: 下午8:39
 */
?>

<div class="right">
    <div class="right_title">
        <p>
            <?php
            $page_name=$_GET["pagename"];
            switch ($page_name) {
                case "tongzhiwenjian":echo "通知文件";break;
                case "youxiugongcheng":echo "优秀工程";break;
                case "mojiegou":echo "膜结构";break;
                case "wanggejiegou":echo "网格结构";break;
                case "suojiegou":echo "索结构";break;
            }
            ?>
        </p>
    </div>
    <hr/>
    <br/>
    <div class="right_content">
        <?php
        $title = get_all_of_column_from_datatable_by_visibility('index_'.$page_name, 'title');
        $id = get_all_of_column_from_datatable_by_visibility('index_'.$page_name, 'id');
        $num = count($title);
        for ($i = 0; $i < $num; $i++) {
            echo <<<EOD
<p><a href="announcement_content.php?id=$id[$i]&&pagename=$page_name"class="tablelink">$title[$i]</a></p>
EOD;
        }
        ?>
    </div>
</div>
