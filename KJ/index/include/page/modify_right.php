<?php
/**
 * User: ZhuKaihao
 * Date: 16/4/12
 * Time: 下午3:59
 */
?>

<?php
$id = $_GET['id'];
$page_name = $_GET["pagename"];
$content = get_info_of_id_in_datatable($id, 'index_' . $page_name, 0);
?>

<div class="manage_right">
    <form name="update" method="post" enctype="multipart/form-data" action="../function/modify.php" style="margin:0 0 0 0;">
        <div class="manage_right_publish_class">
            <p>文件类别:</p>
            <select name="class">
                <?php
                switch($page_name){
                    case 'tongzhiwenjian':
                        echo <<<EOD
                <option value="tongzhiwenjian" selected="selected">通知文件</option>
                <option value="youxiugongcheng">优秀工程</option>
                <option value="mojiegou">膜结构</option>
                <option value="wanggejiegou">网格结构</option>
                <option value="suojiegou">索结构</option>
EOD;
                        break;
                    case 'youxiugongcheng':
                        echo <<<EOD
                <option value="tongzhiwenjian">通知文件</option>
                <option value="youxiugongcheng" selected="selected">优秀工程</option>
                <option value="mojiegou">膜结构</option>
                <option value="wanggejiegou">网格结构</option>
                <option value="suojiegou">索结构</option>
EOD;
                        break;
                    case 'mojiegou':
                        echo <<<EOD
                <option value="tongzhiwenjian">通知文件</option>
                <option value="youxiugongcheng">优秀工程</option>
                <option value="mojiegou" selected="selected">膜结构</option>
                <option value="wanggejiegou">网格结构</option>
                <option value="suojiegou">索结构</option>
EOD;
                        break;
                    case 'wanggejiegou':
                        echo <<<EOD
                <option value="tongzhiwenjian">通知文件</option>
                <option value="youxiugongcheng">优秀工程</option>
                <option value="mojiegou">膜结构</option>
                <option value="wanggejiegou" selected="selected">网格结构</option>
                <option value="suojiegou">索结构</option>
EOD;
                        break;
                    case 'suojiegou':
                        echo <<<EOD
                <option value="tongzhiwenjian">通知文件</option>
                <option value="youxiugongcheng">优秀工程</option>
                <option value="mojiegou">膜结构</option>
                <option value="wanggejiegou">网格结构</option>
                <option value="suojiegou" selected="selected">索结构</option>
EOD;
                        break;
                }
                ?>
            </select>
        </div>
        <div class="manage_right_publish">
            <div class="manage_right_publish_title">
                <p>标题:</p>
                <textarea name="title"><?php echo $content['title']; ?></textarea>
            </div>
            <div class="manage_right_publish_file_no">
                <p>编号:</p>
                <textarea name="file_no"><?php echo $content['file_no']; ?></textarea>
            </div>
            <div class="manage_right_publish_content">
                <p>正文:</p>
                <script type="text/plain" id="manage_right_publish_editor" class="manage_right_publish_editor"
                        name="content">
                    <?php if ($content['content'] != "") echo $content['content']; ?>

                </script>
                <script type="text/javascript">
                    //实例化编辑器
                    // window.UMEDITOR_HOME_URL = "";
                    var um = UM.getEditor('manage_right_publish_editor',
                        {
                            initialContent: '',
                            imageUrl: "../function/upimage.php", //处理图片上传的接口
                            imagePath: "", //路径前缀
                            imageFieldName: "image" //上传图片的表单的name
                        });

                </script>
            </div>
            <div class="manage_right_publish_end">
                <p>作者:</p>
                <textarea name="end"><?php echo $content['end']; ?></textarea>
            </div>
            <div class="manage_right_publish_date">
                <p>日期:</p>
                <textarea name="date"><?php echo $content['date']; ?></textarea>
            </div>
            <div class="manage_right_publish_file">
                <p>添加附件(按下Ctrl键选择多个文件):</p>
                <input type="file" name="file[]" multiple/>
            </div>
            <?php
            if (!$content['file_dir'] == '' && !$content['file_name'] == '') {
                $file_name = explode("|", $content["file_name"]);
                $file_dir = explode("|", $content["file_dir"]);
                $count = count($file_name);
                echo "<div class=\"manage_right_publish_filedelete\"><p style='padding: 0 0 0 0;'>";
                echo "<p>删除附件(选择以删除):</p>";
                for ($i = 0; $i < $count; $i++)
                    echo <<<EOD
                        <input type="checkbox" name="file_delete[]" value="$i"/>
        <a href="include/function/download.php?file_name={$file_name[$i]}&file_dir={$file_dir[$i]}">{$file_name[$i]}</a></br>
EOD;
                echo "</p></div>";
            }
            ?>
            <input type="submit"/>
            <input class="btn" type="button" value="取消" onclick="goBack()"/>

            <!--Send parameter to modify.php -->
            <input type="hidden" value="<?php echo $id; ?>" name="id"/>
            <input type="hidden" value="<?php echo $page_name; ?>" name="page_name"/>
            <input type="hidden" value="<?php echo $content['file_name']; ?>" name="file_name"/>
            <input type="hidden" value="<?php echo $content['file_dir']; ?>" name="file_dir"/>
        </div>
    </form>
</div>
