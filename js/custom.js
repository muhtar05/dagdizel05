/**
 * Created with JetBrains PhpStorm.
 * User: Мухтар
 * Date: 14.11.13
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */
var api;
jQuery(document).ready(function() {
    api =  jQuery('.banner').revolution(        {
            delay: 5000,
            hideThumbs:300,
            thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
            thumbHeight:50,
            thumbAmount:5,
            navigationType:"both",					//bullet, thumb, none, both		(No Thumbs In FullWidth Version !)
            navigationArrows:"verticalcentered",		//nexttobullets, verticalcentered, none
            navigationStyle:"round",  //round,square,navbar

            touchenabled:"on",						// Enable Swipe Function : on/off
            onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

            navOffsetHorizontal:0,
            navOffsetVertical:20,

            stopAtSlide:-1,
            stopAfterLoops:-1,

            shadow:0,								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
            fullWidth:"on"							// Turns On or Off the Fullwidth Image Centering in FullWidth Modus
        });
});
