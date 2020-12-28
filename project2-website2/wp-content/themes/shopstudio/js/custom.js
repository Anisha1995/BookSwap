jQuery(document).ready(function ($) {

    var nav = document.getElementById('site-navigation'), button, menu;
    if (!nav) {
        return;
    }

    button = nav.getElementsByTagName('button')[0];
    menu = nav.getElementsByTagName('ul')[0];
    if (!button) {
        return;
    }

    // Hide button if menu is missing or empty.
    if (!menu || !menu.childNodes.length) {
        button.style.display = 'none';
        return;
    }

    button.onclick = function () {
        if (-1 === menu.className.indexOf('nav-menu')) {
            menu.className = 'nav-menu';
        }

        if (-1 !== button.className.indexOf('toggled-on')) {
            button.className = button.className.replace(' toggled-on', '');
            menu.className = menu.className.replace(' toggled-on', '');
        } else {
            button.className += ' toggled-on';
            menu.className += ' toggled-on';
        }
    };

    if( jQuery(window).width() < 769 ) {
        jQuery('.menu-main-menu-container >ul >li.menu-item-has-children').click(function (e) {
            jQuery(".menu-main-menu-container >ul >li.menu-item-has-children >ul.sub-menu").slideToggle("slow");
        });
    }

    if( ! jQuery('.widget-area').length ) {
        jQuery( ".site-content" ).addClass( "site-content-without-sidebar" );
    }


   
 
});