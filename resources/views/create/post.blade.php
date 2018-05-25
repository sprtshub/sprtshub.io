@extends ('_inc/base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 col-12">
                <div class="card pad-20">
                    <form action="{{ site_url().'create/post' }}" method="post">
                        <div class="form-group">
                            <input required name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <textarea id="postMD" style="height:200px;" class="form-control" name="body" placeholder="Post body"></textarea>
                        </div>
                        <div class="shift-up-down">
                            <input type="file" id="logo" class="inputfile"/>
                            <label for="logo" class="upload-label">Choose a file</label><br>
                            <small class="progresss text-muted">*only images with max size of 5mb</small>
                            <div class="progressbar"></div>
                        </div>
                        <div class="form-group">
                            <input id="postTags" type="text" value="" name="tags" data-role="tagsinput" />
                            <small class="text-muted">Press comma(,) after every tag, maximum of 4 tags allowed.</small>
                        </div>
                        <button type="submit" class="btn btn-success">Submit for Approval</button>
                        {{ csrf_field() }}
                    </form>
                    <hr>
                    <p><b>Post Preview</b></p>
                        <div class="post-viewer" id="postPreview"></div>
                    <hr>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection