$(document).ready(function() {
              $('.menu a').hover(function() {
                $(this).stop().animate({
                   opacity: 1
                 }, 200);
                    }, function() {
               $(this).stop().animate({
                opacity: 0.7
                 }, 200);
              });
            });