<div class="modal modal-fill fade" data-backdrop="false" id="newPost" tabindex="-1">
  <div class="modal-dialog modal-lg .modal-dialog-scrollable">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body mt-md-60 pt-md-60">
      <h1 class="box-title my-md-35 text-center">Blog Post</h1>
      <!-- form starts -->
      <form action="action/user.action.php" method="post" enctype="multipart/form-data">
        <div class="form-group my-md-35">
          <br><br><br><br>
          <label>Title</label>
          <input type="text" name="title" class="form-control" placeholder="Blog title">
        </div>

        <!-- blog coontent textarea-->
        <label>Blog content</label>
        </h4>
        <textarea class="textarea" name="content" placeholder="Enter the blog content " style="width: 100%; height: 2s00px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

        <div class="row mt-35">
          <div class="col-md-6">
            <label>Thumbnail</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
                <div class="controls">
                  <input type="file" name="thumbnail" class="form-control"> </div>
              </div>
          </div>
          <div class="col-md-1 text-muted"><span>or</span></div>
          <div class="col-md-5">
            <div class="input-group date">
              <div class="input-group-addon">
                <span>url</span>
              </div>
              <input type="url" name="url" class="form-control pull-right">
            </div>
          </div>
        </div>

        <div class="row mt-35">
          <div class="col-md-6">
            <div class="form-group">
            <label>Choose category (eg: fashion, etc)</label>
              <select class="form-control select2" name="category" style="width: 100%;">
                <option>General</option>
                <option>Fashion</option>
                <option>IT Software</option>
                <option>Food</option>
                <option>It Hardware</option>
                <option>Travel & Tours</option>
                <option>Buildings</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row mt-35">
          <div class="col-md-6">
            <label>Tags: </label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="input-group">
                <input type="text" value="" name="tags" data-role="tagsinput" placeholder="add tags" style="background: none !important; border: none;">
              </div>
          </div>
        </div>

        <div class="box-footer">
          <button type="button" class="btn btn-rounded btn-danger mr-1" data-dismiss="modal">
            <i class="fa fa-close"></i> Close
          </button>
          <button type="submit" name="blogPost" class="btn btn-rounded btn-success pull-right">
            Submit for review
          </button>
        </div>
      </form>
      <!-- form ends -->

    <br><br><br><br><br><br>
    </div>
    
  </div>
  </div>
</div>