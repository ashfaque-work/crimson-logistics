/**
 * Theme: Dastone - Responsive Bootstrap 5 Admin Dashboard
 * Author: Mannatthemes
 * Form Wizard
 */

$(document).ready(function(){

    $(function ()
    {
        $("#form-horizontal").steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slide"
        });
        $("#form-vertical").steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical"
        });
    });
  
  });


