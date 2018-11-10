jQuery(document).ready(function($) {





    var $upload_button = jQuery('.wd-gallery-upload');















    var locksmith_font_family = "";

    var locksmith_font_weight = "";

    var locksmith_font_subsets = "";





    $("#tabs-2 select.font_familly").change(function() {

        locksmith_font_family = $(this).find(":selected").val();



        $("#wd-google-fonts-css").attr("href", "http://fonts.googleapis.com/css?family=" + locksmith_font_family + ":" + locksmith_font_weight + "&subset=" + locksmith_font_subsets);

        $(this).closest("tbody").find("p").css("font-family", locksmith_font_family);

        $(this).closest("tbody").find("h2").css("font-family", locksmith_font_family);

        $(this).closest("tbody").find("ul li").css("font-family", locksmith_font_family);

    });



    $("#tabs-2 select.font_weight").change(function() {

        locksmith_font_family = $(this).find(":selected").val();



        $(this).closest("tbody").find("p").css("font-weight", locksmith_font_family);

        $(this).closest("tbody").find("h2").css("font-weight", locksmith_font_family);

        $(this).closest("tbody").find("ul li").css("font-weight", locksmith_font_family);

    });





    $("#tabs-2 select.text_transform").change(function() {

        locksmith_font_family = $(this).find(":selected").val();



        $(this).closest("tbody").find("p").css("text-transform", locksmith_font_family);

        $(this).closest("tbody").find("h2").css("text-transform", locksmith_font_family);

        $(this).closest("tbody").find("ul li").css("text-transform", locksmith_font_family);

    });



    $("#tabs-2 select.text_size").change(function() {

        locksmith_font_family = $(this).find(":selected").val();

        $(this).closest("tbody").find("p").css("font-size", locksmith_font_family + 'px');

        $(this).closest("tbody").find("h2").css("font-size", locksmith_font_family + 'px');

        $(this).closest("tbody").find("ul li").css("font-size", locksmith_font_family + 'px');

    });



    $("#tabs-2 select.font_subsets").change(function() {

        locksmith_font_family = $(this).find(":selected").val();

        $("#wd-google-fonts-css").attr("href", "http://fonts.googleapis.com/css?family=" + locksmith_font_family + ":" + locksmith_font_weight + "&subset=" + locksmith_font_subsets);

    });





    $('#locksmith_show_adress_bar').on('change', function() {

        console.log($(this).attr("checked"));

        if ($(this).attr("checked")) {

            $('.address_bar_item').removeClass('hidden_item');

        } else {

            $('.address_bar_item').addClass('hidden_item');

        }

    });



    $('.locksmith_footer_columns label').on('click', function() {

        if (!$(this).hasClass('label_selected')) {

            $('.locksmith_footer_columns .label_selected').removeClass('label_selected');

            $(this).addClass('label_selected');

        }

    })





    if (wp.media !== undefined) {

        wp.media.customlibEditGallery = {



            frame: function() {



                if (this._frame)

                    return this._frame;



                var selection = this.select();



                this._frame = wp.media({

                    id: 'locksmith_portfolio-image-gallery',

                    frame: 'post',

                    state: 'gallery-edit',

                    title: wp.media.view.l10n.editGalleryTitle,

                    editing: true,

                    multiple: true,

                    selection: selection

                });



                this._frame.on('update', function() {



                    var controller = wp.media.customlibEditGallery._frame.states.get('gallery-edit');

                    var library = controller.get('library');

                    // Need to get all the attachment ids for gallery

                    var ids = library.pluck('id');



                    $input_gallery_items.val(ids);



                    jQuery.ajax({

                        type: "post",

                        url: ajaxurl,

                        data: "action=locksmith_gallery_upload_get_images&ids=" + ids,

                        success: function(data) {



                            $thumbs_wrap.empty().html(data);



                        }

                    });



                });



                return this._frame;

            },



            init: function() {



                $upload_button.click(function(event) {



                    $thumbs_wrap = $(this).next();

                    $input_gallery_items = $thumbs_wrap.next();



                    event.preventDefault();

                    wp.media.customlibEditGallery.frame().open();



                });

            },



            // Gets initial gallery-edit images. Function modified from wp.media.gallery.edit

            // in wp-includes/js/media-editor.js.source.html

            select: function() {



                var shortcode = wp.shortcode.next('gallery', '[gallery ids="' + $input_gallery_items.val() + '"]'),
                    defaultPostId = wp.media.gallery.defaults.id,
                    attachments, selection;



                // Bail if we didn't match the shortcode or all of the content.

                if (!shortcode)

                    return;



                // Ignore the rest of the match object.

                shortcode = shortcode.shortcode;



                if (_.isUndefined(shortcode.get('id')) && !_.isUndefined(defaultPostId))

                    shortcode.set('id', defaultPostId);



                attachments = wp.media.gallery.attachments(shortcode);

                selection = new wp.media.model.Selection(attachments.models, {

                    props: attachments.props.toJSON(),

                    multiple: true

                });



                selection.gallery = attachments.gallery;



                // Fetch the query's attachments, and then break ties from the

                // query to allow for sorting.

                selection.more().done(function() {

                    // Break ties with the query.

                    selection.props.set({

                        query: false

                    });

                    selection.unmirror();

                    selection.props.unset('orderby');

                });



                return selection;



            },

        };

    }





    if (wp.media !== undefined) {

        $(wp.media.customlibEditGallery.init);

    }





    /*--------------------------------------*/

    var curent_sreen = '';

    function locksmith_add_ckeckbox_class() {

        curent_sreen = $("input:radio[name='locksmith_start_screan']:checked").val();

        $("input[name='locksmith_start_screan']").parent().removeClass('selected');



        $("input[value='" + curent_sreen + "'][name='locksmith_start_screan']").parent().addClass('selected');

    }





    $("#tabs").tabs(); //initialize tabs

    $(function() {

        $("#tabs").tabs({

            activate: function(event, ui) {

                var scrollTop = $(window).scrollTop(); // save current scroll position

                window.location.hash = ui.newPanel.attr('id'); // add hash to url

                $(window).scrollTop(scrollTop); // keep scroll at current position

            }

        });

    });

    // reload the form when the checkbox is changed

    locksmith_add_ckeckbox_class();

    $('.locksmith_start_screan').click(function(e) {

        if (curent_sreen != $(this).val()) {

            locksmith_add_ckeckbox_class();

            $(this).closest('form').submit();

        }

    });



    if (typeof wp.media !== 'undefined') {



        var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;



        $('.uploader .button').click(function(e) {

            var send_attachment_bkp = wp.media.editor.send.attachment;

            var button = $(this);

            var id = button.attr('id').replace('_button', '');

            _custom_media = true;

            wp.media.editor.send.attachment = function(props, attachment) {

                if (_custom_media) {

                    $("#" + id).val(attachment.url);

                } else {

                    return _orig_send_attachment.apply(this, [props, attachment]);

                };

            };



            wp.media.editor.open(button);

            return false;

        });



        $('.add_media').on('click', function() {

            _custom_media = false;

        });



    }



    $('.logo_position').on('change', 'input[name=locksmith_logo_position]:radio', function(e) {

        var input_value = $(this).attr('id');

        $('.logo_position label').removeClass("label_selected");

        $("." + input_value).addClass("label_selected");

    });

    $('.import-demo-screenshot').on('change', 'input[name=locksmith_footer_columns]:radio', function(e) {

        var input_value = $(this).attr('id');

        $('.locksmith_footer_columns label').removeClass("label_selected");

        $("." + input_value).addClass("label_selected");

    });



    $('.import-demo-screenshot').on('change', 'input[name=demo_screenshot]:radio', function(e) {

        var input_value = $(this).attr('id');

        $('.import-demo-screenshot label').removeClass("label_selected");

        $("." + input_value).addClass("label_selected");

    });

    //---------page setting-----------

    $(function() {

        $('#locksmith_page_title_area_style').change(function() {

            var selected = $(this).find(':selected').text();

            //alert(selected);

            if (selected == 'Standard Style') {

                $(".locksmith_show_hide.float_left").hide();

            } else {

                $(".locksmith_show_hide.float_left").show();

            }

            //$('#' + selected).show();

        }).change()

    });










});
