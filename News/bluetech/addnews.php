<?php
if (isset($_POST['submit'])) {
    

    $sql = "insert into news (`";
    foreach ($_FILES as $a => $b) {
        if ($a != 'submit' ) {
        if (is_array($b['name'])) {
            $pa[] = $a;
            $b['name'] = array_unique(array_values(array_filter($b['name'])));
            $b['tmp_name'] = array_unique(array_values(array_filter($b['tmp_name'])));
            for ($i = 0; $i < count($b['name']); $i++) {
                $b['name'][$i] = time() . '-' . $b['name'][$i];
                move_uploaded_file($b['tmp_name'][$i], 'files/' . $b['name'][$i]);
            }
            $pb[] = implode(',', $b['name']);
        } elseif (is_array($b)) {
            $pa[] = $a;
            $b['name'] = time() . '-' . $b['name'];
            move_uploaded_file($b['tmp_name'], 'files/' . $b['name']);
            $pb[] = $b['name'];
        }
    }
    }
    foreach ($_POST as $a => $b) {
        if ($a != 'submit') {
            if (is_array($b)) {
                $pa[] = $a;
                unset($pb1);
                for ($i = 0; $i < count($b); $i++) {
                    $b[$i] = mysql_escape_string($b[$i]);
                    if (strpos($a, "time") || $a == 'time' || strpos($a, "datetime") || $a == 'datetime' || strpos($a, "date") || $a == 'date')
                        $pb1[] = dmy2mysql($b[$i]);
                    else
                        $pb1[] = $b[$i];
                }
                $pb[] = implode(',', $pb1);
            }
            else {
                $pa[] = $a;
                if (strpos($a, "time") || $a == 'time' || strpos($a, "datetime") || $a == 'datetime' || strpos($a, "date") || $a == 'date')
                    $pb[] = dmy2mysql($b);
                else
                    $pb[] = mysql_escape_string($b);
            }
        }
    }
    
      $sql.=implode('`,`', $pa) . "`) values('" . implode("','", $pb) . "')";
    $q = mysql_query($sql) or die(mysql_error());
   
  
    if ($q)
        echo "<script>alert('New News Created'); window.location='index.php?p=viewnews';</script>";
}


?>

<div class="container-fluid main-content">
   
    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="fa fa-table"></i>Add News
                </div>
                
                <div class="widget-content padded">
                    
                    <form action="" class="form-horizontal" method="post"  enctype="multipart/form-data">
          
                         <div class="form-group">
            <label class="control-label col-md-2">Select Category</label>
            <div class="col-md-7">
                <select class="form-control" name="type">
                     <option >--Select--</option>
                      <option>Sports</option>
                      <option>Bussiness</option>
                      <option>Politics</option>
                  		<option>Entertainment</option>
                        <option>Technology</option>
              </select>
            </div>
          </div>  
             <div class="form-group">
            <label class="control-label col-md-2">Sub Type</label>
            <div class="col-md-7">
                <input class="form-control"  type="text" name="subtype"/>
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-md-2">Headlines</label>
            <div class="col-md-7">
                <input class="form-control"  type="text" name="headline"/>
            </div>
          </div>
           <div class="form-group">
            <label class="control-label col-md-2">Select Date</label>
            <div class="col-md-7">
                <input class="form-control datepicker" type="text" name="date"/>
            </div>
          </div>
          
          <!--                        <div class="form-group">

<?php //$currentdate=date("Y-m-d"); ?>
<input type="hidden" name="dateproduct" value="<?php //echo $currentdate; ?>"/>

                        </div>-->
                        
                        
          <div class="form-group">
            <label class="control-label col-md-2">Detail</label>
            <div class="col-md-7">
<!--                <textarea class="form-control ckeditor" ro  ws="3" name="briefdetail"></textarea>-->
                <textarea id="editor1" name="details" rows="10" cols="80"></textarea>
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
              <div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden" value="" name="">
                <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                    <img src="images/AAAAAA&text=no+image.gif">
                </div>
                <div class="fileupload-preview fileupload-exists img-thumbnail" style="width: 200px; max-height: 150px;"></div>
                <div>
                  <span class="btn btn-default btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image"></span><a class="btn btn-default fileupload-exists" data-dismiss="fileupload" href="#">Remove</a>
                </div>
              </div>
            </div>
          </div>
                       
                        
                <div class="form-group">
            <label class="control-label col-md-2">News Status</label>
            <div class="col-md-7">
              <label class="radio" for="option1">
                  <input id="option1" name="status" type="radio" value="Yes" checked="checked"><span>Active</span></label>
                <label class="radio"><input  name="status" type="radio" value="No"><span>Hidden</span></label>
                
            </div>
          </div>
                        
                        

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
