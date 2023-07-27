<?php
if (isset($_POST['submit'])) {

    $sql = "update  page set ";
    foreach ($_FILES as $a => $b) {
//       debug($_FILES);
        if (is_array($b['name'])) {
            $dd = '`' . $a . '`=';
            $b['name'] = array_unique(array_values(array_filter($b['name'])));
            $b['tmp_name'] = array_unique(array_values(array_filter($b['tmp_name'])));
            for ($i = 0; $i < count($b['name']); $i++) {
                $b['name'][$i] = time() . '-' . $b['name'][$i];
                move_uploaded_file($b['tmp_name'][$i], 'files/' . $b['name'][$i]);
            }
            if ($_POST[$a][0]) {
                unset($pb1);
                for ($i = 0; $i < count($_POST[$a]); $i++) {
                    $pb1[] = mysql_escape_string($_POST[$a][$i]);
                }
                $dd.="'" . implode(',', $b['name']) . "," . implode(",", $pb1) . "'";
            }
            else
                $dd.="'" . implode(',', $b['name']) . "'";
            $escape[] = $a;
        } elseif (is_array($b)) {
            $dd = '`' . $a . '`=';
            $b['name'] = time() . '-' . $b['name'];
            move_uploaded_file($b['tmp_name'], 'files/' . $b['name']);
            $dd.="'" . $b['name'] . "'";
            $escape[] = $a;
        }
        $pa[] = $dd;
    }
    foreach ($_POST as $a => $b) {
        if ($a != 'submit' && !in_array($a, $escape)) {
            $dd = "`" . $a . "`=";
            if (is_array($b)) {
                unset($pb1);
                for ($i = 0; $i < count($b); $i++) {
                    $b[$i] = mysql_escape_string($b[$i]);
                    if (strpos($a, "time") || strpos($a, "date") || $a == "date" || $a == "time" || strpos($a, "datetime") || $a == 'datetime')
                        $pb1[] = dmy2mysql($b[$i]);
                    else
                        $pb1[] = $b[$i];
                }
                $dd.="'" . implode(",", $pb1) . "'";
            }
            else {
                if (strpos($a, "time") || strpos($a, "date") || $a == "date" || $a == "time" || strpos($a, "datetime") || $a == 'datetime')
                    $dd.= "'" . dmy2mysql($b) . "'";
                else
                    $dd.= "'" . mysql_escape_string($b) . "'";
            }
        }
        $pa[] = $dd;
    }
    $sql.=implode(',', $pa) . " where id=" . $_GET['id'];

    $q = mysql_query($sql) or die(mysql_error() . $sql);
    if ($q)
        echo "<script>alert('Page Updated'); window.location='index.php?p=viewpage';</script>";
}

$sql = "select * from page where id=" . $_GET['id'];
$q = mysql_query($sql);
$rdata = mysql_fetch_assoc($q);
//debug($rdata);
if ($_GET['del']) {   // when click on delete link this will be called and delete image from database
    $datadel = explode(',', $rdata[$_GET['del']]);
    $_GET['ids'] = $_GET['ids'] ? $_GET['ids'] : 0;
    @unlink($adminpath . $rdata['image']);
    unset($datadel[$_GET['ids']]);
    $sql = "update page set `" . $_GET['del'] . "`='" . implode(',', $datadel) . "' where id=" . $_GET['id'];
    $q = mysql_query($sql);
    echo "<script>alert('Image Updated'); window.location='index.php?p=editpage&id=" . $_GET['id'] . "';</script>";
}
if ($_GET['del']=='advertisements') {   // when click on delete link this will be called and delete image from database
    $datadel = explode(',', $rdata[$_GET['del']]);
    $_GET['ids'] = $_GET['ids'] ? $_GET['ids'] : 0;
    @unlink($adminpath . $rdata['advertisements']);
    unset($datadel[$_GET['ids']]);
    $sql = "update page set `" . $_GET['del'] . "`='" . implode(',', $datadel) . "' where id=" . $_GET['id'];
    $q = mysql_query($sql);
    echo "<script>alert('Image Updated'); window.location='index.php?p=editpage&id=" . $_GET['id'] . "';</script>";
}
?>

