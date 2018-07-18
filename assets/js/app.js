/* 
 * To change this license header, choose License Headers in Project Properties.
 * Developer Name :- jatin
 */
app = {
    checkFullPageBackgroundImage: function() {
        $page = $('.full-page');
        image_src = $page.data('image');

        if (image_src !== undefined) {
            image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>'
            $page.append(image_container);
        }
    }
}


