<div class="row">
    <div class="col-md-12">

    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-head">
                <header><h4>{!! $header !!}</h4></header>
                <div class="tools visible-xs">
                    <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                        <i class="md md-arrow-back"></i>
                        Back
                    </a>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save Draft">
                    <input type="submit" name="publish" class="btn btn-primary ink-reaction" value="Publish">
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">

                            <strong>Name*</strong>
                            {{ Form::text('name',old('name'),['class'=>'form-control','placeholder' => 'name', 'required']) }}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <strong>Title*</strong>
                            {{ Form::text('title',old('title'),['class'=>'form-control']) }}

                        </div>
                    </div>
                </div>
              <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                       <strong>Description*</strong>
                         <br>
                          {{ Form::textarea('description',old('description'),['required', 'id' => 'my-ckeditor']) }}

                      </div>
                  </div>
              </div>
<div class="row">
<div class="col-sm-12">
  <div class="form-group">
    <strong>Sub-Description</strong>
    <br>
    {{Form::text('sub_description',old('sub_description'),['class'=>'form-control','required'])}}
  </div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
  <div class="form-group">
<strong>Meta_Key</strong>
{{Form::text('meta_key',old('meta_key'),['class'=>'form-control','required'])}}
  </div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
  <div class="form-group">
<strong>Meta_Description</strong>
{{Form::text('meta_description',old('meta_description'),['class'=>'form-control','required'])}}
  </div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
  <div class="form-group">
<strong>Is_Active</strong>
{{Form::select('meta_description',['yes'=>'yes','no'=>'no'])}}
  </div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
  <div class="form-group">
<strong>Is_Deleted</strong>
{{Form::select('is_deleted',['yes'=>'yes','no'=>'no'])}}
  </div>
</div>
</div>


            </div>
            <br>
            <br>
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <button type="reset" class="btn btn-default ink-reaction">Reset</button>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save Draft">
                    <input type="submit" name="publish" class="btn btn-primary ink-reaction" value="{{ isset($page) && $page->is_published ? 'Save' : 'Publish' }}">
                </div>
            </div>
        </div>
    </div>
  </div>


<!-- <input type="hidden" id="fileList" name="fileList" value="" />

<div class="form-group">
    <label for="textfield" class="control-label col-sm-2">Blog Image</label>
    <div class="col-sm-10">
        <div id="queueImage"></div>
        <input type="file" name="blog_image" id="blog_image" />
        <div class="imagethumbs-form">

    </div>
  </div>
</div>
<div class="form-actions">
    <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT">
    <button type="submit" class="btn btn-primary">Save changes</button>

</div> -->