<div class="container-fluid main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="fa fa-table"></i>Add New  Page
                </div>

                <div class="widget-content padded">

                    <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-2">Name</label>
                            <div class="col-md-7">
                                <input class="form-control"  type="text" name="name" value="<?php echo $rdata['name']; ?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Page Link Place:</label>
                            <div class="col-md-7">
                                <select class="form-control" name="place">
                                    <option > <?php echo $rdata['place']; ?></option>
                                    <option value="">Select</option>
                                    <option >Home Page Content</option>
                                    <option>Home Page Thumb Image</option>
                                    <option >Footer Menu</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Url</label>
                            <div class="col-md-7">
                                <input class="form-control" placeholder="" type="text" name="url" value="<?php echo $rdata['url']; ?>"/>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-2">Sort</label>
                            <div class="col-md-7">
                                <input class="form-control" placeholder="" type="text" name="sort" value="<?php echo $rdata['sort']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Url Title</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" name="title" value="<?php echo $rdata['title']; ?>"/>
                            </div>
                        </div>    



                        <div class="form-group">
                            <label class="control-label col-md-2">Short Description</label>
                            <div class="col-md-7">
                                <textarea class="form-control" rows="3" name="shortde">
                                    <?php echo $rdata['shortde']; ?>
                                </textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">

                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-2">Detail</label>
                            <div class="col-md-7">
                <!--                <textarea class="form-control ckeditor" ro  ws="3" name="detail" >
                
                                <?php //echo $rdata['detail']; ?>
                                </textarea>-->
                                <textarea id="editor1" name="detail" rows="10" cols="80"> <?php echo $rdata['detail']; ?></textarea>
                                <script type="text/javascript">
                                    var editor = CKEDITOR.replace( 'editor1', {
                                        filebrowserBrowseUrl : 'new/ckfinder/ckfinder.html',
                                        filebrowserImageBrowseUrl : 'new/ckfinder/ckfinder.html?type=Images',
                                        filebrowserFlashBrowseUrl : 'new/ckfinder/ckfinder.html?type=Flash',
                                        filebrowserUploadUrl : 'new/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                        filebrowserImageUploadUrl : 'new/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl : 'new/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                                    });
                                    CKFinder.setupCKEditor( editor, '../' );
                                </script>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Image Upload</label>
                            <div class="col-md-4">
                                <?php
                                if ($rdata['image'] && file_exists($adminpath . $rdata['image'])) {
                                    ?>
                                    <img src="<?php echo $adminpath . $rdata['image']; ?>" style="width: 50%;"/>
                                    <a href="index.php?p=editpage&del=image&id=<?php echo $_GET['id']; ?>">
                                        Delete </a>

                                    <?php
                                } else {
                                    ?>
                                    <div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden" value="" name="">
                                        <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                                            <img src="images/AAAAAA&text=no+image.gif">
                                        </div>
                                        <div class="fileupload-preview fileupload-exists img-thumbnail" style="width: 200px; max-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image"></span><a class="btn btn-default fileupload-exists" data-dismiss="fileupload" href="#">Remove</a>
                                        </div>

                                    </div>
    <?php
}
?>

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-2">Advertisement</label>
                            <div class="col-md-4">

                                <?php
                                $sql = "select * from  page where id='" . $_GET['id'] . "'";
                                $q = mysql_query($sql) or die(mysql_error() . $sql);
                                while ($r = mysql_fetch_assoc($q)) {
                                    $images = explode(',', $r['advertisements']);
                                    for ($i = 0; $i < count($images); $i++) {
                                        if ($images[$i] && file_exists('files/' . $images[$i])) {
                                            ?>
                                            <div style="float: left;margin: 5px;">
                                                <img src="files/<?php echo $images[$i]; ?>" width="50px" height="50px;"/><br>
                                                 <a href="index.php?p=editpage&del=advertisements&ids=<?php echo $i; ?>&id=<?php echo $_GET['id'] ?>">Delete</a>
                                                <input type="hidden" value="<?php echo $images[$i]; ?>" name="advertisements[]" /><br>
                                            </div>
             <!--                                        <input type="file" name="moreimage[]"   alt="blank" multiple=""/>-->
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                <div style="clear: both;"></div>
                                <input type="file" name="advertisements[]"   alt="blank" multiple=""/>


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Valuable Clients</label>
                            <div class="col-md-4">

                                <?php
                                $sql = "select * from  page where id='" . $_GET['id'] . "'";
                                $q = mysql_query($sql) or die(mysql_error() . $sql);
                                while ($r = mysql_fetch_assoc($q)) {
                                    $images = explode(',', $r['valuable']);
                                    for ($i = 0; $i < count($images); $i++) {
                                        if ($images[$i] && file_exists('files/' . $images[$i])) {
                                            ?>
                                            <div style="float: left;margin: 5px;">
                                                <img src="files/<?php echo $images[$i]; ?>" width="50px" height="50px;"/><br>
                                                 <a href="index.php?p=editpage&del=valuable&ids=<?php echo $i; ?>&id=<?php echo $_GET['id'] ?>">Delete</a>
                                                <input type="hidden" value="<?php echo $images[$i]; ?>" name="valuable[]" /><br>
                                            </div>
             <!--                                        <input type="file" name="moreimage[]"   alt="blank" multiple=""/>-->
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                <div style="clear: both;"></div>
                                <input type="file" name="valuable[]"   alt="blank" multiple=""/>


                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-7" style="text-align: right;">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button><button class="btn btn-default-outline">Cancel            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
