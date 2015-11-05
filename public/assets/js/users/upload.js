$(document).ready(function () {
    $("#upload-tabs").tabs();

    filesCount1 = 0;
    filesCount2 = 0;
    STYLE_SETTING = 'style="width:{width};height:{height};"',
            OBJECT_PARAMS = '      <param name="controller" value="true" />\n' +
            '      <param name="allowFullScreen" value="true" />\n' +
            '      <param name="allowScriptAccess" value="always" />\n' +
            '      <param name="autoPlay" value="false" />\n' +
            '      <param name="autoStart" value="false" />\n' +
            '      <param name="quality" value="high" />\n',
            DEFAULT_PREVIEW = '<div class="file-preview-other">\n' +
            '   <span class="{previewFileIconClass}">{previewFileIcon}</span>\n' +
            '</div>';
    function addSingleFileInput(input) {
        input.fileinput({
            'showUpload': false,
            'showRemove': false,
            minFileCount: 0,
            maxFileCount: 20,
            uploadUrl: "#",
            previewTemplates: {
                generic: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}">\n' +
                        '   {content}\n' +
                        '   {footer}\n' +
                        '</div>\n',
                image: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}">\n' +
                        '<p class="pull-right "><span class="glyphicon glyphicon-remove delete-image"></span><p>' +
                        '   <img src="{data}" class="file-preview-image" title="{caption}" alt="{caption}" ' + STYLE_SETTING + '>\n' +
                        '   {footer}\n' +
                        '</div>\n',
            },
            layoutTemplates: {
                actions: '<div class="file-actions">\n' +
                        '    <div class="file-footer-buttons">\n' +
                        '       ' +
                        '    </div>\n' +
                        '    <div class="file-upload-indicator" tabindex="-1" title="{indicatorTitle}">{indicator}</div>\n' +
                        '    <div class="clearfix"></div>\n' +
                        '</div>',
                footer: '<div class="file-thumbnail-footer">\n' +
                        '    <div class="file-caption-name" style="width:50%">{caption}</div>\n' +
                        $("div.upload-image-form-template").html() +
                        '    {actions}\n' +
                        '</div>'
            }
        });
    }

    function addMultipleFileInput(input) {
        input.fileinput({
            showUpload: false,
            showRemove: false,
            uploadUrl: "#",
            minFileCount: 1,
            maxFileCount: 20,
            previewTemplates: {
                generic: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}">\n' +
                        '   {content}\n' +
                        '   {footer}\n' +
                        '</div>\n',
                image: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}">\n' +
                        '<p class="pull-right "><span class="glyphicon glyphicon-remove delete-image"></span><p>' +
                        '   <img src="{data}" class="file-preview-image" title="{caption}" alt="{caption}" ' + STYLE_SETTING + '>\n' +
                        '   {footer}\n' +
                        '</div>\n',
            },
            layoutTemplates: {
                actions: '<div class="file-actions">\n' +
                        '    <div class="file-footer-buttons">\n' +
                        '       ' +
                        '    </div>\n' +
                        '    <div class="file-upload-indicator" tabindex="-1" title="{indicatorTitle}">{indicator}</div>\n' +
                        '    <div class="clearfix"></div>\n' +
                        '</div>',
                footer: '<div class="file-thumbnail-footer">\n' +
                        '    <div class="file-caption-name" style="width:50%">{caption}</div>\n' +
                        '       <div>' +
                        '           <label class="control-label">Caption</label><textarea class="form-control img-desc" placeholder="Caption for image" name="caption[]"></textarea>' +
                        '       </div>' +
                        '    {actions}\n' +
                        '</div>'
            },
            fileActionSettings: {
                indicatorNew: ""
            },
        });
    }

    addSingleFileInput($("form input[type='file'].single"));

    addMultipleFileInput($("form input[type='file'].multiple"));

