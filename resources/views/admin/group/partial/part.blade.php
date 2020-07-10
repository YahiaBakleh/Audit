    <div class="row">
        <div class="form-group">
            <div class="col-md-4">
                <input type="text" name="choice{{$i}}" placeholder="Third  Choice" class="form-control">
            </div>

            <div class="col-md-2">
                <div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
                    <input type="checkbox"  name="choice{{$i}}_correct" class="chb">
                    <label for="choice{{$i}}_correct">is correct</label>
                </div>
            </div>

            <div class=".col-md-4 .ml-auto fileupload fileupload-new float-left" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input">
                        <i class="fa fa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-default btn-file">
                        <span class="fileupload-exists">Change</span>
                        <span class="fileupload-new">Select file</span>
                        <input id="inptFileChoice{{$i}}" type="file" name="file_{{$i}}">
                    </span>
                        <a href="#" id="choice{{$i}}ImageRemove" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                        <button id="Preview{{$i}}" type="button" class="btn btn-success" style="margin-left:5px;">Preview</button>
                </div>
            </div>
        </div>
    </div>

    <div id="ImageControle{{$i}}" style="margin-top:15px;">

        <div class="row">
            <div class="form-group">
                <div class="col-md-2">
                    <input id="WidthText{{$i}}" type="text" name="Width{{$i}}" placeholder="Width" class="form-control" value="200" onchange="updateValue('WidthRange{{$i}}',this.value);">
                </div>

                <div class="col-md-3">
                    <input id="WidthRange{{$i}}" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="widthRange{{$i}}" onchange="updateValue('WidthText{{$i}}',this.value);">
                    <label class="label label-default" for="" >Width</label>
                </div>

                <div class=".col-md-2 .ml-auto float-left" >
                    <div class="input-append">
                        <div class="col-md-2" style="margin-left:60px;">
                            <input id="HeightText{{$i}}" type="text" name="height{{$i}}" placeholder="Height" class="form-control" value="200"  onchange="updateValue('HeightRange{{$i}}',this.value);">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input id="HeightRange{{$i}}" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="heightRange{{$i}}" onchange="updateValue('HeightText{{$i}}',this.value);">
                        <label class="label label-default" for="" >Height</label>
                    </div>
                </div>

            </div>
        </div>




        <div id="previewImage{{$i}}" class="panel panel-default image-preview" >
            <img id="choice{{$i}}Image" src="" alt="Image Preview" width="" height="" style="width:100%; height:100%;padding:2px;display:none;">
            <span id="DefultImagText{{$i}}" calss="defult-imag-text">Image Preview</span>
        </div>
    </div>								
</br>