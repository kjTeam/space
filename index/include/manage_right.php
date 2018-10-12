<!--
@author:Zhu Kaihao
@time:2016-4-1 18:15
-->
<div class="right">
    <form name="index_update" method="post" enctype="multipart/form-data" action="./updata.php" style="margin:0 0 0 0;">
        <div>
            <p>文件类别:</p>
            <select name="class">
                <option value="index_tongzhiwenjian">通知文件</option>
                <option value="index_youxiugongcheng">优秀工程</option>
                <option value="index_mojiegou">膜结构</option>
                <option value="index_wanggejiegou">网格结构</option>
                <option value="index_suojiegou">索结构</option>
            </select>
        </div>
        <div>
            <p>标题:</p>
            <textarea name="title"></textarea>
        </div>
        <div>
            <p>编号:</p>
            <textarea name="file_no"></textarea>
        </div>
        <div>
            <p>正文:</p>
            <?php include "manage_right_editor.html"; ?>
        </div>
        <div>
            <p>作者:</p>
            <textarea name="end"></textarea>
        </div>
        <div>
            <p>日期:</p>
            <textarea name="date"></textarea>
        </div>
        <div>
            <p>上传附件(按下Ctrl选择多个附件):</p>
            <input type="file" name="file[]" multiple/>
        </div>
        <div class="manage-submit">
            <input class="btn" type="submit" value="提交"/>
        </div>
    </form>
</div>