//    $(document).on('hover','.file-preview-frame', function(){
//       $(this).prepend('<p class="pull-right "><span class="glyphicon glyphicon-remove delete-image"></span><p>');
//    });
//    
    $('input.single').on('fileloaded', function (event, file, previewId, index, reader) {
//        setTimeout(updateListName1, 0);
        var div = $("div.input-group  div.file-caption-name");
        if (typeof div != "undefined") {
            div.removeClass('file-caption-name');
            div.addClass('show-file-names');
        }
        updateInputsArray1(file);//update input array, store value which decide if file is going to saved.
        setTimeout(updateListName1, 100);//update show name files input

    });
    
    $('input.multiple').on('fileloaded', function (event, file, previewId, index, reader) {
//        setTimeout(updateListName1, 0);
        var div = $("div.input-group  div.file-caption-name");
        if (typeof div != "undefined") {
            div.removeClass('file-caption-name');
            div.addClass('show-file-names');
        }
        updateInputsArray2(file);
        setTimeout(updateListName2, 100);

    });
    
    $('input.single').on('filebrowse', function(event) {//clear input when press browser again
        $(this).fileinput('clear');
        $("#files-array-single").html('');
        filesCount1 = 0;
        setTimeout(updateListName1, 100);
    });

    $('input.multiple').on('filebrowse', function(event) {
        $(this).fileinput('clear');
        $("#files-array-multiple").html('');
        filesCount2 = 0;
        setTimeout(updateListName2, 100);
    });
//    $(document).on('change', 'input.single', function(){
////        setTimeout(updateListName1, 0);
//        
//    });


    function updateInputsArray1(file) {
        $("#files-array-single").append("<input type='hidden' id='for-image-" + filesCount1 + "' class='file-count' value='1' title='" + file.name + "' name='file_status[]'>");
        filesCount1 += 1;
    }
    function updateInputsArray2(file) {
        $("#files-array-multiple").append("<input type='hidden' id='for-image-" + filesCount2 + "' class='file-count' value='1' title='" + file.name + "' name='file_status[]'>");
        filesCount2 += 1;
    }
    function updateListName1() {
        var count_images = count_image1();
        if (count_images == 0) {
            $("div.show-file-names").html('<span class="glyphicon glyphicon-file kv-caption-icon"></span>');
        }
        if (count_images == 1) {
            var name = $("#files-array-single").find('input.file-count[value=1]').attr('title');
            $("#upload-image-tabs div.show-file-names").html('<span class="glyphicon glyphicon-file kv-caption-icon"></span>' + name);
        } else if (count_images > 1) {
            $("#upload-image-tabs div.show-file-names").html('<span class="glyphicon glyphicon-file kv-caption-icon"></span>' + count_images + ' files selected');

        }
//            var filesCount1  = 0;
//            for(filesCount1 = 0; filesCount1 < singleFilesList.length; filesCount1++){
//               $("#files-array-single").append("<input type='hidden' id='for-image-"+filesCount1+"' class='file-count' value='"+filesCount1+"'>"); 
//            }

    }
    function updateListName2() {
        var count_images = count_image2();
//        console.log(count_images);
        if (count_images == 0) {
            $("#upload-album-tabs div.show-file-names").html('<span class="glyphicon glyphicon-file kv-caption-icon"></span>');
        }
        if (count_images == 1) {
            $("#upload-album-tabs div.show-file-names").html('<span class="glyphicon glyphicon-file kv-caption-icon"></span>' + $("#files-array-multiple").find('input.file-count[value=1]').attr('title'));
        } else if (count_images > 1) {
            $("#upload-album-tabs div.show-file-names").html('<span class="glyphicon glyphicon-file kv-caption-icon"></span>' + count_images + ' files selected');
        }
//            var filesCount1  = 0;
//            for(filesCount1 = 0; filesCount1 < singleFilesList.length; filesCount1++){
//               $("#files-array-single").append("<input type='hidden' id='for-image-"+filesCount1+"' class='file-count' value='"+filesCount1+"'>"); 
//            }

    }

    $("#upload-image-tabs").on('click', 'span.delete-image', function () {
        var div = $(this).closest('div.file-preview-frame');
        remove_image1(div.attr('data-fileindex'));
        div.hide();
        updateListName1();
        
    });
    $("#upload-album-tabs").on('click', 'span.delete-image', function () {
        var div = $(this).closest('div.file-preview-frame');
        remove_image2(div.attr('data-fileindex'));
        div.hide();
        updateListName2();
    });
    
    function remove_image1(index) {
        $("#files-array-single").find("#for-image-" + index + "").val(0);
    }
    function remove_image2(index) {
        $("#files-array-multiple").find("#for-image-" + index + "").val(0);
    }
    function count_image1() {
        var count = 0;
        $("#files-array-single").find('input.file-count[value=1]').each(function () {
            count += 1;
        });

        return count;

    }
    function count_image2() {
        var count = 0;
        $("#files-array-multiple").find('input.file-count[value=1]').each(function () {
            count += 1;
        });

        return count;

    }
});