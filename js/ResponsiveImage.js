<img id="my_image" style="display: none;" src="my.png" width="924" height="330" border="0" usemap="#map" />

<map name="map" id="map">
    <area shape="poly" coords="774,49,810,21,922,130,920,222,894,212,885,156,874,146" href="#mylink" />
    <area shape="poly" coords="649,20,791,157,805,160,809,217,851,214,847,135,709,1,666,3" href="#myotherlink" />
</map>

<script>
$(function(){
    var image_is_loaded = false;
    $("#my_image").load(function() {
        $(this).data('width', $(this).attr('width')).data('height', $(this).attr('height'));
        $($(this).attr('usemap')+" area").each(function(){
            $(this).data('coords', $(this).attr('coords'));
        });

        $(this).css('width', '100%').css('height','auto').show();

        image_is_loaded = true;
        $(window).trigger('resize');
    });


    function ratioCoords (coords, ratio) {
        coord_arr = coords.split(",");

        for(i=0; i < coord_arr.length; i++) {
            coord_arr[i] = Math.round(ratio * coord_arr[i]);
        }

        return coord_arr.join(',');
    }
    $(window).on('resize', function(){
        if (image_is_loaded) {
            var img = $("#my_image");
            var ratio = img.width()/img.data('width');

            $(img.attr('usemap')+" area").each(function(){
                console.log('1: '+$(this).attr('coords'));
                $(this).attr('coords', ratioCoords($(this).data('coords'), ratio));
            });
        }
    });
});
</script>